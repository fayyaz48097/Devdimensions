<?php
// SAVE AS: app/Http/View/Composers/SidebarComposer.php

namespace App\Http\View\Composers;

use App\Models\ContactUs;
use App\Models\Consultation;
use Illuminate\View\View;

class SidebarComposer
{
    /**
     * Inject pending + active counts for both consultations and contact-us
     * into the sidebar — no need to pass variables from every controller.
     */
    public function compose(View $view): void
    {
        $view->with([
            'sidebarConsultCount' => Consultation::whereIn('status', ['pending', 'active'])->count(),
            'sidebarContactCount' => ContactUs::whereIn('status', ['pending', 'active'])->count(),
        ]);
    }
}