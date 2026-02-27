<?php
// SAVE AS: app/Http/View/Composers/SidebarComposer.php

namespace App\Http\View\Composers;

use App\Models\Consultation;
use Illuminate\View\View;

class SidebarComposer
{
    /**
     * Inject the pending + active consultation count into the sidebar.
     * This runs automatically every time the sidebar partial is rendered —
     * no need to pass the variable from every controller manually.
     */
    public function compose(View $view): void
    {
        $view->with(
            'sidebarConsultCount',
            Consultation::whereIn('status', ['pending', 'active'])->count()
        );
    }
}
