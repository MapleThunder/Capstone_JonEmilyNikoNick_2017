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
                </div>
            </div>
        </div>
    </div>
@endsection