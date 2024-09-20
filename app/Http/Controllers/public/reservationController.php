<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class reservationController extends Controller
{

    public function index()
    {
        return view('administrator.includes.reservations');
    }

}