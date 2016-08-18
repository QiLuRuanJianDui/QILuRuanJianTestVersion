@extends('layouts.app')

@section('content')


    <div class="container">

        <div class="row">

                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">{!! $game->name !!}</div>
                        <div class="panel-body">
                            {!! $game->introduction !!}
                        </div>
                    </div>
                </div>

        </div>

    </div>
@endsection
{{--@push('scripts')
<script src="/js/showGamesController.js"></script>
@endpush--}}

