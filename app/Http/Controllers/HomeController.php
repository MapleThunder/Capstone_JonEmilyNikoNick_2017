<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\ReadText;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $texts = Auth::user()->readTexts;

        return view('home', compact('texts'));
    }
}
