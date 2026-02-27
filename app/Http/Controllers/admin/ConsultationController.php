<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Consultation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ConsultationController extends Controller
{
    /**
     * Display a paginated list of all consultations.
     */
    public function index(Request $request): View
    {
        $status = $request->query('status');

        $consultations = Consultation::query()
            ->when($status && in_array($status, Consultation::statuses()), fn($q) => $q->where('status', $status))
            ->latest()
            ->paginate(15)
            ->withQueryString();

        $counts = [
            'all'       => Consultation::count(),
            'pending'   => Consultation::pending()->count(),
            'active'    => Consultation::active()->count(),
            'completed' => Consultation::completed()->count(),
        ];

        return view('pages.admin.consultations.index', compact('consultations', 'counts', 'status'));
    }

    /**
     * Display a single consultation detail.
     */
    public function show(Consultation $consultation): View
    {
        return view('pages.admin.consultations.show', compact('consultation'));
    }

    /**
     * Update the status of a consultation.
     */
    public function updateStatus(Request $request, Consultation $consultation): RedirectResponse
    {
        $request->validate([
            'status' => ['required', 'in:' . implode(',', Consultation::statuses())],
        ]);

        $consultation->update(['status' => $request->status]);

        return back()->with('success', 'Status updated successfully.');
    }
}
