<?php
// SAVE AS: app/Http/Controllers/Admin/FaqSectionController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FaqItem;
use App\Models\FaqSectionSetting;
use Illuminate\Http\Request;

class FaqSectionController extends Controller
{
    // ── INDEX ──────────────────────────────────────────────────────
    public function index()
    {
        $setting  = FaqSectionSetting::instance();
        $faqItems = FaqItem::withTrashed()->orderBy('sort_order')->get();

        return view('pages.admin.sections.home.faq_admin', compact('setting', 'faqItems'));
    }

    // ── UPDATE SECTION SETTINGS ────────────────────────────────────
    public function updateSettings(Request $request)
    {
        $data = $request->validate([
            'heading'    => 'required|string|max:200',
            'subheading' => 'required|string|max:500',
            'status'     => 'required|in:active,inactive',
        ]);

        FaqSectionSetting::instance()->update($data);

        return back()->with('success', 'Section settings saved.');
    }

    // ── STORE FAQ ITEM ─────────────────────────────────────────────
    public function storeFaqItem(Request $request)
    {
        $data = $request->validate([
            'question' => 'required|string|max:500',
            'answer'   => 'required|string|max:5000',
            'status'   => 'required|in:active,inactive',
        ]);

        $data['sort_order'] = (FaqItem::withTrashed()->max('sort_order') ?? -1) + 1;

        FaqItem::create($data);

        return back()->with('success', 'FAQ item added.');
    }

    // ── UPDATE FAQ ITEM ────────────────────────────────────────────
    public function updateFaqItem(Request $request, FaqItem $faqItem)
    {
        $data = $request->validate([
            'question' => 'required|string|max:500',
            'answer'   => 'required|string|max:5000',
            'status'   => 'required|in:active,inactive',
        ]);

        $faqItem->update($data);

        return back()->with('success', 'FAQ item updated.');
    }

    // ── TOGGLE STATUS ──────────────────────────────────────────────
    public function toggleFaqItemStatus(FaqItem $faqItem)
    {
        $faqItem->update(['status' => $faqItem->isActive() ? 'inactive' : 'active']);

        return back()->with('success', 'FAQ item set to ' . ucfirst($faqItem->status) . '.');
    }

    // ── DELETE ─────────────────────────────────────────────────────
    public function destroyFaqItem(FaqItem $faqItem)
    {
        $faqItem->delete();

        return back()->with('success', 'FAQ item deleted (can be restored).');
    }

    // ── RESTORE ────────────────────────────────────────────────────
    public function restoreFaqItem(int $id)
    {
        $item = FaqItem::withTrashed()->findOrFail($id);
        $item->restore();

        return back()->with('success', 'FAQ item restored.');
    }

    // ── SORT (AJAX) ────────────────────────────────────────────────
    public function sortFaqItems(Request $request)
    {
        $request->validate(['items' => 'required|array', 'items.*' => 'integer']);

        foreach ($request->items as $order => $id) {
            FaqItem::where('id', $id)->update(['sort_order' => $order]);
        }

        return response()->json(['ok' => true]);
    }
}
