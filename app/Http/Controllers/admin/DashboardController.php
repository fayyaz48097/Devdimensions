<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Models\Consultation;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Show the admin dashboard with live stats from both leads sources.
     */
    public function index(): View
    {
        // ── Consultation stats ──
        $stats = [
            'total'     => Consultation::count(),
            'pending'   => Consultation::pending()->count(),
            'active'    => Consultation::active()->count(),
            'completed' => Consultation::completed()->count(),
        ];

        // ── Contact-us stats ──
        $contactStats = [
            'total'     => ContactUs::count(),
            'pending'   => ContactUs::pending()->count(),
            'active'    => ContactUs::active()->count(),
            'completed' => ContactUs::completed()->count(),
        ];

        // ── 5 most recent consultations for the table ──
        $recentConsultations = Consultation::latest()->limit(5)->get();

        // ── 5 most recent contact-us submissions ──
        $recentContacts = ContactUs::latest()->limit(5)->get();

        // ── Greeting based on time of day ──
        $hour     = now()->hour;
        $greeting = match (true) {
            $hour < 12 => 'Good morning',
            $hour < 17 => 'Good afternoon',
            default    => 'Good evening',
        };

        $adminName = Auth::guard('admin')->user()->name ?? 'Admin';

        return view('pages.admin.dashboard', compact(
            'stats',
            'contactStats',
            'recentConsultations',
            'recentContacts',
            'greeting',
            'adminName',
        ));
    }
}
