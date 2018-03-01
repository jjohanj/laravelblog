<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $free_user = new Role();
      $free_user->name         = 'free_user';
      $free_user->display_name = 'Free User'; // optional
      $free_user->description  = 'A user who hasnt subscribed yet'; // optional
      $free_user->save();

      $premium_user = new Role();
      $premium_user->name         = 'premium_user';
      $premium_user->display_name = 'Premium User'; // optional
      $premium_user->description  = 'A user who has subscribed'; // optional
      $premium_user->save();

      $admin_user = new Role();
      $admin_user->name         = 'admin';
      $admin_user->display_name = 'administrator'; // optional
      $admin_user->description  = 'Administrator can manage datadumps, billings, etc.'; // optional
      $admin_user->save();
    }
}
