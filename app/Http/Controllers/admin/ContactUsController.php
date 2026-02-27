<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactUsController extends Controller
{
    /**
     * Display a paginated, filterable list of all contact-us submissions.
     */
    public function index(Request $request): View
    {
        $status = $request->query('status');

        $contacts = ContactUs::query()
            ->when($status && in_array($status, ContactUs::statuses()), fn($q) => $q->where('status', $status))
            ->latest()
            ->paginate(15)
            ->withQueryString();

        $counts = [
            'all'       => ContactUs::count(),
            'pending'   => ContactUs::pending()->count(),
            'active'    => ContactUs::active()->count(),
            'completed' => ContactUs::completed()->count(),
        ];

        return view('pages.admin.contacts.index', compact('contacts', 'counts', 'status'));
    }

    /**
     * Display a single contact-us submission in detail.
     */
    public function show(ContactUs $contact): View
    {
        return view('pages.admin.contacts.show', compact('contact'));
    }

    /**
     * Update the status of a contact-us submission.
     */
    public function updateStatus(Request $request, ContactUs $contact): RedirectResponse
    {
        $request->validate([
            'status' => ['required', 'in:' . implode(',', ContactUs::statuses())],
        ]);

        $contact->update(['status' => $request->status]);

        return back()->with('success', 'Status updated successfully.');
    }
}
