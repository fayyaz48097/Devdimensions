<?php
// SAVE AS: app/Http/Controllers/Admin/ProcessSectionController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProcessSectionSetting;
use App\Models\ProcessStep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProcessSectionController extends Controller
{
    // ── INDEX ──────────────────────────────────────────────────────
    public function index()
    {
        $setting = ProcessSectionSetting::instance();
        $steps   = ProcessStep::withTrashed()->orderBy('sort_order')->get();

        return view('pages.admin.sections.home.ourprocess_admin', compact('setting', 'steps'));
    }

    // ── UPDATE SECTION SETTINGS ────────────────────────────────────
    public function updateSettings(Request $request)
    {
        $data = $request->validate([
            'heading' => 'required|string|max:150',
            'status'  => 'required|in:active,inactive',
        ]);

        ProcessSectionSetting::instance()->update($data);

        return back()->with('success', 'Section settings saved.');
    }

    // ── STORE STEP ─────────────────────────────────────────────────
    public function storeStep(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:150',
            'description' => 'required|string|max:1000',
            'status'      => 'required|in:active,inactive',
            'icon'        => 'required|file|mimes:svg,jpeg,png,webp,gif|max:2048',
        ]);

        $data = $this->handleIcon($request, $data);
        $data['sort_order'] = (ProcessStep::withTrashed()->max('sort_order') ?? -1) + 1;

        ProcessStep::create($data);

        return back()->with('success', "Step \"{$data['title']}\" created.");
    }

    // ── UPDATE STEP ────────────────────────────────────────────────
    public function updateStep(Request $request, ProcessStep $processStep)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:150',
            'description' => 'required|string|max:1000',
            'status'      => 'required|in:active,inactive',
            'icon'        => 'nullable|file|mimes:svg,jpeg,png,webp,gif|max:2048',
        ]);

        $data = $this->handleIcon($request, $data, $processStep);
        $processStep->update($data);

        return back()->with('success', "Step \"{$processStep->title}\" updated.");
    }

    // ── TOGGLE STEP STATUS ─────────────────────────────────────────
    public function toggleStepStatus(ProcessStep $processStep)
    {
        $processStep->update(['status' => $processStep->isActive() ? 'inactive' : 'active']);

        return back()->with('success', 'Step set to ' . ucfirst($processStep->status) . '.');
    }

    // ── DELETE STEP ────────────────────────────────────────────────
    public function destroyStep(ProcessStep $processStep)
    {
        $title = $processStep->title;
        $processStep->delete();

        return back()->with('success', "\"{$title}\" deleted (can be restored).");
    }

    // ── RESTORE STEP ───────────────────────────────────────────────
    public function restoreStep(int $id)
    {
        $step = ProcessStep::withTrashed()->findOrFail($id);
        $step->restore();

        return back()->with('success', "Step \"{$step->title}\" restored.");
    }

    // ── SORT (AJAX) ────────────────────────────────────────────────
    public function sortSteps(Request $request)
    {
        $request->validate(['items' => 'required|array', 'items.*' => 'integer']);

        foreach ($request->items as $order => $id) {
            ProcessStep::where('id', $id)->update(['sort_order' => $order]);
        }

        return response()->json(['ok' => true]);
    }

    // ── HELPERS ────────────────────────────────────────────────────

    private function handleIcon(Request $request, array $data, ?ProcessStep $existing = null): array
    {
        if ($request->hasFile('icon')) {
            // Delete old uploaded file (skip seeded /assets/... paths)
            if ($existing && $this->isUploaded($existing->icon_path)) {
                Storage::disk('public')->delete($existing->icon_path);
            }
            $data['icon_path']          = $request->file('icon')->store('sections/home/process', 'public');
            $data['icon_original_name'] = $request->file('icon')->getClientOriginalName();
        }
        unset($data['icon']);

        return $data;
    }

    private function isUploaded(?string $path): bool
    {
        return $path && !str_starts_with($path, '/') && !str_starts_with($path, 'http');
    }
}
