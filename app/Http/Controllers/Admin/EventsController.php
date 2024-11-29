<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class EventsController extends Controller
{
    public function index(Request $request)
    {

        if (!auth()->user()->canany(['event-list', 'event-view', 'event-create', 'event-edit', 'event-delete'])) {
            abort(404); // forbidden / not found
        }


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
            'name' => 'required|string|max:50',
            'location' => 'required|string|max:50',
            'details' => 'required|string|max:300',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
        ]);

        Event::create($validatedData);
        return redirect()->route('events')->with('success', 'Event Successfuly Added!');
    }

    private function checkIfDuplicate(Request $request)
    {
        if ($request->input('form_token') !== session('form_token')) {
            // If duplicate submission, just go back to the previous page
            return redirect()->back()->with('error', 'Duplicate submission detected.');
        }
        return null; // Return null if there's no duplicate submission
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'location' => 'required|string|max:50',
            'details' => 'required|string|max:300',
            'date' => 'required|date',
            'time' => 'required',
        ]);

        $event = Event::findOrFail($id);
        $event->update($request->all());

        return redirect()->back()->with('success', 'Event Updated!');
    }


    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        $event->delete();
        return redirect()->back()->with('success', 'Event Deleted!');
    }
}