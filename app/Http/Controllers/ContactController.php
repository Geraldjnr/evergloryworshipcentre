<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact; // 👈 IMPORTANT

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        // 1. Validation
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        // 2. Save to database
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        // 3. Return success message
        return back()->with('success', 'Message saved successfully!');
    }
}
