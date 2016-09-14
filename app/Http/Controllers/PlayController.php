<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Storage;

class PlayController extends Controller
{
    //
    public function index($id){
        if(Game::findOrFail($id)){
            $filename = 'configData/'.$id . '.json';
            $data = [
                'game' => Game::with('hasManyComments')->find($id),
                'config'=> json_decode(Storage::get($filename)),
            ];
            return view('play',$data);
        }else{
            return '404';
        }
//        return Game::with('hasManyComments')->find($id);
    }
}
