<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CaseStudyProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CaseStudyProjectController extends Controller
{
    // ── Admin index ──────────────────────────────────────────────────

    public function index()
    {
        $projects = CaseStudyProject::withTrashed()->ordered()->get();

        return view('pages.admin.sections.casestudy.projects', compact('projects'));
    }

    // ── Create ───────────────────────────────────────────────────────

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data = $this->prepareJsonFields($data);
        $data = $this->handleImageUpload($request, $data);
        $data['slug'] = CaseStudyProject::generateSlug($data['title']);

        if (!isset($data['sort_order'])) {
            $data['sort_order'] = CaseStudyProject::withTrashed()->max('sort_order') + 1;
        }

        CaseStudyProject::create($data);

        return back()->with('success', 'Project created successfully.');
    }

    // ── Update ───────────────────────────────────────────────────────

    public function update(Request $request, CaseStudyProject $project)
    {
        $data = $this->validated($request);
        $data = $this->prepareJsonFields($data);
        $data = $this->handleImageUpload($request, $data, $project);

        // Re-generate slug only if title changed
        if ($data['title'] !== $project->title) {
            $data['slug'] = CaseStudyProject::generateSlug($data['title'], $project->id);
        }

        $project->update($data);

        return back()->with('success', 'Project updated successfully.');
    }

    // ── Toggle status ─────────────────────────────────────────────────

    public function toggleStatus(CaseStudyProject $project)
    {
        $project->update([
            'status' => $project->isActive() ? 'inactive' : 'active',
        ]);

        $label = $project->isActive() ? 'Active' : 'Inactive';

        return back()->with('success', "Project set to {$label}.");
    }

    // ── Soft-delete ──────────────────────────────────────────────────

    public function destroy(CaseStudyProject $project)
    {
        $project->delete();

        return back()->with('success', 'Project deleted. It can be restored.');
    }

    // ── Restore ───────────────────────────────────────────────────────

    public function restore(int $id)
    {
        $project = CaseStudyProject::withTrashed()->findOrFail($id);
        $project->restore();

        return back()->with('success', 'Project restored successfully.');
    }

    // ── Sort ─────────────────────────────────────────────────────────

    public function sort(Request $request)
    {
        $request->validate(['order' => 'required|array', 'order.*' => 'integer']);

        foreach ($request->order as $position => $id) {
            CaseStudyProject::where('id', $id)->update(['sort_order' => $position]);
        }

        return response()->json(['ok' => true]);
    }

    // ── Private helpers ──────────────────────────────────────────────

    private function validated(Request $request): array
    {
        $rules = [
            'title'       => 'required|string|max:255',
            'categories'  => 'required|string',   // comma-separated from textarea
            'description' => 'required|string|max:3000',
            'tools' => 'nullable|array',
            'tools.*' => 'file|mimes:jpeg,png,webp,gif,svg|max:1024',
            'sort_order'  => 'nullable|integer|min:0',
            'status'      => 'required|in:active,inactive',
        ];

        if ($request->hasFile('image')) {
            $rules['image'] = 'file|mimes:jpeg,png,webp,gif|max:4096';
        }

        return $request->validate($rules);
    }

    /**
     * Convert comma-separated string inputs into JSON-ready arrays.
     */
    private function prepareJsonFields(array $data): array
    {
        $data['categories'] = collect(explode(',', $data['categories'] ?? ''))
            ->map(fn($c) => trim($c))
            ->filter()
            ->values()
            ->all();

        // tools are handled separately in handleImageUpload
        unset($data['tools']);

        return $data;
    }

    private function handleImageUpload(
        Request $request,
        array $data,
        ?CaseStudyProject $existing = null
    ): array {
        unset($data['image']);

        // ── Project screenshot ──────────────────────────────────────
        if ($request->hasFile('image')) {
            if ($existing && $existing->image_path && str_contains($existing->image_path, '/')) {
                Storage::disk('public')->delete($existing->image_path);
            }
            $data['image_path'] = $request->file('image')
                ->store('sections/casestudy/projects', 'public');
            $data['image_original_name'] = $request->file('image')
                ->getClientOriginalName();
        }

        // ── Tool images ──────────────────────────────────────────────
        if ($request->hasFile('tools')) {
            // Delete old uploaded tools (skip static seeded filenames — no slash)
            if ($existing) {
                foreach ($existing->tools ?? [] as $oldTool) {
                    if (str_contains($oldTool, '/')) {
                        Storage::disk('public')->delete($oldTool);
                    }
                }
            }

            $toolPaths = [];
            foreach ($request->file('tools') as $toolFile) {
                $toolPaths[] = $toolFile->store('sections/casestudy/tools', 'public');
            }
            $data['tools'] = $toolPaths;
        } else {
            // Keep existing tools unchanged
            if ($existing) {
                $data['tools'] = $existing->tools ?? [];
            } else {
                $data['tools'] = [];
            }
        }

        return $data;
    }
}
