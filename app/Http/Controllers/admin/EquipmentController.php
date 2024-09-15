<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    public function index()
    {
        return view('administrator.includes.equipments');
    }
}