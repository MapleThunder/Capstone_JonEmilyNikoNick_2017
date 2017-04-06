@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Documentation</div>

                    <div class="panel-body">
                        <p><em>Optical Character Readers and VideOCR</em></p>

                        <p>An Optical Character Reader (OCR) is a piece of software that will provide a text output of any
                            words it finds in the images provided to it. The technology has many uses ranging from detecting
                            text on signs in photography, reading documents in old photographs, to data entry. It is widely
                            used for data entry from various records including books, medical records, bank statements, and
                            even archaeological artifacts.
                        </p>
                        <p>VideOCR is a website meant to provide a simple web-based solution
                            to transcribing written text from a photo or video source. It allows the user
                            to input a video link or upload an image, a screen overlay will cover the paused video or image and
                            retrieve any text in the covered region. This text will then be transcribed for the user into a
                            text area located on the page.
                        </p>

                        <br />

                        <p><em>How it works</em></p>

                        <p>The user can upload an image to the page. The image provided will
                            then populate the image view on the page with the image that was uploaded.
                            The user then clicks the OCR button which covers the image with an overlay. Any text in the image
                            is selected and is read using the OCR and the text then appears in another textbox on the page.
                            Options are given to the user as to what they can do with this text, eg. copy to clipboard, tweet, email, etc.
                        </p>
                        <p>
                            On a separate site page, the user may do the same with a video. The user can paste a YouTube or Vimeo
                            video URL into a textbox. The user is then able to watch the video and pause when needed.
                            When the video is paused, the user then clicks the OCR button and the text on the paused screen
                            then appears in another textbox on the page. Options are given to the user as to what they can
                            do with this text, eg. copy to clipboard, tweet, email, etc.
                        </p>
                        <p>
                            All text selected using the OCR will be stored in a database. Data included in this capture will
                            store all text that has been selected, the URL that was inputted, and the date and time it was selected.
                        </p>
                        <p>
                            The user has the option to register an account with the site. Registered users will have access
                            to a history page so that they are able to see past text selections.
                            This information is retrieved from the database. The same options as when they originally selected
                            the text will be given again, eg. copy to clipboard, tweet, email, etc.
                        </p>

                        <br />

                        <p><em>Technical specifications</em></p>

                            <ul>
                                <li>This website uses the pre-existing OCR software Tesseract OCR.</li>
                                <li>The OCR technology is hosted on the website, which is written in PHP with the use of the Laravel framework.</li>
                                <li>The PHP website is built on top of a LAMP (Linux, Apache, MySQL, PHP) architecture.</li>
                                <li>Github is used as version control software.</li>
                                <li>All text captured through the OCR is stored in a SQLite database for possible future analysis.</li>
                                <li>All registered users are also stored in the SQLite database.</li>
                                <li>All registered users are able to sign in and review their text-capture history.</li>
                            </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection