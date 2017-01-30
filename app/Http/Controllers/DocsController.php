<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

/*
 *  This controller holds the functionality regarding the Documentation page(s).
 */
class DocsController extends Controller
{
  public function index()
  {
    return view('docs.show');
  }
}
