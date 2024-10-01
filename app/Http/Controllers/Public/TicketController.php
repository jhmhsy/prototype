<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Booking;


class TicketController extends Controller
{
    public function show(): View
    {
        return view('components.gymtickets.ticket');
    }

    public function store(Request $request)
    {
        // Handle form submission logic here...
    
        return view('components.gymtickets.success');


    }
}