<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\Equipment;
use App\Models\Event;
use App\Models\Prices;
use App\Models\Question;
class HomeController extends Controller
{
    //
    public function index()
    {

        // checks if the auth user has verified or not, id not then proceed to verification and if verified=works normally
        if (Auth::check() && !Auth::user()->hasVerifiedEmail()) {
            return redirect()->route('verification.notice');
        }

        $superadminemail = config('app.superadminemail'); // admin gmail in app/config

        $events = Event::all();
        $prices = Prices::all();

        $equipments = Equipment::all();
        $questions = Question::all();
        return view('welcome', compact('equipments', 'events', 'prices', 'questions', 'superadminemail'));



    }
    public function showmap()
    {
        return view('gym-map');
    }

}