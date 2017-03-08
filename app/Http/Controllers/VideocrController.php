<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    $filename = "testScreenshot.png";
    $tesseract = new TesseractOCR(__DIR__ . '/../uploads/' . $filename);
    $text = $tesseract->recognize();
    return $text;
  }

}
