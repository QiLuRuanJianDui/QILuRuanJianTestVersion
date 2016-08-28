@extends('layouts.app')

@section('content')
    <h1 style="display: none;" id="game_id">{!! $game->id !!}</h1>
    <h1 style="display: none;" id="game_config">{!! json_encode($config) !!}</h1>
    <h1 style="display: none;" id="authCheck">{!! Auth::check() !!}</h1>

    <div class="container" id="playController">
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div id="content">
                        <button id="start" class="animated bounceInDown">开始游戏</button>
                        <canvas id="canvas" ></canvas>
                        <script src="/templateJs/{{$game->template_id . '.js'}}"></script>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form action="#" class="form-group" @submit.prevent = "addComment">
                        <div class="form-group">
                            <textarea name="comment" id="comment" rows="5" class="form-control" v-model="comment.comment"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary pull-right">评论</button>
                    </form>
                </div>

            </div>

            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default" v-for="comment in comments">
                    <div class="panel-heading">@{{ comment.id }}</div>
                    <div class="panel-body">
                        @{{ comment.comment }}<br>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@push('scripts')
<script src="/js/playController.js"></script>
@endpush


