@extends('layouts.app')

@section('content')


    <div class="container animated fadeInUp" id="editGamesController">
        <div class="panel panel-body">
            <div class="row">
                <h1 style="display: none;" id="game_id">{{$game->id}}</h1>
                <div class="col-md-10 col-md-offset-1">
                    <label for="setN">请输入您需要的障碍物个数:</label><br>
                    <input type="text" v-model="n" id="setN">
                    <button class="btn btn-default" @click="setListLength(n)">确定</button>
                    <form enctype="multipart/form-data" class="form-group" action="{{url('/my/'.$game->id.'/updateGame')}}" method="post">
                        {{method_field('PUT')}}

                        <div class="form-group">
                            <label for="name">请输入你的游戏名称:</label>
                            <input type="text" id="name" name="name" class="form-control" v-model="name" value="{{$game->name}}">
                            <label for="introduction">请输入您的游戏介绍:</label>
                            <textarea name="introduction" id="introduction" cols="30" rows="10" class="form-control" v-model="introduction" value="{{$game->introduction}}"></textarea>
                            <img src="{{$game->illustration}}" class="img-responsive" style="margin: 10px 0 10px 0;">
                            <label for="figure">请选择更换后配图:</label>
                            <input type="file" name="illustration">
                        </div>
                        <div class="form-group">
                            请选择主角的图片: <br>
                            <img :src="config.mainSpirit.src">
                            <input type="file" name="mainSpirit" placeholder="mainSpirit" class="form-control">
                            请输入主角出现的位置: <br>
                            <input type="text" name="mainSpiritX" placeholder="mainSpiritX"  class="form-control" :value="config.mainSpirit.x">
                            请输入主角的半径: <br>
                            <input type="text" name="mainSpiritR"  class="form-control" placeholder="mainSpiritR" :value="config.mainSpirit.r">
                        </div>

                        <div class="form-group">
                            请输入障碍物的速度: <br>
                            <input type="text" name="spiritsV" class="form-control" placeholder="spiritsV" :value="config.spiritsV">
                        </div>
                        <br>
                        <input type="text" name="spiritLength" :value="config.spirits.length" class="form-control">
                        <div class="form-group" v-for="spirit in config.spirits">
                            @{{ '请选择障碍物' + $index+1 + '的图片资源:'}} <br>
                            <img :src="spirit.src">
                            <input type="file" :name="'spirit' +$index " class="form-control" placeholder="spirit">
                            @{{ '请输入障碍物' + $index+1 + '出现的位置:'}} <br>
                            <input type="text" :name="'spiritY' +$index" class="form-control" placeholder="spiritY" :value="spirit.y">
                            @{{ '请输入障碍物' + $index+1 + '的半径:'}} <br>
                            <input type="text" :name="'spiritR' +$index" class="form-control" placeholder="spiritR" :value="spirit.r" >
                        </div>
                        {{csrf_field()}}
                        <button class="btn btn-primary">submit</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
@push('scripts')
<script src="/js/editGamesController.js"></script>
@endpush

