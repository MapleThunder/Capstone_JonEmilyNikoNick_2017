@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <ul id="myTab" class="nav nav-tabs bordered">
                    <li class="active">
                        <a href="#one" data-toggle="tab">
                            <i class="fa fa-video-camera"></i><span class="hidden-xs"> Video</span>
                        </a>
                    </li>
                    <li>
                        <a href="#two" data-toggle="tab">
                            <i class="fa fa-camera-retro"></i><span class="hidden-xs"> Image</span>
                        </a>
                    </li>
                </ul>
                <form method="POST" action="/videocr" >
                <div class="tab-pane fade in active" id="one">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-1">
                            <div class="row">
                                <div class="col-sm-5"><h4 class="text-primary">OCR a Video</h4></div>
                            </div>
                            <div class="row">
                                This is the page that will have the actual working application on it.
                                <br>
                                <div id="formDiv">

                                        {{csrf_field()}}
                                        Video EMBED url: <input type="text" id="url" name="url">
                                </div>

                            </div>


                        </div>
                    </div>
                </div>

                <!-- FIXME: This is placing the content lower than it should -->
                <div class="tab-pane fade" id="two">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-1">
                            <div class="row">
                                <div class="col-sm-5"><h4 class="text-primary">OCR an Image</h4></div>
                            </div>
                            <div class="row">
                                <div id="target span4">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <input type="submit" value="GO!">
                </form>


            </div>
        </div>
    </div>

    <script src="js/videocr-image.js"></script>
@endsection