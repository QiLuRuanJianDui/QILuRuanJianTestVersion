@extends('layouts.app')

@section('content')


    <div class="container" id="makeGameController">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <input type="text" v-model="n" id="setN">
                <label for="setN"></label>
                <button class="btn btn-default" @click="setListLength(n)">setN</button>
                <form enctype="multipart/form-data" class="form-group" action="{{url('/my/template/'.$template->id.'/addGame')}}" method="post">

                    <div class="form-group">
                        mainSpirit: <br>
                        <input type="file" name="mainSpirit" placeholder="mainSpirit" class="form-control">
                        <input type="text" name="mainSpiritX" placeholder="mainSpiritX"  class="form-control" :value="0.2" >
                        <input type="text" name="mainSpiritR"  class="form-control" placeholder="mainSpiritR" :value="50" >
                    </div>

                    <div class="form-group">
                        spirit-v: <br>
                        <input type="text" name="spiritsV" class="form-control" placeholder="spiritsV" value="1">
                    </div>
                    <br>

                    spiritLength: <br>
                    <input type="text" name="spiritLength" :value="spiritList.length" class="form-control">
                    <div class="form-group" v-for="spirit in spiritList">
                        @{{ 'spirit' + spirit + ':'}} <br>
                        <input type="file" :name="'spirit' +spirit " class="form-control" placeholder="spirit">
                        <input type="text" :name="'spiritY' +spirit" class="form-control" placeholder="spiritY" :value="Math.random()">
                        <input type="text" :name="'spiritR' +spirit" class="form-control" placeholder="spiritR" value="50">
                    </div>
                    {{csrf_field()}}
                    <button class="btn btn-primary">submit</button>


                </form>
                </div>
        </div>

    </div>
@endsection
@push('scripts')
<script src="/js/makeGamesController.js"></script>
@endpush

