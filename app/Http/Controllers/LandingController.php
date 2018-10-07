<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Local;

class LandingController extends Controller
{
    function index()
    {
        //$locals = Local::orderBy('name', 'ASC')->pluck('name', 'id');
        $locals = Local::select('name', 'id')->get();

        return view('welcome', compact('locals'));
    }
}
