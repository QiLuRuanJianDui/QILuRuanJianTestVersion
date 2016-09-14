@extends('layouts.app')

@section('content')


    <div class="container">

        <div class="row">
            @if(!Auth::guest())
                    <a class="col-md-12 col-md-offset-0 col-xs-10 col-xs-offset-1 madeButton btn btn-success animated rubberBand" href="{{url('/my/'.Auth::user()->id)}}"><span class="madeBtn glyphicon glyphicon-plus">制作我自己的游戏</span></a>
                    @else
                        <a class="col-md-12 col-md-offset-0 col-xs-10 col-xs-offset-1 madeButton btn btn-success animated rubberBand" href="{{url('/login')}}"><span class="madeBtn glyphicon glyphicon-plus">登录后制作自己游戏哦</span></a>
            @endif
            @foreach($games as $game)
                <div class=" forBtn col-md-12 col-xs-12 panel panel-default animated fadeInUp" style="padding: 0;">
                    <div class="panel-heading" style="text-align: center;"><span>{!! $game->name !!}</span></div>
                    <div class="panel-body">
                        <img src="{{ $game->illustration }}" class="img-responsive">

                        <div class="introduction animated bounceInUp">
                            {!! $game->introduction !!}<br>
                        </div>
                        <a href="{{url('/game/'.$game->id)}}" class="btn btn-success show-btn">PLAY</a>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
{{--@push('scripts')
<script src="/js/showGamesController.js"></script>
@endpush--}}

