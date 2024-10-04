<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Equipment;

class EquipmentController extends Controller
{
    public function index()
    {
        $equipments = Equipment::paginate(10);

        return view('administrator.equipment.index' ,compact('equipments'));
    }
   
    

    public function store(Request $request)
    {
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
    

}