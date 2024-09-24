<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\View\View;
use \App\Models\User;

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
        try{
            $users = User::count();
        //$sales = 
        
        }catch(\Exception $e){
            $users = 0;
        };
        //return dd($users);
        return view('administrator.dashboard', compact('users'));
    }
}
