<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HelpController extends Controller
{
    public function index()
    {
        if (!auth()->user()->canany(['help-list'])) {
            abort(404); // forbidden / not found
        }


        return view('administrator.help.index');
    }
}