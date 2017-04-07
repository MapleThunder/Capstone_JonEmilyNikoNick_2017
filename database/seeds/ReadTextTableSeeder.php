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
                'user_id' => 1
            ],
            [
                'content' => 'It’s important to use cocoa butter. It’s the key to more success, why not live smooth?',
                'user_id' => 2
            ],
            [
                'content' => 'The other day the grass was brown, now it’s green because I ain’t give up. Never surrender.',
                'user_id' => 3
            ],

        ];


        DB::table('read_texts')->insert($read_text);
    }
}
