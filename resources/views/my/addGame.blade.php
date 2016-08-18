@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">{!! $template->id !!}</div>
                        <div class="panel-body">
                            {!! $template->name !!}<br>
                            <button class="btn btn-primary">submit</button>
                        </div>
                    </div>
                </div>
        </div>

    </div>
@endsection
{{--@push('scripts')
<script src="/js/showGamesController.js"></script>
@endpush--}}

