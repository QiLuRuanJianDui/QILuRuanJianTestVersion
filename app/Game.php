<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    //
    protected $fillable = [
        'name', 'user_id','template_id ','user_name','introduction','illustration'
    ];
    public function hasManyComments()
    {
        return $this->hasMany('App\Comment', 'game_id', 'id')->orderBy('created_at','desc');
    }


}
