<?php

use Illuminate\Database\Seeder;

class TemplateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('templates')->delete();
            \App\Template::create([
               'name'=>'template1',
                'help'=>'help1',
            ]);
    }
}
