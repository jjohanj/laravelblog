<?php

use Illuminate\Database\Seeder;
use App\Setting;
use App\User;

class UsersSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
  $users = User::get();

  foreach($users as $user){
    $user_id = $user->id;
      DB::table('settings')->insert([
                 'user_id' => $user_id,
                 'enable_newcomment' => 'yes',
                 'enable_newfollower' => 'yes',
                 'enable_newpost' => 'yes',
             ]);

    }




    }
}
