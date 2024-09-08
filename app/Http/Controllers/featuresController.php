<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class FeaturesController extends Controller
{


    public function show(): View
    {
        return view('subpages.features');
    }
}