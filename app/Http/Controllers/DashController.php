<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\View\View;

class DashController extends Controller
{
    //
    public function __construct()
    {
        // checking dashboard permissions
        $this->middleware('isAdmin', ['only' => ['show']]);
    }

    public function show(): View
    {
        return view('administrator.dashboard');
    }
}
