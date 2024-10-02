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
        return view('administrator.includes.ticket', compact('tickets'));
    }

    public function store(Request $request)
    {
    
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'quantity' => 'required|integer|max:255',
            'status' => 'required|string|max:255',
        ]);
    
        Ticket::create($validatedData);
     
        return redirect()->route('ticket.success')->with('success', 'Event added successfully!'); 
    }
    
    public function success(): View
    {
        return view('components.gymtickets.success');
    }
}