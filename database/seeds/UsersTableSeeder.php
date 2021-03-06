<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(App\User::class, 5)->create();
        
        /*DB::table('users')->insert([
            'name' => 'inoue',
            'email' => 'ino@mail.com',
            'password' => bcrypt('123456'),
            'role' => '10',
            'department_id' => '1',
        ]);
        //*/
    }
}
