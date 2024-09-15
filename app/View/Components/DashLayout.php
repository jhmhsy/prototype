<?php
namespace App\View\Components;

use Illuminate\View\Component;

class DashLayout extends Component
{
    public function render()
    {
        // Correct the path to 'layouts.dash'
        return view('layouts.dash');
    }
}