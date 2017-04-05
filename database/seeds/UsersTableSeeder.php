<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $users = [
        [
            'username' => 'Guest',
            'email' => 'guest',
            'password' => bcrypt('guest')
        ],
        [
            'username' => 'Niko',
            'email' => 'huff@puff.ca',
            'password' => bcrypt('puffpuff')
        ],
        [
            'username' => 'Emily',
            'email' => 'emily@e.e',
            'password' => bcrypt('password')
        ],
        [
            'username' => 'Jon',
            'email' => 'jon@j.j',
            'password' => bcrypt('password')
        ]
    ];


    DB::table('users')->insert($users);
  }
}
