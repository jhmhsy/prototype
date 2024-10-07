<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\User;
use \App\Models\Booking;
use \App\Models\PendingBooking;
use \App\Models\RejectedBooking;
use App\Models\Feedback;
class OverviewController extends Controller
{

      public function index()
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
     

        return view('administrator.overview.index', compact('users', 'totalBooking', 'totalFeedbackRating') );
    }
}