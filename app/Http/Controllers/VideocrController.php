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
        $target_dir = __DIR__ . '/../../../uploads/';
        $target_file = $_FILES["imgUp"]["name"];

        $text = (new TesseractOCR($_FILES["imgUp"]))->run();

        var_dump($text); die();

        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"]))
        {
            $check = getimagesize($_FILES["imgUp"]["tmp_name"]);
            if($check !== false)
            {
              echo "File is an image - " . $check["mime"] . ".";
              $uploadOk = 1;
            }
            else
            {
              echo "File is not an image.";
              $uploadOk = 0;
            }
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        }
        else
        {
            if (move_uploaded_file($_FILES["imgUp"]["tmp_name"], $target_file))
            {
                echo "The file ". basename( $_FILES["imgUp"]["name"]). " has been uploaded.";
            }
            else
            {
                echo "Sorry, there was an error uploading your file.";
            }
        }



      if (isset($request->imgUp))
      {
          $imageName = 'tmpImg.png';
          // Get the image
          $image = $request->files->get('imgUp');
          // Move it temporarily
          $imageLoc = __DIR__ . '/../../../uploads/' . $imageName;
          $image->move($imageLoc);

          $text = (new TesseractOCR($imageLoc))->run();
          var_dump($text); die();
      }
  }

}
