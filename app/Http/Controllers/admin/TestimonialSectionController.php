<?php
// SAVE AS: app/Http/Controllers/Admin/TestimonialSectionController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use App\Models\TestimonialSectionSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialSectionController extends Controller
{
    // ── INDEX ──────────────────────────────────────────────────────
    public function index()
    {
        $setting      = TestimonialSectionSetting::instance();
        $testimonials = Testimonial::withTrashed()->orderBy('sort_order')->get();

        return view('pages.admin.sections.home.testimonial_admin', compact('setting', 'testimonials'));
    }

    // ── UPDATE SECTION SETTINGS ────────────────────────────────────
    public function updateSettings(Request $request)
    {
        $data = $request->validate([
            'heading' => 'required|string|max:200',
            'status'  => 'required|in:active,inactive',
        ]);

        TestimonialSectionSetting::instance()->update($data);

        return back()->with('success', 'Section settings saved.');
    }

    // ── STORE TESTIMONIAL ──────────────────────────────────────────
    public function storeTestimonial(Request $request)
    {
        $data = $request->validate([
            'project_label' => 'required|string|max:150',
            'quote'         => 'required|string|max:2000',
            'author_name'   => 'required|string|max:150',
            'author_role'   => 'required|string|max:200',
            'status'        => 'required|in:active,inactive',
            'portrait'      => 'required|file|mimes:jpeg,png,webp,gif|max:3072',
            'logo'          => 'nullable|file|mimes:svg,jpeg,png,webp,gif|max:2048',
        ]);

        $data = $this->handleFiles($request, $data);
        $data['sort_order'] = (Testimonial::withTrashed()->max('sort_order') ?? -1) + 1;

        Testimonial::create($data);

        return back()->with('success', "Testimonial by \"{$data['author_name']}\" added.");
    }

    // ── UPDATE TESTIMONIAL ─────────────────────────────────────────
    public function updateTestimonial(Request $request, Testimonial $testimonial)
    {
        $data = $request->validate([
            'project_label' => 'required|string|max:150',
            'quote'         => 'required|string|max:2000',
            'author_name'   => 'required|string|max:150',
            'author_role'   => 'required|string|max:200',
            'status'        => 'required|in:active,inactive',
            'portrait'      => 'nullable|file|mimes:jpeg,png,webp,gif|max:3072',
            'logo'          => 'nullable|file|mimes:svg,jpeg,png,webp,gif|max:2048',
        ]);

        $data = $this->handleFiles($request, $data, $testimonial);
        $testimonial->update($data);

        return back()->with('success', "Testimonial by \"{$testimonial->author_name}\" updated.");
    }

    // ── TOGGLE STATUS ──────────────────────────────────────────────
    public function toggleTestimonialStatus(Testimonial $testimonial)
    {
        $testimonial->update(['status' => $testimonial->isActive() ? 'inactive' : 'active']);

        return back()->with('success', 'Testimonial set to ' . ucfirst($testimonial->status) . '.');
    }

    // ── DELETE ─────────────────────────────────────────────────────
    public function destroyTestimonial(Testimonial $testimonial)
    {
        $name = $testimonial->author_name;
        $testimonial->delete();

        return back()->with('success', "\"{$name}\" deleted (can be restored).");
    }

    // ── RESTORE ────────────────────────────────────────────────────
    public function restoreTestimonial(int $id)
    {
        $testimonial = Testimonial::withTrashed()->findOrFail($id);
        $testimonial->restore();

        return back()->with('success', "Testimonial by \"{$testimonial->author_name}\" restored.");
    }

    // ── SORT (AJAX) ────────────────────────────────────────────────
    public function sortTestimonials(Request $request)
    {
        $request->validate(['items' => 'required|array', 'items.*' => 'integer']);

        foreach ($request->items as $order => $id) {
            Testimonial::where('id', $id)->update(['sort_order' => $order]);
        }

        return response()->json(['ok' => true]);
    }

    // ── HELPERS ────────────────────────────────────────────────────

    private function handleFiles(Request $request, array $data, ?Testimonial $existing = null): array
    {
        if ($request->hasFile('portrait')) {
            if ($existing && $this->isUploaded($existing->portrait_path)) {
                Storage::disk('public')->delete($existing->portrait_path);
            }
            $data['portrait_path']          = $request->file('portrait')->store('sections/home/testimonials', 'public');
            $data['portrait_original_name'] = $request->file('portrait')->getClientOriginalName();
        }
        unset($data['portrait']);

        if ($request->hasFile('logo')) {
            if ($existing && $this->isUploaded($existing->logo_path)) {
                Storage::disk('public')->delete($existing->logo_path);
            }
            $data['logo_path']          = $request->file('logo')->store('sections/home/testimonials/logos', 'public');
            $data['logo_original_name'] = $request->file('logo')->getClientOriginalName();
        }
        unset($data['logo']);

        return $data;
    }

    private function isUploaded(?string $path): bool
    {
        return $path && !str_starts_with($path, '/') && !str_starts_with($path, 'http');
    }
}
