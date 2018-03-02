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
         $admin_user = Role::find(3);
         foreach($users as $user){
           if ($user->name == 'admin'){
             $user->roles()->attach($admin_user);

           }
           if ($user->name != 'admin'){
 $user->roles()->attach($free_user);

           }

         }


     }
}
