<?php

namespace App\Http\Controllers;

use App\Game;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home')->withGames(Game::all());
    }
}
