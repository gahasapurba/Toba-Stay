<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        return view('home');
    }

    public function nav()
    {
        
    }

    

    public function search()
    {
        $lists = DB::table('akomodasis')->where('status_akomodasi', 'ver')->paginate(20);

        return view('/search', compact('lists'));
    }
}
