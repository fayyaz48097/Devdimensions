<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PortfolioProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PortfolioProjectController extends Controller
{
    // ── INDEX ──────────────────────────────────────────────────────────────
    public function index()
    {
        $projects = PortfolioProject::withTrashed()->orderBy('sort_order')->get();

        return view('pages.admin.sections.home.portfolio_admin', compact('projects'));
    }

    // ── STORE ──────────────────────────────────────────────────────────────
    public function store(Request $request)
    {
        $data = $this->validated($request, isNew: true);
        $data = $this->normalise($data);
        $data = $this->handleUploads($request, $data);

        $data['sort_order'] = (PortfolioProject::withTrashed()->max('sort_order') ?? -1) + 1;

        PortfolioProject::create($data);

        return back()->with('success', "Project \"{$data['title']}\" created.");
    }

    // ── UPDATE ─────────────────────────────────────────────────────────────
    public function update(Request $request, PortfolioProject $portfolioProject)
    {
        $data = $this->validated($request, isNew: false);
        $data = $this->normalise($data);
        $data = $this->handleUploads($request, $data, $portfolioProject);

        $portfolioProject->update($data);

        return back()->with('success', "Project \"{$portfolioProject->title}\" updated.");
    }

    // ── TOGGLE STATUS ──────────────────────────────────────────────────────
    public function toggleStatus(PortfolioProject $portfolioProject)
    {
        $portfolioProject->update([
            'status' => $portfolioProject->status === 'active' ? 'inactive' : 'active',
        ]);

        return back()->with('success', "Project set to " . ucfirst($portfolioProject->status) . ".");
    }

    // ── SOFT DELETE ────────────────────────────────────────────────────────
    public function destroy(PortfolioProject $portfolioProject)
    {
        $label = $portfolioProject->title;
        $portfolioProject->delete();

        return back()->with('success', "\"{$label}\" deleted (can be restored).");
    }

    // ── RESTORE ────────────────────────────────────────────────────────────
    public function restore(int $id)
    {
        $project = PortfolioProject::withTrashed()->findOrFail($id);
        $project->restore();

        return back()->with('success', "Project \"{$project->title}\" restored.");
    }

    // ── SORT (AJAX) ────────────────────────────────────────────────────────
    public function sort(Request $request)
    {
        $request->validate([
            'items'   => 'required|array',
            'items.*' => 'integer|exists:portfolio_projects,id',
        ]);

        foreach ($request->items as $order => $id) {
            PortfolioProject::where('id', $id)->update(['sort_order' => $order]);
        }

        return response()->json(['ok' => true]);
    }

    // ── HELPERS ────────────────────────────────────────────────────────────

    private function validated(Request $request, bool $isNew): array
    {
        $imageRule = ($isNew ? 'required' : 'nullable') . '|file|mimes:jpeg,png,webp,gif,jpg|max:4096';

        return $request->validate([
            'title'          => 'required|string|max:150',
            'slug'           => 'nullable|string|max:160',
            'categories'     => 'required|string|max:255',   // comma-separated from input
            'description'    => 'required|string|max:2000',
            'project_url'    => 'nullable|string|max:255',
            'status'         => 'required|in:active,inactive',
            'img_desktop'    => $imageRule,
            'img_mobile'     => $imageRule,
        ]);
    }

    private function normalise(array $data): array
    {
        // Auto-generate slug if blank
        $data['slug'] = Str::slug(
            !empty($data['slug']) ? $data['slug'] : $data['title']
        );

        // Convert comma-separated string → array for JSON cast
        $data['categories'] = array_values(
            array_filter(
                array_map('trim', explode(',', $data['categories']))
            )
        );

        return $data;
    }

    private function handleUploads(Request $request, array $data, ?PortfolioProject $existing = null): array
    {
        $disk = 'public';
        $folder = 'sections/home/portfolio';

        // Desktop image
        if ($request->hasFile('img_desktop')) {
            if ($existing && $this->isUploadedPath($existing->img_desktop_path)) {
                Storage::disk($disk)->delete($existing->img_desktop_path);
            }
            $data['img_desktop_path']          = $request->file('img_desktop')->store($folder, $disk);
            $data['img_desktop_original_name'] = $request->file('img_desktop')->getClientOriginalName();
        }
        unset($data['img_desktop']);

        // Mobile image
        if ($request->hasFile('img_mobile')) {
            if ($existing && $this->isUploadedPath($existing->img_mobile_path)) {
                Storage::disk($disk)->delete($existing->img_mobile_path);
            }
            $data['img_mobile_path']          = $request->file('img_mobile')->store($folder, $disk);
            $data['img_mobile_original_name'] = $request->file('img_mobile')->getClientOriginalName();
        }
        unset($data['img_mobile']);

        return $data;
    }

    /**
     * Returns true only for user-uploaded storage paths
     * (i.e. not static seeded asset paths starting with / or http).
     */
    private function isUploadedPath(?string $path): bool
    {
        if (!$path) {
            return false;
        }

        return !str_starts_with($path, '/') && !str_starts_with($path, 'http');
    }
}
