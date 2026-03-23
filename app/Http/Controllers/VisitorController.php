<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;

class VisitorController extends Controller
{
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'location' => 'required',
            'phone' => 'required'
        ]);

        // Save data
        Visitor::create([
            'name' => $request->name,
            'email' => $request->email,
            'location' => $request->location,
            'phone' => $request->phone,
        ]);

        return back()->with('success', 'Thank you for joining us!');
    }
}
