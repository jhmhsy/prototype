<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;
use App\Models\Booking;

class reservationController extends Controller
{
 

    public function store(Request $request)
{
    // Validate the form data
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255', 
        'room' => 'required|string|max:255',
        'date' => 'required|date',
        'time' => 'required|date_format:H:i', // time is in HH:MM format
    ]);


    Booking::create([
        'name' => $request->name,
        'email' => $request->email, 
        'room' => $request->room, 
        'date' => $request->date,
        'time' => $request->time, 
    ]);

    return redirect()->back()->with('success', 'Booking successfully created!');
}

}