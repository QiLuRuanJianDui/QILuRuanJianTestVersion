@extends('layouts.app')

@section('content')


    <div class="container animated fadeInUp" id="makeGameController">
        <div class="row">
            <div class="panel panel-default panel-body">
                <div class="col-md-10 col-md-offset-1">
                    <label for="setN">请输入障碍物的个数:</label><br>
                    <input type="text" v-model="n" id="setN">
                    <button class="btn btn-default" @click="setListLength(n)">确定</button>
                    <form enctype="multipart/form-data" class="form-group" action="{{url('/my/template/'.$template->id.'/addGame')}}" method="post">


                        <div class="form-group">
                            <br>请输入你的游戏名称:<br>
                            <input type="text" id="name" name="name" class="form-control" v-model="name">
                            <br>请输入您的游戏介绍:<br>
                            <textarea name="introduction" id="introduction" cols="30" rows="10" class="form-control" v-model="introduction"></textarea>
                            <br>请选择配图:<br>
                            <input type="file" name="illustration">
                        </div>

                        <div class="form-group">
                            请选择主角图片资源: <br>
                            <input type="file" name="mainSpirit" placeholder="mainSpirit" class="form-control">
                            <input type="text" name="mainSpiritX" placeholder="mainSpiritX"  class="form-control" :value="0.2" >
                            <input type="text" name="mainSpiritR"  class="form-control" placeholder="mainSpiritR" :value="50" >
                        </div>

                        <div class="form-group">
                            请输入障碍物的速度: <br>
                            <input type="text" name="spiritsV" class="form-control" placeholder="spiritsV" value="1">
                        </div>
                        <br>
                        <input type="hidden" name="spiritLength" :value="spiritList.length" class="form-control">
                        <div class="form-group" v-for="spirit in spiritList">
                            <br>障碍物@{{ $index + 1 }}图片: <br>
                            <input type="file" :name="'spirit' +spirit " class="form-control" placeholder="spirit">
                            <br>障碍物@{{ $index + 1 }}的半径: <br>
                            <input type="text" :name="'spiritY' +spirit" class="form-control" placeholder="spiritY" :value="Math.random()">
                            <br>障碍物@{{ $index + 1 }}出现的Y方向位置: <br>
                            <input type="text" :name="'spiritR' +spirit" class="form-control" placeholder="spiritR" value="50">
                        </div>
                        {{csrf_field()}}
                        <button class="btn btn-primary" :disabled="!name">submit</button><span style="color:red ;" v-show="!name">请输入游戏名称</span>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
@push('scripts')
<script src="/js/makeGamesController.js"></script>
@endpush

