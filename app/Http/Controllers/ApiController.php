<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Game;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class ApiController extends Controller
{
    /**
     * check if the user is login
     *
     * @return String
     * */
    function check(){
        return response()->json(Auth::check());
    }
    /**
     * return all games
     *@return array
     */
    function showGames(){
        return Game::all();
    }
    /**
     *return the game config
     * @param int $game_id
     * @return string
     **/
    function showConfig($game_id){
        if(Game::findOrFail($game_id)){
            $filename = $game_id.'.json';
            return response()->json(json_decode(Storage::get($filename)));
        }else{
            return 'file is no found';
        }
    }

    /**
     * @param int $game_id
     * @return string json
     **/

    function showComment($game_id){
        return Comment::orderBy('created_at','desc')->where('game_id',$game_id)->get();
    }


    /**
     * @param int $game_id
     * @param  \Illuminate\Http\Request
     * @return string
     **/
    function storeComment($game_id,Request $request){
        $comment = new Comment();
        if($request->input('comment')){
            $comment->user_id = Auth::user()->id;
            $comment->user_name = Auth::user()->name;
            $comment->comment = $request->input('comment');
            $comment->game_id = $game_id;
            $comment->save();
        }else{
            return $request;
        }
        return response()->json($comment);
    }
}
