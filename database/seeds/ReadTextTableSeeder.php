<?php

use Illuminate\Database\Seeder;

class ReadTextTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        $read_text = [

            [
                'content' => 'They will try to close the door on you, just open it. Stay focused.',
                'read_for_user' => 1
            ],
            [
                'content' => 'It’s important to use cocoa butter. It’s the key to more success, why not live smooth?',
                'read_for_user' => 2
            ],
            [
                'content' => 'The other day the grass was brown, now it’s green because I ain’t give up. Never surrender.',
                'read_for_user' => 3
            ],

        ];


        DB::table('read_text')->insert($read_text);
    }
}
