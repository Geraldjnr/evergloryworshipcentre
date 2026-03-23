<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;
use App\Models\Admin;
use App\Models\Teaching;

class DashboardController extends Controller
{
    public function index()
    {

        $admins = Admin::all();
        $visitors = Visitor::all(); // <-- add this
        $teachings = Teaching::all(); // <-- important

        return view('dashboard', compact('admins', 'visitors', 'teachings'));
    }
}
