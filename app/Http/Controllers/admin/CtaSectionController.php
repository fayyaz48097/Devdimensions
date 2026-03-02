<?php
// SAVE AS: app/Http/Controllers/Admin/CtaSectionController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CtaSectionSetting;
use Illuminate\Http\Request;

class CtaSectionController extends Controller
{
    // ── INDEX ──────────────────────────────────────────────────────
    public function index()
    {
        $setting = CtaSectionSetting::instance();

        return view('pages.admin.sections.home.cta_admin', compact('setting'));
    }

    // ── UPDATE SETTINGS ────────────────────────────────────────────
    public function updateSettings(Request $request)
    {
        $data = $request->validate([
            'heading'             => 'required|string|max:400',
            'btn_primary_label'   => 'required|string|max:100',
            'btn_primary_url'     => 'required|string|max:255',
            'btn_secondary_label' => 'required|string|max:100',
            'btn_secondary_url'   => 'required|string|max:255',
            'status'              => 'required|in:active,inactive',
        ]);

        CtaSectionSetting::instance()->update($data);

        return back()->with('success', 'CTA section saved.');
    }
}
