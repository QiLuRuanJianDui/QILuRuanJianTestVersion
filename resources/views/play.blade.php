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
                            <div id="gameState" class="col-md-6 col-md-offset-3 col-xs-10 col-xs-offset-1" style="font-size: 40px; color: white; text-align: center;"></div>
                            <button id="start" class="btn btn-success playBtn animated bounceInUp col-md-6 col-md-offset-3 col-xs-10 col-xs-offset-1" style="z-index: 10;"><span class="btnText">开始游戏</span></button>

                        <canvas id="canvas" ></canvas>
                        <script src="/templateJs/{{$game->template_id . '.js'}}"></script>
                    </div>
                    <div class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a></div>
                    <script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"32"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
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

               <div class="panel panel-default panel-body">
                   <div class="panel panel-default animated bounceInLeft" v-for="comment in comments">
                       <div class="panel-heading">@{{ comment.user_name }}发表于@{{ comment.created_at }}</div>
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


