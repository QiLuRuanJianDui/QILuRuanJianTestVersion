@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{!! $game->id !!}</div>
                    <div class="panel-body">
                        {!! $game->name !!}<br>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($game->hasManyComments as $comment)
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{!! $comment->id !!}</div>
                    <div class="panel-body">
                        {!! $comment->comment !!}<br>
                    </div>
                </div>
            </div>
                @endforeach
        </div>
    </div>
@endsection


