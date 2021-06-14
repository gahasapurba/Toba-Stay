<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PusatbantuanController extends Controller
{
    public function index()
    {
        return view('pusat.pusatbantuan');
    }
}
