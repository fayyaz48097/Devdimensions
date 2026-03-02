<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WelcomeSection;
use App\Models\WelcomeSectionSliderLine;
use App\Models\WelcomeSectionSliderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WelcomeSectionController extends Controller
{
    // ═══════════════════════════════════════════════
    // SECTION (singleton content block)
    // ═══════════════════════════════════════════════

    public function index()
    {
        $section = WelcomeSection::withTrashed()->with([
            'sliderLines.items',
        ])->latest('updated_at')->first();

        return view('pages.admin.sections.home.welcome_admin', compact('section'));
    }

    public function store(Request $request)
    {
        $data = $this->validatedSection($request);
        $data = $this->handleHeroUpload($request, $data);

        WelcomeSection::create($data);

        return back()->with('success', 'Welcome section created successfully.');
    }

    public function update(Request $request, WelcomeSection $welcomeSection)
    {
        $data = $this->validatedSection($request, isNew: false);
        $data = $this->handleHeroUpload($request, $data, $welcomeSection);

        $welcomeSection->update($data);

        return back()->with('success', 'Welcome section updated successfully.');
    }

    public function toggleStatus(WelcomeSection $welcomeSection)
    {
        $welcomeSection->update([
            'status' => $welcomeSection->status === 'active' ? 'inactive' : 'active',
        ]);

        return back()->with('success', 'Section set to ' . ucfirst($welcomeSection->status) . '.');
    }

    public function destroy(WelcomeSection $welcomeSection)
    {
        $welcomeSection->delete();

        return back()->with('success', 'Welcome section deleted (can be restored).');
    }

    public function restore(int $id)
    {
        $section = WelcomeSection::withTrashed()->findOrFail($id);
        $section->restore();

        return back()->with('success', 'Welcome section restored.');
    }

    // ═══════════════════════════════════════════════
    // SLIDER LINES
    // ═══════════════════════════════════════════════

    public function storeLine(Request $request, WelcomeSection $welcomeSection)
    {
        $data = $this->validatedLine($request);

        $data['welcome_section_id'] = $welcomeSection->id;
        $data['sort_order']         = WelcomeSectionSliderLine::withTrashed()
                                            ->where('welcome_section_id', $welcomeSection->id)
                                            ->max('sort_order') + 1 ?? 0;

        WelcomeSectionSliderLine::create($data);

        return back()->with('success', "Slider line \"{$data['prefix_text']}\" added.");
    }

    public function updateLine(Request $request, WelcomeSection $welcomeSection, WelcomeSectionSliderLine $line)
    {
        $data = $this->validatedLine($request);
        $line->update($data);

        return back()->with('success', "Slider line \"{$line->prefix_text}\" updated.");
    }

    public function toggleLineStatus(WelcomeSection $welcomeSection, WelcomeSectionSliderLine $line)
    {
        $line->update([
            'status' => $line->status === 'active' ? 'inactive' : 'active',
        ]);

        return back()->with('success', 'Slider line set to ' . ucfirst($line->status) . '.');
    }

    public function destroyLine(WelcomeSection $welcomeSection, WelcomeSectionSliderLine $line)
    {
        $label = $line->prefix_text;
        $line->delete();

        return back()->with('success', "'{$label}' deleted (can be restored).");
    }

    public function restoreLine(int $sectionId, int $lineId)
    {
        $line = WelcomeSectionSliderLine::withTrashed()->findOrFail($lineId);
        $line->restore();

        return back()->with('success', "Slider line \"{$line->prefix_text}\" restored.");
    }

    public function sortLines(Request $request, WelcomeSection $welcomeSection)
    {
        $request->validate([
            'items'   => 'required|array',
            'items.*' => 'integer|exists:welcome_section_slider_lines,id',
        ]);

        foreach ($request->items as $order => $id) {
            WelcomeSectionSliderLine::where('id', $id)->update(['sort_order' => $order]);
        }

        return response()->json(['ok' => true]);
    }

    // ═══════════════════════════════════════════════
    // SLIDER ITEMS (cycling words)
    // ═══════════════════════════════════════════════

    public function storeItem(Request $request, WelcomeSection $welcomeSection, WelcomeSectionSliderLine $line)
    {
        $data = $this->validatedItem($request);

        $data['slider_line_id'] = $line->id;
        $data['sort_order']     = WelcomeSectionSliderItem::withTrashed()
                                        ->where('slider_line_id', $line->id)
                                        ->max('sort_order') + 1 ?? 0;

        WelcomeSectionSliderItem::create($data);

        return back()->with('success', "Item \"{$data['item_text']}\" added.");
    }

    public function updateItem(Request $request, WelcomeSection $welcomeSection, WelcomeSectionSliderLine $line, WelcomeSectionSliderItem $item)
    {
        $data = $this->validatedItem($request);
        $item->update($data);

        return back()->with('success', "Item \"{$item->item_text}\" updated.");
    }

    public function toggleItemStatus(WelcomeSection $welcomeSection, WelcomeSectionSliderLine $line, WelcomeSectionSliderItem $item)
    {
        $item->update([
            'status' => $item->status === 'active' ? 'inactive' : 'active',
        ]);

        return back()->with('success', 'Item set to ' . ucfirst($item->status) . '.');
    }

    public function destroyItem(WelcomeSection $welcomeSection, WelcomeSectionSliderLine $line, WelcomeSectionSliderItem $item)
    {
        $label = $item->item_text;
        $item->delete();

        return back()->with('success', "'{$label}' deleted (can be restored).");
    }

    public function restoreItem(int $sectionId, int $lineId, int $itemId)
    {
        $item = WelcomeSectionSliderItem::withTrashed()->findOrFail($itemId);
        $item->restore();

        return back()->with('success', "Item \"{$item->item_text}\" restored.");
    }

    public function sortItems(Request $request, WelcomeSection $welcomeSection, WelcomeSectionSliderLine $line)
    {
        $request->validate([
            'items'   => 'required|array',
            'items.*' => 'integer|exists:welcome_section_slider_items,id',
        ]);

        foreach ($request->items as $order => $id) {
            WelcomeSectionSliderItem::where('id', $id)->update(['sort_order' => $order]);
        }

        return response()->json(['ok' => true]);
    }

    // ═══════════════════════════════════════════════
    // PRIVATE HELPERS
    // ═══════════════════════════════════════════════

    private function validatedSection(Request $request, bool $isNew = true): array
    {
        return $request->validate([
            'heading'        => 'required|string|max:255',
            'description'    => 'required|string|max:1500',
            'cta_text'       => 'required|string|max:80',
            'cta_url'        => 'required|string|max:255',
            'hero_image_alt' => 'nullable|string|max:255',
            'status'         => 'required|in:active,inactive',
            'hero_image'     => 'nullable|file|mimes:jpeg,png,webp,gif,svg|max:4096',
        ]);
    }

    private function validatedLine(Request $request): array
    {
        return $request->validate([
            'prefix_text' => 'required|string|max:120',
            'status'      => 'required|in:active,inactive',
        ]);
    }

    private function validatedItem(Request $request): array
    {
        return $request->validate([
            'item_text' => 'required|string|max:150',
            'status'    => 'required|in:active,inactive',
        ]);
    }

    private function handleHeroUpload(Request $request, array $data, ?WelcomeSection $existing = null): array
    {
        if ($request->hasFile('hero_image')) {
            // Delete old uploaded file — skip static seeded paths (start with '/' or 'http')
            if ($existing &&
                $existing->hero_image_path &&
                !str_starts_with($existing->hero_image_path, '/') &&
                !str_starts_with($existing->hero_image_path, 'http')) {
                Storage::disk('public')->delete($existing->hero_image_path);
            }

            $data['hero_image_path']          = $request->file('hero_image')->store('sections/home/welcome', 'public');
            $data['hero_image_original_name'] = $request->file('hero_image')->getClientOriginalName();
        }

        return $data;
    }
}