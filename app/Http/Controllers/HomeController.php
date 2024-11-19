<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\Equipment;
use App\Models\Event;
use App\Models\Prices;

class HomeController extends Controller
{
    //
    public function index()
    {

        // checks if the auth user has verified or not, id not then proceed to verification and if verified=works normally
        if (Auth::check() && !Auth::user()->hasVerifiedEmail()) {
            return redirect()->route('verification.notice');
        }


        $events = Event::all();
        $prices = Prices::all();

        $equipments = Equipment::all();
        return view('welcome', compact('equipments', 'events', 'prices'));



    }
    public function showmap()
    {
        return view('gym-map');
    }

}