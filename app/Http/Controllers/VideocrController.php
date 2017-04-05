<?php

namespace App\Http\Controllers;

use App\ReadText;
use Illuminate\Http\Request;
use TesseractOCR;
use WrapTesseractOCR;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Chrome;
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

  public function TakeScreenshot($element=null) {
    //The original TakeScreenshot before being optimized for this project: https://github.com/facebook/php-webdriver/wiki/taking-full-screenshot-and-of-an-element


    //setting up Chrome so that youtube adblocker extension will be applied.
    //$options = new Chrome\ChromeOptions();
    //TODO try adding encoded extension instead: https://facebook.github.io/php-webdriver/1.3.0/Facebook/WebDriver/Chrome/ChromeOptions.html#method_addEncodedExtensions
    //$options->addExtensions(array(
    //  '/home/inet2005/4.2.1_0.crx'
    //));
    //$caps = DesiredCapabilities::chrome();
    //$caps->setCapability(Chrome\ChromeOptions::CAPABILITY, $options);

    //$screenshot_of_element = TakeScreenshot($this->driver->findElement(WebDriverBy::id("movie_player"));
    //getting Selenium running for host:
    //https://gist.github.com/kyleian/b049b066e787f2599063b21208b6d8bf
    //http://chandrewz.github.io/blog/selenium-on-centos
    $host = 'http://localhost:4444/wd/hub';
    $driver = RemoteWebDriver::create($host,  DesiredCapabilities::chrome());

    //testing hitting a website with the browser
    //$driver->navigate('http://www.wikipedia.org/');
    $driver->get('https://youtu.be/hyoTNwyjYno?t=76');
    $element = $driver->findElement(\Facebook\WebDriver\WebDriverBy::id('movie_player'));// (WebDriverBy::id("movie_player"));

    // Change the Path to your own settings
    $screenshot = __DIR__ . "/../../../uploads/testScreenshot.png";

    // Change the driver instance
    $driver->takeScreenshot($screenshot);
    /*
    if(!file_exists($screenshot)) {
      throw new Exception('Could not save screenshot');
    }*/

    if( ! (bool) $element) {
      return $screenshot;
    }

        $element_screenshot = __DIR__ . "/../../../uploads/testScreenshot.png"; // Change the path here as well

        $element_width = $element->getSize()->getWidth();
        $element_height = $element->getSize()->getHeight();

        $element_src_x = $element->getLocation()->getX();
        $element_src_y = $element->getLocation()->getY();

        // Create image instances
        $src = imagecreatefrompng($screenshot);
        $dest = imagecreatetruecolor($element_width, $element_height);

        // Copy
        imagecopy($dest, $src, 0, 0, $element_src_x, $element_src_y, $element_width, $element_height);

        imagepng($dest, $element_screenshot);

    // unlink($screenshot); // unlink function might be restricted in mac os x.
/*
    if( ! file_exists($element_screenshot)) {
      throw new Exception('Could not save element screenshot');
    }*/

    return $element_screenshot;
    }

  public function showVideo(Request $request)
  {
    if (isset($request->url) && $request->url != "")
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
          $embedUrl = "ERROR";
      }

      return view("videocr.video", compact("embedUrl"));
    }

  }

    public function readImage(Request $request)
    {
        // Grab the image
        $target_file = $_FILES["imgUp"]["name"];
        // Recognize the text
        $text = (new TesseractOCR($_FILES["imgUp"]["tmp_name"]))->run();

        $readText = new ReadText();
        $readText->content = $text;
        // Add the user or a 0 for a guest.
        if(isset($request->read_for_user))
        {
            $readText->read_for_user = $request->read_for_user;
        }
        else
        {
            $readText->read_for_user = 1;
        }
        $readText->save();

        return view("videocr.image", compact("text"));
    }

}
