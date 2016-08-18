@extends('layouts.app')

@section('content')


    <div class="container">

        <div class="row">
            @if(!Auth::guest())
            <a class="col-md-10 col-md-offset-1 btn btn-success" href="{{url('/my/'.Auth::user()->id)}}" style="margin-top: 30px;margin-bottom: 30px;">add</a>
                @else
                <a class="col-md-10 col-md-offset-1 btn btn-success" href="{{url('/login')}}" style="margin-top: 30px;margin-bottom: 30px;">add</a>
            @endif
            @foreach($games as $game)
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{!! $game->name !!}</div>
                    <div class="panel-body">
                        {!! $game->introduction !!}<br>
                        <a href="{{url('/game/'.$game->id)}}" class="btn btn-success">PLAY</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
@endsection
{{--@push('scripts')
<script src="/js/showGamesController.js"></script>
@endpush--}}

