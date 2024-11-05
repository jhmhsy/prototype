<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class EventsController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $sortBy = $request->get('sortBy', 'created_at');
        $sortDirection = $request->get('sortDirection', 'asc');

        $events = Event::when($search, fn($query) => $query->where(
            fn($q) =>
            $q->where('name', 'like', "%{$search}%")
                ->orWhere('location', 'like', "%{$search}%")
                ->orWhere('details', 'like', "%{$search}%")
        ))
            ->orderBy($sortBy, $sortDirection)
            ->paginate(10);

        session()->put('form_token', uniqid());
        return view('administrator.event.index', compact('events', 'sortBy', 'sortDirection', 'search'));
    }



    public function store(Request $request)
    {

        $redirectResponse = $this->checkIfDuplicate($request);
        if ($redirectResponse) {
            return $redirectResponse;
        }


        session()->forget('form_token');

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'details' => 'required',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
        ]);

        Event::create($validatedData);
        return redirect()->route('events')->with('success', 'asdasd oten ly!');
    }

    private function checkIfDuplicate(Request $request)
    {
        if ($request->input('form_token') !== session('form_token')) {
            // If duplicate submission, just go back to the previous page
            return redirect()->back()->with('error', 'Duplicate submission detected.');
        }
        return null; // Return null if there's no duplicate submission
    }
}