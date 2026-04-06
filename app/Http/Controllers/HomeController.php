<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
        {
            $profile = \App\Models\Profile::first();
            return view ('home', compact('profile'));
        }
}
