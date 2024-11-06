<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Equipment;

class EquipmentController extends Controller
{


    public function index(Request $request)
    {
        $equipments = Equipment::when($request->input('search'), function ($query, $search) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('type', 'like', "%{$search}%")
                ->orWhere('details', 'like', "%{$search}%")
                ->orWhere('extra_details', 'like', "%{$search}%");
        })
            ->orderBy($request->get('sortBy', 'created_at'), $request->get('sortDirection', 'asc'))
            ->paginate(10);

        session()->put('form_token', uniqid());

        return view('administrator.equipment.index', [
            'equipments' => $equipments,
            'sortBy' => $request->get('sortBy', 'created_at'),
            'sortDirection' => $request->get('sortDirection', 'asc'),
            'search' => $request->input('search'),
        ]);
    }



    public function store(Request $request)
    {
        $redirectResponse = $this->checkIfDuplicate($request);
        if ($redirectResponse) {
            return $redirectResponse;
        }
        session()->forget('form_token');

        // Validate inputs
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'details' => 'required',
            'extra_details' => 'nullable',
            'images' => 'required|array|max:3',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif', // size limit gone

        ]);

        $imagePaths = [];
        if ($request->has('images')) {
            foreach ($request->file('images') as $image) {

                $imagePaths[] = $image->store('images/equipment', 'public');
            }
        }

        Equipment::create([
            'name' => $validatedData['name'],
            'type' => $validatedData['type'],
            'details' => $validatedData['details'],
            'extra_details' => $validatedData['extra_details'],
            'images' => $imagePaths,
        ]);

        return redirect()->route('equipment.index')->with('success', 'Equipment added successfully!');
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
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'details' => 'required|string|max:500',
            'extra_details' => 'required|string|max:500',

        ]);



        $equipment = Equipment::findOrFail($id);
        $equipment->update([
            'name' => $request->input('name'),
            'type' => $request->input('type'),
            'details' => $request->input('details'),
            'extra_details' => $request->input('extra_details'),

        ]);

        return redirect()->back()->with('success', 'equipment updated successfully.');
    }


    public function destroy($id)
    {
        $equipment = Equipment::findOrFail($id);

        $equipment->delete();
        return redirect()->back()->with('success', 'equipment Successfully Deleted.');
    }
}