<?php

namespace App\Http\Controllers;

class AboutController extends Controller
{
    //
    public function getIndex()
    {
        return view('about.home');
    }
}
