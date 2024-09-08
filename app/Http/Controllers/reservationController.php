<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class reservationController extends Controller
{
    public function show(): View
    {
        return view('subpages.reservation');
    }
}