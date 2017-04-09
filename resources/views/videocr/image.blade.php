@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Text in Image</div>
                        <div class="panel-body">

                            <div class="col-md-6">
                                <textarea id="textarea" name="textarea" cols="50" rows="10">{{ $text }}</textarea>
                                <br /><br />
                                <a class="btn btn-primary" href="/videocr">Back</a>
                            </div>


                            <div class="col-md-6">

                                {{--<button id="copyBtn" name="copyBtn" type="button" class="btn btn-primary" onclick="copyToClipboard(document.getElementById('textarea').innerHTML)">Copy</button>--}}
                                <button id="copyBtn" name="copyBtn" type="button" class="btn btn-primary" onclick="copyToClipboard('textarea')">Copy</button>

                                <br /><br />

                                <a href="mailto:?subject=Check this out!&body={{ $text }}" class="btn btn-primary">Email</a>

                                <br /><br />

                                <a class="twitter-share-button btn btn-primary"
                                   href="https://twitter.com/intent/tweet?text={{ $text }}"
                                   target="_blank"
                                   data-size="large">
                                    Tweet</a>

                            </div>

                        </div>

                </div>
            </div>
        </div>
    </div>


    {{--BELOW FROM: https://dev.twitter.com/web/javascript/loading--}}
    <script>window.twttr = (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0],
                    t = window.twttr || {};
            if (d.getElementById(id)) return t;
            js = d.createElement(s);
            js.id = id;
            js.src = "https://platform.twitter.com/widgets.js";
            fjs.parentNode.insertBefore(js, fjs);

            t._e = [];
            t.ready = function(f) {
                t._e.push(f);
            };

            return t;
        }(document, "script", "twitter-wjs"));</script>


    {{--BELOW FROM: http://stackoverflow.com/questions/3739330/copy-textarea-text-to-clipboard-html-javascript--}}
    <script>
        function copyToClipboard(id) {
//            window.prompt("Copy to clipboard: Ctrl+C, Enter", text);
            document.getElementById('textarea').select();
            document.execCommand('copy');
        }
    </script>


@endsection