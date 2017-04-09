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
  private $driver;

    public function index()
    {
      return view('videocr.show');
    }

  public function PerformTextgrab()
  {
    $filename = "test1.png";
    $text = (new TesseractOCR(__DIR__ . '/../../../uploads/' . $filename))->run();
    return view('videocr.video', compact('text'));
  }

  public function TakeScreenshot(Request $request) {
    session_start();
    //getting Selenium running for host:
    //https://gist.github.com/kyleian/b049b066e787f2599063b21208b6d8bf
    //http://chandrewz.github.io/blog/selenium-on-centos
    $host = 'http://localhost:4444/wd/hub';
    if(isset($_SESSION["active_driver"]))
    {
      $this->driver = RemoteWebDriver::createBySessionID($_SESSION["active_driver"], $host);
    }
    else
    {
      //The $options and $caps lines can be replaced by the comment on the RemoteWebDriver::create line
      $options = new Chrome\ChromeOptions();
      $options->addExtensions(array(
        '/home/inet2005/4.2.1_0.crx'
      ));
      $caps = DesiredCapabilities::chrome();
      $caps->setCapability(Chrome\ChromeOptions::CAPABILITY, $options);
      $host = 'http://localhost:4444/wd/hub';
      $this->driver = RemoteWebDriver::create($host, $caps); //  RemoteWebDriver::create($host, DesiredCapabilities::chrome());
      $_SESSION["active_driver"] = $this->driver->getSessionID();
      //$this->driver = RemoteWebDriver::create($host,  DesiredCapabilities::chrome());
      //$_SESSION["active_driver"] = $this->driver->getSessionID();
    }

    $driver = $this->driver;

    $pancake = $_POST["tessUrl"];
    $driver->get($pancake);
    //$driver->get('https://youtu.be/SeOTOQWM1RU?t=32');
    $driver->navigate();

    //pausing code execution here for .5 seconds to give youtube time to load in Selenium. Avoids taking a screenshot of
    // a black page as the video loads.
    time_nanosleep(0, 500000000);

    $element = $driver->findElement(\Facebook\WebDriver\WebDriverBy::id('movie_player'));// (WebDriverBy::id("movie_player"));

    // Change the Path to your own settings
    $screenshot = __DIR__ . "/../../../uploads/tempScreenshot.png";

    // Change the driver instance
    $driver->takeScreenshot($screenshot);
    /*
    if(!file_exists($screenshot)) {
      throw new Exception('Could not save screenshot');
    }*/
    $element_screenshot = __DIR__ . "/../../../uploads/tempScreenshot.png"; // Change the path here as well

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
    $embedUrl = $_POST["embedUrl"];

    $text = (new TesseractOCR($element_screenshot))->run();
    // Clean up the text a bit
    //get rid of some of the common strings that get read in because of the timestamp on the video.
    $text =  strpos($text, 'II')? substr($text, 0, strpos($text, 'II')): $text;
    $text =  strpos($text, '||')? substr($text, 0, strpos($text, '||')): $text;
    $text =  strpos($text, 'u n')? substr($text, 0, strpos($text, 'u n')): $text;
    $text =  htmlspecialchars($text);
    $text = rtrim($text);
    return view('videocr.video', compact('text','embedUrl'));
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
            $readText->user_id = $request->read_for_user;
        }
        else
        {
            $readText->user_id = 1;
        }
        $readText->save();

        return view("videocr.image", compact("text"));
    }

}
