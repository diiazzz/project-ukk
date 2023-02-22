<?php

use Illuminate\Database\Seeder;
use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['name' => 'admin','email' => 'admin@diaz.com','password' => bcrypt('12345678'),'role' => 'admin'];
        User::insert($data);
    }
}
