<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\Booking;

class CalendarController extends Controller
{
    public function show(): View
    {
        // Fetch all reserved dates from the bookings table
        
        $reservedDates = Booking::pluck('date');

    
    // Debug the array structure
        // Pass the dates to the view
        return view('subpages.calendar', compact('reservedDates'));
    }
}