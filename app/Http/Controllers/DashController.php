<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\View\View;
use \App\Models\User;
use \App\Models\Booking;
use \App\Models\PendingBooking;
use \App\Models\RejectedBooking;
use App\Models\Feedback;

class DashController extends Controller
{
    //
    public function __construct()
    {
        // checking dashboard permissions
        $this->middleware('isAdmin', ['only' => ['show']]);
    }

    public function show(): View
    {
        try{
            $users = User::count();
            $totalBooking = Booking::count() + RejectedBooking::count() + PendingBooking::count();
            $totalFeedbackRating = Feedback::whereBetween('rating', [3, 5])->count();
        //$sales = 
        
        }catch(\Exception $e){
            $users = 0;
            $totalBooking = 0;
            $totalFeedbackRating = 0;
        };
        //return dd($users);
        return view('administrator.dashboard', compact('users', 'totalBooking', 'totalFeedbackRating'));

    }
}