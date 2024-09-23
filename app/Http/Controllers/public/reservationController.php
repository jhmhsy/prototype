<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;
use App\Models\Booking;

class reservationController extends Controller
{
    public function create()
    {
        return view('subpages.reserve');
    }

    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
        ]);

        // Create a new booking
        Booking::create([
            'name' => $request->name,
            'date' => $request->date,
        ]);

        return redirect()->back()->with('success', 'Booking successfully created!');
    }
}