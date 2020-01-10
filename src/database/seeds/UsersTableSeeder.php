<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::truncate();
        User::create([
            'email' => 'admin2@admin.com',
            'password' => Hash::make('adminadmin'),
            'name' => 'Administrator',
            'acreditation' => '01-02',
            'address' => 'Calle El tomillo 31',
            'image' => 'harold.jpg',
            'mobilephone' => '962521446',
            'type' => 'planta',
            'dni' => "44887190E",
        ]);
    }
}