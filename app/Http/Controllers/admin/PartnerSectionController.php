<?php
// SAVE AS: app/Http/Controllers/Admin/PartnerSectionController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Models\PartnerSectionSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartnerSectionController extends Controller
{
    // ── INDEX ──────────────────────────────────────────────────────
    public function index()
    {
        $setting  = PartnerSectionSetting::instance();
        $partners = Partner::withTrashed()->orderBy('sort_order')->get();

        return view('pages.admin.sections.home.ourclient_admin', compact('setting', 'partners'));
    }

    // ── UPDATE SECTION SETTINGS ────────────────────────────────────
    public function updateSettings(Request $request)
    {
        $data = $request->validate([
            'heading' => 'required|string|max:200',
            'status'  => 'required|in:active,inactive',
        ]);

        PartnerSectionSetting::instance()->update($data);

        return back()->with('success', 'Section settings saved.');
    }

    // ── STORE PARTNER ──────────────────────────────────────────────
    public function storePartner(Request $request)
    {
        $data = $request->validate([
            'alt_text' => 'required|string|max:150',
            'link_url' => 'nullable|string|max:255',
            'status'   => 'required|in:active,inactive',
            'image'    => 'required|file|mimes:svg,jpeg,png,webp,gif|max:2048',
        ]);

        $data = $this->handleImage($request, $data);
        $data['sort_order'] = (Partner::withTrashed()->max('sort_order') ?? -1) + 1;

        Partner::create($data);

        return back()->with('success', "Partner \"{$data['alt_text']}\" added.");
    }

    // ── UPDATE PARTNER ─────────────────────────────────────────────
    public function updatePartner(Request $request, Partner $partner)
    {
        $data = $request->validate([
            'alt_text' => 'required|string|max:150',
            'link_url' => 'nullable|string|max:255',
            'status'   => 'required|in:active,inactive',
            'image'    => 'nullable|file|mimes:svg,jpeg,png,webp,gif|max:2048',
        ]);

        $data = $this->handleImage($request, $data, $partner);
        $partner->update($data);

        return back()->with('success', "Partner \"{$partner->alt_text}\" updated.");
    }

    // ── TOGGLE STATUS ──────────────────────────────────────────────
    public function togglePartnerStatus(Partner $partner)
    {
        $partner->update(['status' => $partner->isActive() ? 'inactive' : 'active']);

        return back()->with('success', 'Partner set to ' . ucfirst($partner->status) . '.');
    }

    // ── DELETE ─────────────────────────────────────────────────────
    public function destroyPartner(Partner $partner)
    {
        $name = $partner->alt_text;
        $partner->delete();

        return back()->with('success', "\"{$name}\" deleted (can be restored).");
    }

    // ── RESTORE ────────────────────────────────────────────────────
    public function restorePartner(int $id)
    {
        $partner = Partner::withTrashed()->findOrFail($id);
        $partner->restore();

        return back()->with('success', "Partner \"{$partner->alt_text}\" restored.");
    }

    // ── SORT (AJAX) ────────────────────────────────────────────────
    public function sortPartners(Request $request)
    {
        $request->validate(['items' => 'required|array', 'items.*' => 'integer']);

        foreach ($request->items as $order => $id) {
            Partner::where('id', $id)->update(['sort_order' => $order]);
        }

        return response()->json(['ok' => true]);
    }

    // ── HELPERS ────────────────────────────────────────────────────

    private function handleImage(Request $request, array $data, ?Partner $existing = null): array
    {
        if ($request->hasFile('image')) {
            if ($existing && $this->isUploaded($existing->image_path)) {
                Storage::disk('public')->delete($existing->image_path);
            }
            $data['image_path']          = $request->file('image')->store('sections/home/partners', 'public');
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
