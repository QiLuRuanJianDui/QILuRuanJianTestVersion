<?php

namespace App\Http\Controllers;

use App\Game;
use App\Template;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        return view('my/myPage')->withUser(User::with('myGames')->find($id));
    }
/**
 * judge the request and return view
 *
 * @return \Illuminate\Http\Response
 * */
    public function showEditGame($user_id,$id){
        $game = Game::find($id);
        if($user_id==$game{'user_id'}){
            return view('my/editGame')->withGame(Game::find($id));
        }else{
            return "404 No Found!!!!";
        }
        /*if(Game::where('user_id',$user_id)){
            return view('my/editGame')->withGame(Game::find($id));
        }else{
            return "no found";
        }*/
    }
    /**
     * return user_id id view
     * @return \Illuminate\Http\Response
     *
     * */
    public function showAddGame($id){
        return view('my/addGame')->withTemplate(Template::find($id));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
