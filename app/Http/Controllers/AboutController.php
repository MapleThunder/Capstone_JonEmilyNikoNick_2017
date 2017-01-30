<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

/*
 * This controller holds the functionality regarding the About Next JENN page.
 */
class AboutController extends Controller
{
    public function index()
    {
      return view('about.show');
    }
}
