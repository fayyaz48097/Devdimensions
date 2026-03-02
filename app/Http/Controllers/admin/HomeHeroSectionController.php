<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeHeroSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeHeroSectionController extends Controller
{
    // ────────────────────────────────────────────
    //  SHOW the edit form (create-or-edit pattern)
    //  There is only ever ONE hero record.
    //  If none exists we boot a blank unsaved model.
    // ────────────────────────────────────────────
    public function edit()
    {
        // Include soft-deleted so admin can see & restore it
        $hero = HomeHeroSection::withTrashed()->latest()->first();

        return view('pages.admin.sections.home.hero', compact('hero'));
    }

    // ────────────────────────────────────────────
    //  STORE  (first-time create)
    // ────────────────────────────────────────────
    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data = $this->handleUploads($request, $data);

        HomeHeroSection::create($data);

        return redirect()
            ->route('admin.sections.home.hero')
            ->with('success', 'Hero section created successfully.');
    }

    // ────────────────────────────────────────────
    //  UPDATE  (edit existing)
    // ────────────────────────────────────────────
    public function update(Request $request, HomeHeroSection $homeHeroSection)
    {
        $data = $this->validated($request);
        $data = $this->handleUploads($request, $data, $homeHeroSection);

        $homeHeroSection->update($data);

        return redirect()
            ->route('admin.sections.home.hero')
            ->with('success', 'Hero section updated successfully.');
    }

    // ────────────────────────────────────────────
    //  TOGGLE STATUS  (active ↔ inactive)
    // ────────────────────────────────────────────
    public function toggleStatus(HomeHeroSection $homeHeroSection)
    {
        $homeHeroSection->update([
            'status' => $homeHeroSection->status === 'active' ? 'inactive' : 'active',
        ]);

        return back()->with('success', 'Hero section status updated.');
    }

    // ────────────────────────────────────────────
    //  SOFT-DELETE
    // ────────────────────────────────────────────
    public function destroy(HomeHeroSection $homeHeroSection)
    {
        $homeHeroSection->delete();

        return redirect()
            ->route('admin.sections.home.hero')
            ->with('success', 'Hero section deleted (soft-deleted).');
    }

    // ────────────────────────────────────────────
    //  RESTORE
    // ────────────────────────────────────────────
    public function restore(int $id)
    {
        $hero = HomeHeroSection::withTrashed()->findOrFail($id);
        $hero->restore();

        return redirect()
            ->route('admin.sections.home.hero')
            ->with('success', 'Hero section restored.');
    }

    // ────────────────────────────────────────────
    //  PRIVATE HELPERS
    // ────────────────────────────────────────────

    private function validated(Request $request): array
    {
        return $request->validate([
            'status'                => 'required|in:active,inactive',
            'heading_plain'         => 'required|string|max:100',
            'heading_gradient'      => 'required|string|max:100',
            'paragraph_text'        => 'required|string',
            'paragraph_highlight_1' => 'nullable|string|max:100',
            'paragraph_highlight_2' => 'nullable|string|max:100',
            'cta_label'             => 'required|string|max:80',
            'cta_url'               => 'required|string|max:255',
            'bg_image'              => 'nullable|image|mimes:jpeg,png,webp,gif|max:4096',
            'right_image_desktop'   => 'nullable|image|mimes:jpeg,png,webp,gif|max:4096',
            'right_image_mobile'    => 'nullable|image|mimes:jpeg,png,webp,gif|max:4096',
        ]);
    }

    /**
     * Handle image uploads and old-image deletion.
     * Only replaces an image when a new file is actually submitted.
     */
    private function handleUploads(Request $request, array $data, ?HomeHeroSection $existing = null): array
    {
        $imageFields = ['bg_image', 'right_image_desktop', 'right_image_mobile'];

        foreach ($imageFields as $field) {
            if ($request->hasFile($field)) {
                // Delete old file from disk
                if ($existing && $existing->{$field}) {
                    Storage::disk('public')->delete($existing->{$field});
                }
                $data[$field] = $request->file($field)->store('sections/home/hero', 'public');
            } else {
                // No new upload — keep existing value (remove key so update() doesn't null it)
                unset($data[$field]);
            }
        }

        return $data;
    }
}
