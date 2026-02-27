<?php

namespace App\Http\Controllers;

use App\Mail\ContactUsReceived;
use App\Models\ContactUs;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    /**
     * Store a new contact-us submission from the public form.
     * Responds with JSON so the front-end JS can handle success / error states.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'full_name'      => ['required', 'string', 'min:2', 'max:100'],
            'email'          => ['required', 'email', 'max:150'],
            'company'        => ['nullable', 'string', 'max:150'],
            'technologies'   => ['nullable', 'array'],
            'technologies.*' => ['string', 'max:60'],
            'no_of_engineers' => ['nullable', 'string', 'max:50'],
            'type_of_hire'   => ['nullable', 'string', 'max:100'],
            'quickly_hire'   => ['nullable', 'string', 'max:100'],
            'description'    => ['nullable', 'string', 'max:5000'],
        ]);

        $contact = ContactUs::create($validated);

        // Send confirmation e-mail to the user
        Mail::to($contact->email)
            ->send(new ContactUsReceived($contact));

        return response()->json([
            'success' => true,
            'message' => "Thank you {$contact->full_name}! We've received your message and will get back to you soon.",
        ]);
    }
}
