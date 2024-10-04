<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\View\View;

class TicketController extends Controller
{
    
    public function show(): View
    {
        return view('components.gymtickets.ticket');
    }
    
    public function index()
    {
        $tickets = Ticket::paginate(10); 
        return view('administrator.ticket.index', compact('tickets'));
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'quantity' => 'required|integer|max:255',
            'status' => 'required|string|max:255',
        ]);
    
        $ticket = Ticket::create($validatedData);
    
        // Generate QR code data
        $qrData = "Name: {$ticket->name}, Email: {$ticket->email}, Quantity: {$ticket->quantity}, Status: {$ticket->status}";
        $qrCodeUrl = "https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=" . urlencode($qrData);
    
        // Store the QR code data in the session
        session(['qrCodeData' => $qrData]);
    
        // Redirect to success page with QR code URL
        return redirect()->route('ticket.success')->with([
            'success' => 'Event added successfully!',
            'qrCodeUrl' => $qrCodeUrl,
        ]);
    }
    
    

    
    public function success(): View
    {
        return view('components.gymtickets.success');
    }
}