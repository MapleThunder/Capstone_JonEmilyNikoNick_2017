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
                                @if (isset(Auth::user()->id))
                                    <input type="hidden" name="read_for_user" value="{{ Auth::user()->id }}" />
                                @endif
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
                                        <textarea id='textarea' cols='50' rows='10'>$text</textarea>
                                        <br /><br />
                                        <a class='btn btn-primary' href='/videocr'>Back</a>
                                    </div>

                                    <div class='col-md-6'>
                                        <button id='copyBtn' name='copyBtn' type='button' class='btn btn-primary' onclick=copyToClipboard('textarea')>Copy</button>

                                        <br /><br />

                                        <a href='mailto:?subject=Check this out!&body={{ $text }}' class='btn btn-primary'>Email</a>

                                        <br /><br />

                                        <a class='twitter-share-button btn btn-primary'
                                           href='https://twitter.com/intent/tweet?text={$text}'
                                           target='_blank'
                                           data-size='large'>
                                                   Tweet</a>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>window.twttr = (function(d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0],
                                    t = window.twttr || {};
                            if (d.getElementById(id)) return t;
                            js = d.createElement(s);
                            js.id = id;
                            js.src = 'https://platform.twitter.com/widgets.js';
                            fjs.parentNode.insertBefore(js, fjs);

                            t._e = [];
                            t.ready = function(f) {
                                t._e.push(f);
                            };

                            return t;
                        }(document, 'script', 'twitter-wjs'));</script>
                    <script>
                        function copyToClipboard(id) {
                            document.getElementById('textarea').select();
                            document.execCommand('copy');
                        }
                    </script>
                        ";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
@endsection