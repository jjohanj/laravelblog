<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
class UserRoleseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
         $users = User::get();
         $free_user = Role::find(1);
         foreach($users as $user){
           $user->roles()->attach($free_user);
         }
     }
}
