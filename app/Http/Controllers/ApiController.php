<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;


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



}
