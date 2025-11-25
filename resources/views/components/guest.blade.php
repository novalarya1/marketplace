<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Guest extends Component
{
    public function render()
    {
        return view('layouts.guest');
    }
}
