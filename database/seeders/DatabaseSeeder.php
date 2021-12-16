<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(LaratrustSeeder::class);

        $user = User::create([
            'unique_number' => '11950111676',
            'name' => 'Arlan',
            'email' => '11950111676@students.uin-suska.ac.id',
            'password' => bcrypt('123123123'),
            'no_hp' => '081371469331',
            'status' => 1,
        ]);
        $role = 1;
        $user->attachRole($role);

        $user = User::create([
            'unique_number' => '9898779999',
            'name' => 'Kepala Sekolah MTS 10 Pekanbaru',
            'email' => 'kepsek@kepsek.mts.ac.id',
            'password' => bcrypt('123123123'),
            'no_hp' => '62899885233',
            'status' => 1,
        ]);
        $role = 2;
        $user->attachRole($role);

        $user = User::create([
            'unique_number' => '7799334499',
            'name' => 'Kepala Tata Usaha MTS 10 Pekanbaru',
            'email' => 'kepTU@keptu.mts.ac.id',
            'password' => bcrypt('123123123'),
            'no_hp' => '6281244558761',
            'status' => 1,
        ]);
        $role = 3;
        $user->attachRole($role);

        $user = User::create([
            'unique_number' => '55122999576',
            'name' => 'Staf Tata Usaha MTS 10 Pekanbaru',
            'email' => 'stafTU@staftu.mts.ac.id',
            'password' => bcrypt('123123123'),
            'no_hp' => '628986622245',
            'status' => 1,
        ]);
        $role = 4;
        $user->attachRole($role);

        $user = User::create([
            'unique_number' => '12122123787',
            'name' => 'Siswa',
            'email' => '12122123787@students.mts10.ac.id',
            'password' => bcrypt('123123123'),
            'no_hp' => '628446623191',
            'status' => 1,
        ]);
        $role = 5;
        $user->attachRole($role);

        $user = User::create([
            'unique_number' => '11712344787',
            'name' => 'Alumni',
            'email' => '11712344787@alumni.mts10.ac.id',
            'password' => bcrypt('123123123'),
            'no_hp' => '628137614123',
            'status' => 1,
        ]);
        $role = 5;
        $user->attachRole($role);
    }
}
