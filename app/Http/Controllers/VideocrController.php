<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TesseractOCR;
use WrapTesseractOCR;

use App\Http\Requests;

/*
 * This will house the functionality for the actual VideOCR
 * application page.
 */
class VideocrController extends Controller
{
    public function index()
    {
      return view('videocr.show');
    }

  public function pancake()
  {
    $filename = "test1.png";
    $text = (new TesseractOCR(__DIR__ . '/../../../uploads/' . $filename))->run();
    return view('videocr.video', compact('text'));
  }

}
