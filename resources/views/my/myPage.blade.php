@extends('layouts.app')

@section('content')


    <div class="container animated fadeInUp" id="myGameController">

        <a class="col-md-3 col-xs-3 pull-right btn btn-success" href="{{url('/my/'.Auth::user()->id).'/template'}}" style="margin-top: 5px;">制作我自己的游戏</a>


        <div class="row">

            <div class="panel panel-default">
                <div class="panel panel-heading">我的游戏</div>

                <div class="panel-body">
                    <div v-for="game in games">
                        <div class="panel panel-default">
                            <div class="panel-heading">@{{game.name}}</div>
                            <div class="panel-body">
                                @{{game.introduction}}<br>
                                <img :src="game.illustration" class="img-responsive" style="padding-bottom: 10px;">
                                <a class="btn btn-default" :href="'/my/'+game.user_id+'/game/'+game.id">编辑</a>
                                <a class="btn btn-danger" @click="deleteThisGame(game.id)">删除</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @push('scripts')
    <script src="/js/myGameController.js"></script>
    @endpush
@endsection
