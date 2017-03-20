@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">VideOCR</div>

                    <div class="panel-body">
                        This is the page that will have the actual working application on it.
                        <br>
                        <div id="formDiv">
                            <form method="POST" action="/videocr" >
                                {{csrf_field()}}
                                Video EMBED url: <input type="text" id="url" name="url">
                                <input type="submit" value="GO!">
                            </form>
                        </div>

                    </div>
                    <div class="panel-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection