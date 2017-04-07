@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Past Readings</h4></div>

                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    Text
                                </th>
                                <th>
                                    Date Read
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($texts as $text)
                            <tr>
                                <td>{{ $text->content }}</td>
                                <td>{{ $text->created_at }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
