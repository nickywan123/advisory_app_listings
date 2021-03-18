<?php

namespace App\Http\Controllers;

use App\Listing;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->is_Admin){
            $listings = Listing::all();
            return view('admin.dashboard',compact('listings'));
        }
        return view('home');
    }
}
