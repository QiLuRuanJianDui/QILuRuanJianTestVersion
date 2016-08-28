<?php

namespace App\Http\Controllers;

use App\Game;
use App\Template;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


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
     * save the uploaded game
     *
//     * @return \Illuminate\Http\Response
     **/
    public function storeGame($id,Request $request){
        $game = new Game();
        $mainSpiritFileName = '';
        $spirits = [];
        $GameConfig = [];
        if($request->hasFile('mainSpirit')){
            $image = $request->file('mainSpirit');
            $game->name = 'testUpload';
            $game->user_id = Auth::user()->id;
            $game->user_name = Auth::user()->name;
            $game->template_id = $id;
            $game->introduction = '11111';
            $game->save();
            $mainSpiritFileName = $game->id .'mainSpirit.' . $image->getClientOriginalExtension();
            Image::make($image)->save(public_path('images/').$mainSpiritFileName);
        }else{
            $image = $request->file('mainSpirit');
            $game->name = 'testUpload';
            $game->user_id = Auth::user()->id;
            $game->user_name = Auth::user()->name;
            $game->template_id = $id;
            $game->introduction = '11111';
            $game->save();
            $mainSpiritFileName = 'default.png';
        }

        for($i=0;$i<$request->input('spiritLength');$i++){
            $temp = 'spirit'.$i;
            $tempY = 'spiritY'.$i;
            $tempR = 'spiritR'.$i;
            $spiritName = '';
            $tempSpirit = [];
            if($request->file($temp)){
                $spirit = $request->file($temp);
                $spiritName = $game->id .$temp.'.' . $spirit->getClientOriginalExtension();
                Image::make($spirit)->save(public_path('images/').$spiritName);
            }else{
                $spiritName = 'default.png';
            }
            $tempSpirit = [
                'src'=>'/images/'.$spiritName,
                'index'=>$i,
                'x'=>0,
                'y'=>(double)($request->input($tempY)),
                'r'=>(double)($request->input($tempR)),
            ];
            array_push($spirits,$tempSpirit);
        }
        $GameConfig = ['mainSpirit'=>[
            'src'=>'/images/'.$mainSpiritFileName,
            'index'=>0,
            'x'=>(double)($request->input('mainSpiritX')),
            'r'=>(double)($request->input('mainSpiritR')),
        ],
            'spiritsV'=>(double)($request->input('spiritsV')),
        'spirits'=>$spirits,
        ];
        Storage::put($game->id.'.json',json_encode($GameConfig));
        return $GameConfig;
//        return $GameConfig;

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
