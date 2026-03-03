<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutHeroSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutHeroSectionController extends Controller
{
    public function edit()
    {
        $hero = AboutHeroSection::withTrashed()->latest()->first();
        return view('pages.admin.sections.about.hero', compact('hero'));
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data = $this->handleUploads($request, $data);

        AboutHeroSection::create($data);

        return redirect()
            ->route('admin.sections.about.hero')
            ->with('success', 'About Hero section created successfully.');
    }

    public function update(Request $request, AboutHeroSection $aboutHeroSection)
    {
        $data = $this->validated($request);
        $data = $this->handleUploads($request, $data, $aboutHeroSection);

        $aboutHeroSection->update($data);

        return redirect()
            ->route('admin.sections.about.hero')
            ->with('success', 'About Hero section updated successfully.');
    }

    public function toggleStatus(AboutHeroSection $aboutHeroSection)
    {
        $aboutHeroSection->update([
            'status' => $aboutHeroSection->status === 'active' ? 'inactive' : 'active',
        ]);

        return back()->with('success', 'About Hero section status updated.');
    }

    public function destroy(AboutHeroSection $aboutHeroSection)
    {
        $aboutHeroSection->delete();
        return redirect()
            ->route('admin.sections.about.hero')
            ->with('success', 'About Hero section deleted (soft-deleted).');
    }

    public function restore(int $id)
    {
        $hero = AboutHeroSection::withTrashed()->findOrFail($id);
        $hero->restore();

        return redirect()
            ->route('admin.sections.about.hero')
            ->with('success', 'About Hero section restored.');
    }

    // ── Helpers ──

    private function validated(Request $request): array
    {
        return $request->validate([
            'status'                => 'required|in:active,inactive',
            'heading_plain'         => 'required|string|max:100',
            'heading_gradient'      => 'required|string|max:100',
            'paragraph_text'        => 'required|string',
            'bg_image'              => 'nullable|image|mimes:jpeg,png,webp|max:4096',
            'get_in_touch_image'    => 'nullable|image|mimes:jpeg,png,webp,gif|max:2048',
            'get_in_touch_url'      => 'required|url|max:255',
        ]);
    }

    private function handleUploads(Request $request, array $data, ?AboutHeroSection $existing = null): array
    {
        $imageFields = ['bg_image', 'get_in_touch_image'];

        foreach ($imageFields as $field) {
            if ($request->hasFile($field)) {
                if ($existing && $existing->{$field}) {
                    Storage::disk('public')->delete($existing->{$field});
                }
                $data[$field] = $request->file($field)->store('sections/about/hero', 'public');
            } else {
                unset($data[$field]);
            }
        }

        return $data;
    }
}
