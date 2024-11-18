<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Equipment;
use App\Models\Event;
use App\Models\Prices;

class HomeController extends Controller
{
    //
    public function index()
    {
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