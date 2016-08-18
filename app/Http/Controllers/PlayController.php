<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;

use App\Http\Requests;

class PlayController extends Controller
{
    //
    public function index($id){
        return view('play')->withGame(Game::with('hasManyComments')->find($id));
//        return Game::with('hasManyComments')->find($id);
    }
}
