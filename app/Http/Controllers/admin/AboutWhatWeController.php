<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutMissionVision;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutWhatWeController extends Controller
{
    public function edit()
    {
        $section = AboutMissionVision::withTrashed()->latest()->first();
        return view('pages.admin.sections.about.whatwe', compact('section'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'status'               => 'required|in:active,inactive',
            'mission_title'        => 'required|string|max:100',
            'mission_description'  => 'required|string',
            'vision_title'         => 'required|string|max:100',
            'vision_description'   => 'required|string',
            'mission_icon'         => 'nullable|image|mimes:png,jpg,webp,svg|max:1024',
            'vision_icon'          => 'nullable|image|mimes:png,jpg,webp,svg|max:1024',
        ]);

        $data = $this->handleUploads($request, $data);
        AboutMissionVision::create($data);

        return redirect()->route('admin.sections.about.whatwe')
            ->with('success', 'Mission & Vision section created successfully.');
    }

    public function update(Request $request, AboutMissionVision $section)
    {
        $data = $request->validate([
            'status'               => 'required|in:active,inactive',
            'mission_title'        => 'required|string|max:100',
            'mission_description'  => 'required|string',
            'vision_title'         => 'required|string|max:100',
            'vision_description'   => 'required|string',
            'mission_icon'         => 'nullable|image|mimes:png,jpg,webp,svg|max:1024',
            'vision_icon'          => 'nullable|image|mimes:png,jpg,webp,svg|max:1024',
        ]);

        $data = $this->handleUploads($request, $data, $section);
        $section->update($data);

        return redirect()->route('admin.sections.about.whatwe')
            ->with('success', 'Mission & Vision section updated successfully.');
    }

    public function toggleStatus(AboutMissionVision $section)
    {
        $section->update(['status' => $section->status === 'active' ? 'inactive' : 'active']);
        return back()->with('success', 'Status updated.');
    }

    public function destroy(AboutMissionVision $section)
    {
        $section->delete();
        return redirect()->route('admin.sections.about.whatwe')
            ->with('success', 'Section soft-deleted.');
    }

    public function restore($id)
    {
        AboutMissionVision::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('admin.sections.about.whatwe')
            ->with('success', 'Section restored.');
    }

    private function handleUploads(Request $request, array $data, ?AboutMissionVision $existing = null): array
    {
        foreach (['mission_icon', 'vision_icon'] as $field) {
            if ($request->hasFile($field)) {
                if ($existing && $existing->{$field}) {
                    Storage::disk('public')->delete($existing->{$field});
                }
                $data[$field] = $request->file($field)->store('sections/about/whatwe', 'public');
            }
        }
        return $data;
    }
}
