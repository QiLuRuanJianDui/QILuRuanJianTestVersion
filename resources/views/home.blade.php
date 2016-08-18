@extends('layouts.app')

@section('content')


    <div class="container">

        <div class="row">
            <a class="col-md-10 col-md-offset-1 btn btn-success" href="{{url('/my/'.Auth::user()->id)}}" style="margin-top: 30px;margin-bottom: 30px;">add</a>
            @foreach($games as $game)
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{!! $game->name !!}</div>
                    <div class="panel-body">
                        {!! $game->introduction !!}
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

