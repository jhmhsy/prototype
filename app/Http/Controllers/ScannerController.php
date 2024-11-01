<?php
// app/Http/Controllers/ScannerController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ScannerController extends Controller
{
    public function index()
    {
        return view('scanner');
    }

    public function process(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'result' => 'required|string|max:2048'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid input data',
                    'errors' => $validator->errors()
                ], 422);
            }

            $result = $request->input('result');

            // Process the scan result
            $scan = Scan::create([
                'result' => $result,
                'user_id' => auth()->id(), // If using authentication
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent()
            ]);

            // If it's a URL, validate it
            if (filter_var($result, FILTER_VALIDATE_URL)) {
                // Additional URL validation/processing here
            }

            return response()->json([
                'success' => true,
                'data' => $scan,
                'message' => 'Scan processed successfully'
            ]);

        } catch (\Exception $e) {
            Log::error('Scan processing error: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Error processing scan'
            ], 500);
        }
    }
}