<?php
// app/Http/Controllers/BarcodeController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarcodeController extends Controller
{
    public function index()
    {
        return view('scan');
    }

    public function process(Request $request)
    {
        $barcode = $request->input('barcode');

        // Add your processing logic here
        // For example, you might want to:
        // - Validate the barcode
        // - Store it in the database
        // - Perform a lookup

        return response()->json([
            'success' => true,
            'barcode' => $barcode
        ]);
    }
}