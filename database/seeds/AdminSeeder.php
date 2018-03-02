<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
use App\Setting;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
          'name' => 'admin',
          'blog_name' => 'admin',
          'email' => 'admin@admin.com',
          'password' => bcrypt('admin'),
<<<<<<< HEAD
          'total_blogposts' => 0;
=======
>>>>>>> 98586d2355fbaa58c083c596992cd3a97c7ea429
      ]);




    }
}
