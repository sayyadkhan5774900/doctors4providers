<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function registration()
    {
        return view('frontend.registration');
    }
   
    public function landing()
    {
        return view('welcome');
    }
}
