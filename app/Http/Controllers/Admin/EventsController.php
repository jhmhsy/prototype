<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\DB;

class EventsController extends Controller
{
    public function index()
    {

        $events = Event::orderBy('created_at', 'asc')->simplePaginate(10); 
        return view('administrator.event.index', compact('events'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'details' => 'required',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
        ]);

        Event::create($validatedData); 
        return redirect()->route('events')->with('success', 'Event added successfully!');
    }
}