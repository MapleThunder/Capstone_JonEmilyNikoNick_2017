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

  public function showVideo(Request $request)
  {
    if (isset($request->url))
    {

      $url = $request->url;

      $width = "560";
      $height = "315";

      if (strpos($url, 'youtube')) {
        //regex to find video code
        $videoCode = substr($url, strpos($url, "v=") + 2);
        //once code isolated, add to end of embedUrl string
        $embedUrl = "https://www.youtube.com/embed/" . $videoCode;
      } elseif (strpos($url, 'vimeo')) {
        //regex to find video code
        $videoCode = substr($url, strpos($url, "vimeo.com/") + 10);
        //once code isolated, add to end of embedUrl string
        $embedUrl = "https://player.vimeo.com/video/" . $videoCode;
      } else {
        //??? yer fucked bruh
      }

      return view("videocr.video", compact("embedUrl"));
    }
  }

}
