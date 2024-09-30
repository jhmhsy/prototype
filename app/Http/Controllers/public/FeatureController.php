<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FeatureController extends Controller
{


    public function show(): View
    {
        return view('subpages.features');
    }
}