<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CaseStudyHeroSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CaseStudyHeroSectionController extends Controller
{
    // ── Admin index ──────────────────────────────────────────────────

    public function index()
    {
        $section = CaseStudyHeroSection::withTrashed()->latest('updated_at')->first();

        return view('pages.admin.sections.casestudy.hero', compact('section'));
    }

    // ── Create ───────────────────────────────────────────────────────

    public function store(Request $request)
    {
        $data = $this->validated($request, isNew: true);
        $data = $this->handleImageUpload($request, $data);

        CaseStudyHeroSection::create($data);

        return back()->with('success', 'Hero section created successfully.');
    }

    // ── Update ───────────────────────────────────────────────────────

    public function update(Request $request, CaseStudyHeroSection $heroSection)
    {
        $data = $this->validated($request, isNew: false);
        $data = $this->handleImageUpload($request, $data, $heroSection);

        $heroSection->update($data);

        return back()->with('success', 'Hero section updated successfully.');
    }

    // ── Toggle status ─────────────────────────────────────────────────

    public function toggleStatus(CaseStudyHeroSection $heroSection)
    {
        $heroSection->update([
            'status' => $heroSection->isActive() ? 'inactive' : 'active',
        ]);

        $label = $heroSection->isActive() ? 'Active' : 'Inactive';

        return back()->with('success', "Section set to {$label}.");
    }

    // ── Soft-delete ──────────────────────────────────────────────────

    public function destroy(CaseStudyHeroSection $heroSection)
    {
        $heroSection->delete();

        return back()->with('success', 'Hero section deleted. It can be restored.');
    }

    // ── Restore ───────────────────────────────────────────────────────

    public function restore(int $id)
    {
        $section = CaseStudyHeroSection::withTrashed()->findOrFail($id);
        $section->restore();

        return back()->with('success', 'Hero section restored successfully.');
    }

    // ── Private helpers ──────────────────────────────────────────────

    private function validated(Request $request, bool $isNew): array
    {
        $rules = [
            'heading'           => 'required|string|max:255',
            'heading_highlight' => 'required|string|max:255',
            'description'       => 'required|string|max:2000',
            'status'            => 'required|in:active,inactive',
        ];

        if ($request->hasFile('bg_image')) {
            $rules['bg_image'] = 'file|mimes:jpeg,png,webp,gif|max:4096';
        }

        return $request->validate($rules);
    }

    private function handleImageUpload(
        Request $request,
        array $data,
        ?CaseStudyHeroSection $existing = null
    ): array {
        unset($data['bg_image']);

        if (!$request->hasFile('bg_image')) {
            return $data;
        }

        // Delete old uploaded file (skip static seeded paths)
        if (
            $existing &&
            $existing->bg_image_path &&
            str_contains($existing->bg_image_path, '/')
        ) {
            Storage::disk('public')->delete($existing->bg_image_path);
        }

        $data['bg_image_path'] = $request->file('bg_image')
            ->store('sections/casestudy/hero', 'public');

        $data['bg_image_original_name'] = $request->file('bg_image')
            ->getClientOriginalName();

        return $data;
    }
}
