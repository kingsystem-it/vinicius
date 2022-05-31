<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::create([
            'name' => 'Vinicius',
            'email' => 'vinicius@gmailcom',
            'password' => bcrypt('314159')
        ]);
    }
}
