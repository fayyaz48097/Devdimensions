<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FindTalentStep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FindTalentStepController extends Controller
{
    // ── INDEX ──
    public function index()
    {
        $steps = FindTalentStep::withTrashed()->orderBy('sort_order')->get();

        return view('pages.admin.sections.home.findtalent_admin', compact('steps'));
    }

    // ── STORE ──
    public function store(Request $request)
    {
        $data = $this->validated($request, isNew: true);
        $data = $this->handleUpload($request, $data);

        $data['sort_order'] = FindTalentStep::withTrashed()->max('sort_order') + 1 ?? 0;

        FindTalentStep::create($data);

        // FIX: Removed the conflicting double quotes around the title
        return back()->with('success', "Step {$data['title_bold']} {$data['title_plain']} created.");
    }

    // ── UPDATE ──
    public function update(Request $request, FindTalentStep $findTalentStep)
    {
        $data = $this->validated($request, isNew: false);
        $data = $this->handleUpload($request, $data, $findTalentStep);

        $findTalentStep->update($data);

        // FIX: Removed conflicting double quotes
        return back()->with('success', "Step {$findTalentStep->title_bold} {$findTalentStep->title_plain} updated.");
    }

    // ── TOGGLE STATUS ──
    public function toggleStatus(FindTalentStep $findTalentStep)
    {
        $findTalentStep->update([
            'status' => $findTalentStep->status === 'active' ? 'inactive' : 'active',
        ]);

        return back()->with('success', "Step set to " . ucfirst($findTalentStep->status) . ".");
    }

    // ── SOFT DELETE ──
    public function destroy(FindTalentStep $findTalentStep)
    {
        $label = $findTalentStep->title_bold . ' ' . $findTalentStep->title_plain;
        $findTalentStep->delete();

        // FIX: Replaced outer double quotes with single quotes to allow inner double quotes
        return back()->with('success', "'{$label}' deleted (can be restored).");
    }

    // ── RESTORE ──
    public function restore(int $id)
    {
        $step = FindTalentStep::withTrashed()->findOrFail($id);
        $step->restore();

        // FIX: Simplified the string interpolation
        return back()->with('success', "Step {$step->title_bold} {$step->title_plain} restored.");
    }

    // ── SORT (AJAX) ──
    public function sort(Request $request)
    {
        $request->validate([
            'items'   => 'required|array',
            'items.*' => 'integer|exists:find_talent_steps,id',
        ]);

        foreach ($request->items as $order => $id) {
            FindTalentStep::where('id', $id)->update(['sort_order' => $order]);
        }

        return response()->json(['ok' => true]);
    }

    // ── HELPERS ──

    private function validated(Request $request, bool $isNew): array
    {
        return $request->validate([
            'title_plain'  => 'required|string|max:100',
            'title_bold'   => 'required|string|max:100',
            'bold_first'   => 'required|in:0,1',
            'tooltip_text' => 'required|string|max:255',
            'status'       => 'required|in:active,inactive',
            'icon'         => ($isNew ? 'required' : 'nullable') . '|file|mimes:svg,jpeg,png,webp,gif|max:2048',
        ]);
    }

    private function handleUpload(Request $request, array $data, ?FindTalentStep $existing = null): array
    {
        if ($request->hasFile('icon')) {
            // Delete old uploaded file (skip static seeded asset paths)
            if ($existing && $existing->icon_path && !str_starts_with($existing->icon_path, '/') && !str_starts_with($existing->icon_path, 'http')) {
                Storage::disk('public')->delete($existing->icon_path);
            }
            $data['icon_path']          = $request->file('icon')->store('sections/home/findtalent', 'public');
            $data['icon_original_name'] = $request->file('icon')->getClientOriginalName();
        } else {
            unset($data['icon']);
        }

        // Cast bool
        $data['bold_first'] = (bool) ($data['bold_first'] ?? false);

        return $data;
    }
}
