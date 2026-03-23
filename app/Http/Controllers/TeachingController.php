<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teaching;

class TeachingController extends Controller
{
    public function index()
    {
        $teachings = Teaching::all(); // Get all teachings

        return view('dashboard', compact('admins', 'visitors', 'teachings'));
    }

    public function store(Request $request)
    {
        $imageName = null;

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/teachings'), $imageName);
        }

        Teaching::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName,
            'teaching_date' => $request->teaching_date,
            'published_date' => $request->published_date,
        ]);



        return back()->with('success', 'Teaching added!');
    }
}
