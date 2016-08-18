<?php

use Illuminate\Database\Seeder;

class GameTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('games')->delete();
        for($i=1;$i<=10;$i++){
            for($j=1;$j<=10;$j++){
                \App\Game::create([
                    'name'=>'name'.$j,
                    'user_id'=>$i,
                    'user_name'=>'userName'.$i,
                    'template_id'=>$i,
                    'introduction'=>'这是介绍'.$j,
                ]);
            }
        }
    }
}
