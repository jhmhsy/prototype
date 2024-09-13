<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class dashboardController extends BaseController
{
    public function __construct()
    {
        // checking dashboard permissions
        $this->middleware('permission:is-admin', ['only' => ['show']]);
    }

    public function show(): View
    {
        return view('administrator.dashboard');
    }
}