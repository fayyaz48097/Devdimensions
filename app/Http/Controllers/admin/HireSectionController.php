<?php
// SAVE AS: app/Http/Controllers/Admin/HireSectionController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HireBox;
use App\Models\HireSectionSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HireSectionController extends Controller
{
    // ── INDEX ──────────────────────────────────────────────────────
    public function index()
    {
        $setting = HireSectionSetting::instance();
        $boxes   = HireBox::withTrashed()->orderBy('sort_order')->get();

        return view('pages.admin.sections.home.hireus_admin', compact('setting', 'boxes'));
    }

    // ── UPDATE SECTION SETTINGS ────────────────────────────────────
    public function updateSettings(Request $request)
    {
        $data = $request->validate([
            'heading'         => 'required|string|max:200',
            'subheading'      => 'required|string|max:2000',
            'checklist_items' => 'required|string',   // newline-separated
            'cta_label'       => 'required|string|max:100',
            'cta_url'         => 'required|string|max:255',
            'status'          => 'required|in:active,inactive',
        ]);

        // Convert newline-separated textarea → clean array
        $data['checklist_items'] = array_values(
            array_filter(array_map('trim', explode("\n", $data['checklist_items'])))
        );

        HireSectionSetting::instance()->update($data);

        return back()->with('success', 'Section settings saved.');
    }

    // ── STORE BOX ──────────────────────────────────────────────────
    public function storeBox(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:150',
            'description' => 'required|string|max:1000',
            'box_url'     => 'nullable|string|max:255',
            'status'      => 'required|in:active,inactive',
            'image'       => 'required|file|mimes:svg,jpeg,png,webp,gif|max:2048',
        ]);

        $data = $this->handleImage($request, $data);
        $data['sort_order'] = (HireBox::withTrashed()->max('sort_order') ?? -1) + 1;

        HireBox::create($data);

        return back()->with('success', "Box \"{$data['title']}\" created.");
    }

    // ── UPDATE BOX ─────────────────────────────────────────────────
    public function updateBox(Request $request, HireBox $hireBox)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:150',
            'description' => 'required|string|max:1000',
            'box_url'     => 'nullable|string|max:255',
            'status'      => 'required|in:active,inactive',
            'image'       => 'nullable|file|mimes:svg,jpeg,png,webp,gif|max:2048',
        ]);

        $data = $this->handleImage($request, $data, $hireBox);
        $hireBox->update($data);

        return back()->with('success', "Box \"{$hireBox->title}\" updated.");
    }

    // ── TOGGLE BOX STATUS ──────────────────────────────────────────
    public function toggleBoxStatus(HireBox $hireBox)
    {
        $hireBox->update(['status' => $hireBox->isActive() ? 'inactive' : 'active']);

        return back()->with('success', 'Box set to ' . ucfirst($hireBox->status) . '.');
    }

    // ── DELETE BOX ─────────────────────────────────────────────────
    public function destroyBox(HireBox $hireBox)
    {
        $title = $hireBox->title;
        $hireBox->delete();

        return back()->with('success', "\"{$title}\" deleted (can be restored).");
    }

    // ── RESTORE BOX ────────────────────────────────────────────────
    public function restoreBox(int $id)
    {
        $box = HireBox::withTrashed()->findOrFail($id);
        $box->restore();

        return back()->with('success', "Box \"{$box->title}\" restored.");
    }

    // ── SORT (AJAX) ────────────────────────────────────────────────
    public function sortBoxes(Request $request)
    {
        $request->validate(['items' => 'required|array', 'items.*' => 'integer']);

        foreach ($request->items as $order => $id) {
            HireBox::where('id', $id)->update(['sort_order' => $order]);
        }

        return response()->json(['ok' => true]);
    }

    // ── HELPERS ────────────────────────────────────────────────────

    private function handleImage(Request $request, array $data, ?HireBox $existing = null): array
    {
        if ($request->hasFile('image')) {
            if ($existing && $this->isUploaded($existing->image_path)) {
                Storage::disk('public')->delete($existing->image_path);
            }
            $data['image_path']          = $request->file('image')->store('sections/home/hireus', 'public');
            $data['image_original_name'] = $request->file('image')->getClientOriginalName();
        }
        unset($data['image']);

        return $data;
    }

    private function isUploaded(?string $path): bool
    {
        return $path && !str_starts_with($path, '/') && !str_starts_with($path, 'http');
    }
}
