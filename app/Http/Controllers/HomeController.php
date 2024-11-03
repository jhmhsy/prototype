<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Equipment;

class HomeController extends Controller
{
    //
    public function index()
    {
        $equipments = Equipment::all();
        return view('welcome', compact('equipments'));
    }
    public function showmap()
    {
        return view('gym-map');
    }

}