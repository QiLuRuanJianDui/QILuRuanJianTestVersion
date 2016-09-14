@extends('layouts.app')

@section('content')


    <div class="container">

        <div class="row">
            @foreach($templates as $template)
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">{!! $template->name !!}</div>
                        <div class="panel-body">
                            <img src="/images/template_0.jpg" class="img-responsive" style="margin-bottom: 10px;">
                            <a href="{{url('/my/template/'.$template->id.'/addGame')}}" class="col-md-10 col-xs-10 col-md-offset-1 btn btn-success">开始</a>
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

