<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalendarController extends Controller
{
    protected function index()
    {
        return view('calendar');
    }
}
