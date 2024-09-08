<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ReservationController extends Controller
{


    public function show(): View
    {
        return view('subpages.reservation');
    }
}