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
        $user=App\User::create([

            'name'=>'Ahmad',
            'email'=>'Ahmad.1711M@gmail.com',
            'password'=>bcrypt('ahmad12345'),
            'admin'=>1
        ]);
        App\Profile::create([
            'user_id'=>$user->id,
            'avatar'=> '/uploads/avatars/1.jpg',
            'about'=>'my name is ahmad',
            'facebook'=>'https://facebook.com/',
            'youtube'=>'https://youtube.com'
        ]);
    }
}
