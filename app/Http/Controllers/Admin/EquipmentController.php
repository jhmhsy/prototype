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

        return view('administrator.includes.equipments' ,compact('equipments'));
    }
   
    

    public function store(Request $request)
    {

        
        // Validate inputs
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'details' => 'required',
            'extra_details' => 'nullable',
            'images' => 'required|array|max:3', // Limit to 3 images
            'images.*' => 'image|mimes:jpeg,png,jpg,gif', // Validate image types without size limit

        ]);
    
        // Handle image uploads
        $imagePaths = [];
        if ($request->has('images')) {
            foreach ($request->file('images') as $image) {
                // Store the image and save the path
                $imagePaths[] = $image->store('images/equipment', 'public');
            }
        }
       
        // Save the equipment with image paths
        Equipment::create([
            'name' => $validatedData['name'],
            'type' => $validatedData['type'],
            'details' => $validatedData['details'],
            'extra_details' => $validatedData['extra_details'],
            'images' => $imagePaths, // Directly save as an array, no need for json_encode
        ]);
    

        

        return redirect()->route('equipment.index')->with('success', 'Equipment added successfully!');
    }
    

}