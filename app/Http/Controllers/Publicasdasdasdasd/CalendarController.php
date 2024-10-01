<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\Booking;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CalendarController extends Controller
{
    public function show(): View
    {
        $reservedDetails = Booking::select('name', 'email', 'room', 'date', 'time')->get();
        return view('subpages.calendar', compact('reservedDetails'));
    }

    public function getReservedHours(Request $request)
    {
        $request->validate(['date' => 'required|date']);
        $reservedHours = Booking::whereDate('date', Carbon::parse($request->query('date'))->toDateString())
            ->pluck('time')
            ->map(fn($time) => Carbon::parse($time)->format('g:i A'));
        
        return response()->json($reservedHours);
    }

    
}