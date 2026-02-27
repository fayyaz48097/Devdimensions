<?php

namespace App\Http\Controllers;

use App\Mail\ConsultationReceived;
use App\Models\Consultation;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ConsultationController extends Controller
{
    /**
     * Store a new consultation request from the public form (modal).
     * Responds with JSON so the modal JS can handle success/error states.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name'    => ['required', 'string', 'min:2', 'max:100'],
            'email'   => ['required', 'email', 'max:150'],
            'message' => ['required', 'string', 'min:5', 'max:2000'],
        ]);

        // Persist with default status = pending
        $consultation = Consultation::create($validated);

        // Send confirmation email to the user
        Mail::to($consultation->email)
            ->send(new ConsultationReceived($consultation));

        return response()->json([
            'success' => true,
            'message' => "Thank you {$consultation->name}! We've received your request and will be in touch soon.",
        ]);
    }
}
