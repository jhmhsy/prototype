<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class FeedbackController extends Controller
{
    public function index()
    {
        try{
          
            $negativeTotal = Feedback::whereBetween('rating', [1, 2])->count();
            $positiveTotal = Feedback::whereBetween('rating', [3, 5])->count();
            $totalFeedback = Feedback::count();
            
            $monthlyTotal = Feedback::whereMonth('created_at', date('m')) // Filter for the current month
            ->whereYear('created_at', date('Y')) // Filter for the current year
            ->count();

            $yearlyTotal = Feedback::whereYear('created_at', date('Y')) // Filter for the current year
            ->count(); // Count feedback entries directly
        
        }catch(\Exception $e){
           
            $positiveTotal = 0;
            $negativeTotal = 0;
            $totalFeedback = 0;
            $monthlyTotal =0;
            $yearlyTotal =0;
        };
        return view('administrator.includes.feedback', compact('totalFeedback', 'positiveTotal', 'negativeTotal', 'monthlyTotal', 'yearlyTotal'));
    }

    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'comment' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        // Store feedback
        Feedback::create([
            'user_id' => auth()->id(), // Assuming the user is authenticated
            'comment' => $request->input('comment'),
            'rating' => $request->input('rating'),
        ]);

        return redirect()->back()->with('success', 'Feedback submitted successfully.');
    }

    
}