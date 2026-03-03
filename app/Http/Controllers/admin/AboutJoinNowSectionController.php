<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AboutJoinNowSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutJoinNowSectionController extends Controller
{
    // ── Admin index ──────────────────────────────────────────────────

    public function index()
    {
        $section = AboutJoinNowSection::withTrashed()->latest('updated_at')->first();

        return view('pages.admin.sections.about.joinnow', compact('section'));
    }

    // ── Create (first-time, no record yet) ──────────────────────────

    public function store(Request $request)
    {
        $data = $this->validated($request, isNew: true);
        $data = $this->handleLogoUpload($request, $data);

        AboutJoinNowSection::create($data);

        return back()->with('success', 'Join Now section created successfully.');
    }

    // ── Update existing ──────────────────────────────────────────────

    public function update(Request $request, AboutJoinNowSection $joinNowSection)
    {
        $data = $this->validated($request, isNew: false);
        $data = $this->handleLogoUpload($request, $data, $joinNowSection);

        $joinNowSection->update($data);

        return back()->with('success', 'Join Now section updated successfully.');
    }

    // ── Toggle active / inactive ─────────────────────────────────────

    public function toggleStatus(AboutJoinNowSection $joinNowSection)
    {
        $joinNowSection->update([
            'status' => $joinNowSection->isActive() ? 'inactive' : 'active',
        ]);

        $label = $joinNowSection->isActive() ? 'Active' : 'Inactive';

        return back()->with('success', "Section set to {$label}.");
    }

    // ── Soft-delete ──────────────────────────────────────────────────

    public function destroy(AboutJoinNowSection $joinNowSection)
    {
        $joinNowSection->delete();

        return back()->with('success', 'Join Now section deleted. It can be restored.');
    }

    // ── Restore soft-deleted ─────────────────────────────────────────

    public function restore(int $id)
    {
        $section = AboutJoinNowSection::withTrashed()->findOrFail($id);
        $section->restore();

        return back()->with('success', 'Join Now section restored successfully.');
    }

    // ── Private helpers ──────────────────────────────────────────────

    private function validated(Request $request, bool $isNew): array
    {
        $rules = [
            'heading'     => 'required|string|max:255',
            'description' => 'required|string|max:2000',
            'cta_text'    => 'required|string|max:100',
            'cta_url'     => 'required|string|max:255',
            'logo_alt'    => 'nullable|string|max:255',
            'status'      => 'required|in:active,inactive',
        ];

        // Logo only validated when a file is actually uploaded
        if ($request->hasFile('logo')) {
            $rules['logo'] = 'file|mimes:jpeg,png,webp,gif,svg|max:2048';
        } elseif ($isNew) {
            // Logo is optional on creation — section can exist without one
            // (the seeder uses a static asset path set directly on the record)
        }

        return $request->validate($rules);
    }

    private function handleLogoUpload(
        Request $request,
        array $data,
        ?AboutJoinNowSection $existing = null
    ): array {
        // Always remove the raw input key — it is not a DB column
        unset($data['logo']);

        // No new file uploaded — leave logo_path / original_name untouched
        if (!$request->hasFile('logo')) {
            return $data;
        }

        // Delete old uploaded file (skip static seeded paths)
        if (
            $existing &&
            $existing->logo_path &&
            !str_starts_with($existing->logo_path, '/') &&
            !str_starts_with($existing->logo_path, 'http')
        ) {
            Storage::disk('public')->delete($existing->logo_path);
        }

        $data['logo_path'] = $request->file('logo')
            ->store('sections/about/joinnow', 'public');

        $data['logo_original_name'] = $request->file('logo')
            ->getClientOriginalName();

        return $data;
    }
}
