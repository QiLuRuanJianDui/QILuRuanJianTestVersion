@extends('layouts.app')

@section('content')


    <div class="container">
        <a class="col-md-10 col-md-offset-1 btn btn-success" href="{{url('/my/'.Auth::user()->id).'/template'}}" style="margin-top: 30px;margin-bottom: 30px;">add</a>
@foreach($user->myGames as $game)
        <div class="row">
            <div class="col-md-10 col-md-offset-1" v-for="game in games">
                <div class="panel panel-default">
                    <div class="panel-heading">creator:{!! $user->name !!}-->name{!! $game->id !!}</div>
                    <div class="panel-body">
                        {!! $game->introduction !!}<br>
                        <a class="btn btn-default" href="{{url('/my/'.$user->id).'/game/'.$game->id}}">编辑</a>
                        <a class="btn btn-danger">删除</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>
    @push('scripts')
    <script src="/js/showGamesController.js"></script>
    @endpush
@endsection
