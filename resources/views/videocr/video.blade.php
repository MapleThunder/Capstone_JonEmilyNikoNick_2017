@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">VideOCR</div>

                    <div class="panel-body">
                        <div id="iframeDiv">
                            <iframe width="560" height="315" src="{{$embedUrl}}" frameborder="0" allowfullscreen></iframe>
                            <!--example youtube link: https://www.youtube.com/watch?v=Jimm11oUrro-->

                        </div>
                    </div>

                    <div class="panel-body">
                        Instructions:<br>
                        1. Pause the video on the screen you want to capture text from<br>
                        2. Right click youtube video, and choose the "Copy video URL at current time" option.<br>
                        3. Paste the link from your clipboard into the textbox below.<br>
                        4. Click "Go!"
                        <br>
                        <div id="formDiv">
                            <form method="POST" action="/videoTess" >
                                {{csrf_field()}}
                                <input type="hidden" name="embedUrl" value="{{$embedUrl}}" />
                                Current Time URL: <input type="text" id="tessUrl" name="tessUrl">
                                <input type="submit" value="GO!">
                            </form>
                        </div>
                    </div>
                    <?php
                    if(isset($text))
                    {
                        echo
                        "
                        <div class='row'>
                            <div class='col-md-10 col-md-offset-1'>
                                <div class='panel panel-default'
                                    <div class='panel-heading'>Text Captured from Video</div>
                                    <div class='panel-body'>
                                        <textarea cols='50' rows='10'>$text</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        ";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
@endsection