@extends('layouts.app')

@section('content')


    <div class="container">

        <div class="row">
            @foreach($templates as $template)
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">{!! $template->name !!}</div>
                        <div class="panel-body">
                            {!! $template->help !!}<br>
                            <a href="{{url('/my/template/'.$template->id.'/addGame')}}" class="btn btn-success">go</a>
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

