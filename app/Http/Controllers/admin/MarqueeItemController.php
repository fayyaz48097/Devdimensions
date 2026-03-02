<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MarqueeItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MarqueeItemController extends Controller
{
    // ────────────────────────────────────────────
    //  INDEX — list all items (including trashed)
    // ────────────────────────────────────────────
    public function index()
    {
        // Grouped by row, ordered by sort_order.
        // withTrashed so admin can see and restore deleted items.
        $row1 = MarqueeItem::withTrashed()->forRow(1)->orderBy('sort_order')->get();
        $row2 = MarqueeItem::withTrashed()->forRow(2)->orderBy('sort_order')->get();

        return view('pages.admin.sections.home.marquee', compact('row1', 'row2'));
    }

    // ────────────────────────────────────────────
    //  STORE — add a new item
    // ────────────────────────────────────────────
    public function store(Request $request)
    {
        $data = $request->validate([
            'row'    => 'required|in:1,2',
            'label'  => 'required|string|max:100',
            'icon'   => 'required|file|mimes:svg,jpeg,png,webp,gif|max:2048',
            'status' => 'required|in:active,inactive',
        ]);

        // Determine next sort_order for this row
        $maxOrder = MarqueeItem::withTrashed()->forRow((int) $data['row'])->max('sort_order') ?? -1;

        $iconPath         = $request->file('icon')->store('sections/home/marquee', 'public');
        $iconOriginalName = $request->file('icon')->getClientOriginalName();

        MarqueeItem::create([
            'row'                => (int) $data['row'],
            'label'              => $data['label'],
            'icon_path'          => $iconPath,
            'icon_original_name' => $iconOriginalName,
            'sort_order'         => $maxOrder + 1,
            'status'             => $data['status'],
        ]);

        // Fixed syntax error: removed extra quotes
        return back()->with('success', "{$data['label']} added to Row {$data['row']}.");
    }

    // ────────────────────────────────────────────
    //  UPDATE — edit label / replace icon / change row
    // ────────────────────────────────────────────
    public function update(Request $request, MarqueeItem $marqueeItem)
    {
        $data = $request->validate([
            'row'    => 'required|in:1,2',
            'label'  => 'required|string|max:100',
            'icon'   => 'nullable|file|mimes:svg,jpeg,png,webp,gif|max:2048',
            'status' => 'required|in:active,inactive',
        ]);

        $fillable = [
            'row'    => (int) $data['row'],
            'label'  => $data['label'],
            'status' => $data['status'],
        ];

        if ($request->hasFile('icon')) {
            // Delete old file (skip if it looks like an external URL from the seeder)
            if ($marqueeItem->icon_path && !str_starts_with($marqueeItem->icon_path, 'http')) {
                Storage::disk('public')->delete($marqueeItem->icon_path);
            }
            $fillable['icon_path']          = $request->file('icon')->store('sections/home/marquee', 'public');
            $fillable['icon_original_name'] = $request->file('icon')->getClientOriginalName();
        }

        $marqueeItem->update($fillable);

        // Fixed syntax error: removed extra quotes
        return back()->with('success', "{$marqueeItem->label} updated.");
    }

    // ────────────────────────────────────────────
    //  TOGGLE STATUS  active ↔ inactive
    // ────────────────────────────────────────────
    public function toggleStatus(MarqueeItem $marqueeItem)
    {
        $marqueeItem->update([
            'status' => $marqueeItem->status === 'active' ? 'inactive' : 'active',
        ]);

        $state = ucfirst($marqueeItem->status);

        // Fixed syntax error: removed extra quotes
        return back()->with('success', "{$marqueeItem->label} set to {$state}.");
    }

    // ────────────────────────────────────────────
    //  DESTROY — soft delete
    // ────────────────────────────────────────────
    public function destroy(MarqueeItem $marqueeItem)
    {
        $label = $marqueeItem->label;
        $marqueeItem->delete();

        // Fixed syntax error: removed extra quotes
        return back()->with('success', "{$label} deleted (can be restored).");
    }

    // ────────────────────────────────────────────
    //  RESTORE — un-soft-delete
    // ────────────────────────────────────────────
    public function restore(int $id)
    {
        $item = MarqueeItem::withTrashed()->findOrFail($id);
        $item->restore();

        // Fixed syntax error: removed extra quotes
        return back()->with('success', "{$item->label} restored.");
    }

    // ────────────────────────────────────────────
    //  SORT — update sort_order via drag-drop AJAX
    // ────────────────────────────────────────────
    public function sort(Request $request)
    {
        $request->validate([
            'items'   => 'required|array',
            'items.*' => 'integer|exists:marquee_items,id',
        ]);

        foreach ($request->items as $order => $id) {
            MarqueeItem::where('id', $id)->update(['sort_order' => $order]);
        }

        return response()->json(['ok' => true]);
    }
}
