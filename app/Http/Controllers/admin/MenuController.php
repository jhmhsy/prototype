<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $users = User::count();
        //$sales = 
        return view('administrator.includes.menu', compact('users'));
    }
}