@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Video</div>

                    <div class="panel-body">
                        If you want to capture text from a youtube video...
                        <br>
                        <div id="formDiv">
                            <form method="POST" action="/videocr" >
                                {{csrf_field()}}
                                Youtube video url: <input type="text" id="url" name="url">
                                <input type="submit" value="GO!">
                            </form>
                        </div>

                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">Image</div>
                    <div class="panel-body">
                        <form method="POST" action="/videocr/image" enctype="multipart/form-data" >
                            {{csrf_field()}}
                            @if (isset(Auth::user()->id))
                                <input type="hidden" name="read_for_user" value="{{ Auth::user()->id }}" />
                            @endif
                            <input type="file" name="imgUp" id="imgUp" />
                            <input type="submit" value="Read Image" />
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection