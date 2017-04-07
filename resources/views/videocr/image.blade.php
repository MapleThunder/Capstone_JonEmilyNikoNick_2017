@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Text in Image</div>
                        <div class="panel-body">

                            <div class="container-fluid">

                                <div class="row">

                                    <div class="col-lg-6>" style="background-color:yellow;">
                                        <textarea id="textarea" cols="50" rows="10">{{ $text }}</textarea>
                                    </div>


                                    <div class="col-lg-6>" style="background-color:pink;">

                                        {{--<button type="button" class="btn btn-primary" onclick="ClipBoard({{ $text }});">Copy</button>--}}
                                        <button type="button" class="btn btn-primary" onclick="copyToClipboard(document.getElementById('textarea').innerHTML)">Copy</button>

                                        <a href="mailto:?subject=Check this out!" class="btn btn-primary">Email</a>

                                        <a class="twitter-share-button btn btn-primary"
                                           href="https://twitter.com/intent/tweet?text={{ $text }}"
                                           target="_blank"
                                           data-size="large">
                                            Tweet</a>

                                        <br />
                                        <a class="btn btn-primary" href="videocr">Back</a>
                                    </div>

                                </div>
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


    <script>
        function copyToClipboard(text) {
            window.prompt("Copy to clipboard: Ctrl+C, Enter", text);
        }
    </script>


@endsection