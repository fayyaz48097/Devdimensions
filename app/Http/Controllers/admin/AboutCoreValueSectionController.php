<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AboutCoreValueSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutCoreValueSectionController extends Controller
{
    // ── Admin index ──────────────────────────────────────────────────

    public function index()
    {
        // withTrashed so admin can see and restore soft-deleted records
        $section = AboutCoreValueSection::withTrashed()->latest('updated_at')->first();

        return view('pages.admin.sections.about.corevalue', compact('section'));
    }

    // ── Create (first-time, no record yet) ──────────────────────────

    public function store(Request $request)
    {
        $data = $this->validated($request, isNew: true);
        $data = $this->handleImageUpload($request, $data);

        AboutCoreValueSection::create($data);

        return back()->with('success', 'Core Values section created successfully.');
    }

    // ── Update existing ──────────────────────────────────────────────

    public function update(Request $request, AboutCoreValueSection $coreValueSection)
    {
        $data = $this->validated($request, isNew: false);
        $data = $this->handleImageUpload($request, $data, $coreValueSection);

        $coreValueSection->update($data);

        return back()->with('success', 'Core Values section updated successfully.');
    }

    // ── Toggle active / inactive ─────────────────────────────────────

    public function toggleStatus(AboutCoreValueSection $coreValueSection)
    {
        $coreValueSection->update([
            'status' => $coreValueSection->isActive() ? 'inactive' : 'active',
        ]);

        $label = $coreValueSection->isActive() ? 'Active' : 'Inactive';

        return back()->with('success', "Section set to {$label}.");
    }

    // ── Soft-delete ──────────────────────────────────────────────────

    public function destroy(AboutCoreValueSection $coreValueSection)
    {
        $coreValueSection->delete();

        return back()->with('success', 'Core Values section deleted. It can be restored.');
    }

    // ── Restore soft-deleted ─────────────────────────────────────────

    public function restore(int $id)
    {
        $section = AboutCoreValueSection::withTrashed()->findOrFail($id);
        $section->restore();

        return back()->with('success', 'Core Values section restored successfully.');
    }

    // ── Private helpers ──────────────────────────────────────────────

    private function validated(Request $request, bool $isNew): array
    {
        // Validate only the non-file fields here.
        // Image is handled separately in handleImageUpload() so that
        // an empty file input on update never touches the stored path.
        $rules = [
            'title'             => 'required|string|max:255',
            'diagram_image_alt' => 'nullable|string|max:255',
            'status'            => 'required|in:active,inactive',
        ];

        // Only add image validation when a file was actually uploaded
        if ($request->hasFile('diagram_image')) {
            $rules['diagram_image'] = 'file|mimes:jpeg,png,webp,gif,svg|max:4096';
        } elseif ($isNew) {
            // On creation with no file, force a validation error
            $rules['diagram_image'] = 'required';
        }

        return $request->validate($rules);
    }

    private function handleImageUpload(
        Request $request,
        array $data,
        ?AboutCoreValueSection $existing = null
    ): array {
        // Always remove the raw key — it is not a DB column
        unset($data['diagram_image']);

        // Only process when a real file was uploaded
        if (!$request->hasFile('diagram_image')) {
            // No new file — leave diagram_image_path / original_name untouched
            return $data;
        }

        // Delete old uploaded file (skip static seeded paths that start with '/' or 'http')
        if (
            $existing &&
            $existing->diagram_image_path &&
            !str_starts_with($existing->diagram_image_path, '/') &&
            !str_starts_with($existing->diagram_image_path, 'http')
        ) {
            Storage::disk('public')->delete($existing->diagram_image_path);
        }

        $data['diagram_image_path'] = $request->file('diagram_image')
            ->store('sections/about/corevalue', 'public');

        $data['diagram_image_original_name'] = $request->file('diagram_image')
            ->getClientOriginalName();

        return $data;
    }
}
