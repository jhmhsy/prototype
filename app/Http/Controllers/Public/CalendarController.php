<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\PendingBooking;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CalendarController extends Controller
{
    public function show(): View
    {
        $reservedDetails = Booking::select('name', 'email', 'date', 'time')->get();

        return view('subpages.calendar', compact('reservedDetails'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
        ]);

        PendingBooking::create([
            'name' => $request->name,
            'email' => $request->email,
            'date' => $request->date,
            'time' => $request->time,
        ]);

        return redirect()->back()->with('success', 'Booking has been made and is pending approval.');
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