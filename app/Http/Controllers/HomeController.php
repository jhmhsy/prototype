<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Equipment;
use App\Models\Event;

class HomeController extends Controller
{
    //
    public function index()
    {
        $events = Event::all();

        $equipments = Equipment::all();
        return view('welcome', compact('equipments', 'events'));
    }
    public function showmap()
    {
        return view('gym-map');
    }

}