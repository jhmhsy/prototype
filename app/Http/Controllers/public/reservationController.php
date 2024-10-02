<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;
use App\Models\Booking;
use App\Models\RejectedBooking;
use App\Models\PendingBooking;

class reservationController extends Controller
{
    

    public function index()
    {
        $pendingBookings = PendingBooking::all();
        $acceptedBookings = Booking::all();
        $rejectedBookings = RejectedBooking::all();
        
        return view('administrator.includes.reservations', compact('pendingBookings', 'acceptedBookings', 'rejectedBookings'));
        
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

    public function accept($id)
    {
        $pendingBooking = PendingBooking::findOrFail($id);
        Booking::create($pendingBooking->toArray());
        $pendingBooking->delete();
        return redirect()->back()->with('success', 'Booking has been accepted.');
    }

    public function reject($id)
    {
        $pendingBooking = PendingBooking::findOrFail($id);
        RejectedBooking::create($pendingBooking->toArray());
        $pendingBooking->delete();
        return redirect()->back()->with('success', 'Booking has been rejected.');
    }

    public function restore($id)
    {
        $rejectBooking = RejectedBooking::findOrFail($id);

        PendingBooking::create($rejectBooking->toArray());
        $rejectBooking->delete();
        return redirect()->back()->with('success', 'Booking has been restored.');
    }

    public function cancel($id)
    {
        $acceptedBookings = Booking::findOrFail($id);
        PendingBooking::create($acceptedBookings->toArray());
        $acceptedBookings->delete();

        return redirect()->back()->with('success', 'Booking has been canceled.');
    }

    public function delete($id)
    {
        $rejectBooking = RejectedBooking::findOrFail($id);
        $rejectBooking->delete();

      
        return redirect()->back()->with('success', 'Booking has been Deleted.');
    }
}