<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\PendingBooking;
use App\Models\RejectedBooking;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReservationsController extends Controller
{
    // --------------------------------------------------- View

    public function index()
    {
        $pendingBookings = PendingBooking::all();
        $acceptedBookings = Booking::all();
        $rejectedBookings = RejectedBooking::all();

        return view('administrator.reservation.index', compact('pendingBookings', 'acceptedBookings', 'rejectedBookings'));

    }

    public function active(Request $request)
    {
        $search = $request->input('search');
        $sortBy = $request->get('sortBy', 'created_at');
        $sortDirection = $request->get('sortDirection', 'asc');

        $acceptedBookings = Booking::when($search, fn($query) => $query->where(
            fn($q) =>
            $q->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('date', 'like', "%{$search}%")
                ->orWhere('time', 'like', "%{$search}%")
        ))
            ->orderBy($sortBy, $sortDirection)
            ->paginate(10);

        return view('administrator.reservation.active', compact('acceptedBookings', 'sortBy', 'sortDirection', 'search'));
    }

    public function pending(Request $request)
    {
        $search = $request->input('search');
        $sortBy = $request->get('sortBy', 'created_at');
        $sortDirection = $request->get('sortDirection', 'asc');

        $pendingBookings = PendingBooking::when($search, fn($query) => $query->where(
            fn($q) =>
            $q->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('date', 'like', "%{$search}%")
                ->orWhere('time', 'like', "%{$search}%")
        ))
            ->orderBy($sortBy, $sortDirection)
            ->paginate(10);

        return view('administrator.reservation.pending', compact('pendingBookings', 'sortBy', 'sortDirection', 'search'));
    }
    public function suspended(Request $request)
    {
        $search = $request->input('search');
        $sortBy = $request->get('sortBy', 'created_at');
        $sortDirection = $request->get('sortDirection', 'asc');

        $rejectedBookings = RejectedBooking::when($search, fn($query) => $query->where(
            fn($q) =>
            $q->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('date', 'like', "%{$search}%")
                ->orWhere('time', 'like', "%{$search}%")
        ))
            ->orderBy($sortBy, $sortDirection)
            ->paginate(10);

        return view('administrator.reservation.canceled', compact('rejectedBookings', 'sortBy', 'sortDirection', 'search'));
    }


    public function History()
    {

        return view('administrator.reservation.history');

    }

    // ------------------------------------------------------------------ Configurations

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



// public function active()
// {
//     $rejectedBookings = RejectedBooking::all();

//     return view('administrator.reservation.canceled', compact('rejectedBookings'));

// }