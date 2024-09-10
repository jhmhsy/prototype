<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class featuresController extends Controller
{


    public function show(): View
    {
        return view('subpages.features');
    }
}