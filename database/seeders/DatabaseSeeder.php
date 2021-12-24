<?php

namespace Database\Seeders;

use App\Models\Instance;
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

        //Seeder Users
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
                'unique_number' => '1296847772',
                'name' => 'Receptionist MTS 10 Pekanbaru',
                'email' => 'receptionist@rcnt.mts.ac.id',
                'password' => bcrypt('123123123'),
                'no_hp' => '6285543222',
                'status' => 1,
            ]);
            $role = 5;
            $user->attachRole($role);

            $user = User::create([
                'unique_number' => '12122123787',
                'name' => 'Siswa',
                'email' => '12122123787@students.mts10.ac.id',
                'password' => bcrypt('123123123'),
                'no_hp' => '628446623191',
                'status' => 1,
            ]);
            $role = 6;
            $user->attachRole($role);

            $user = User::create([
                'unique_number' => '11712344787',
                'name' => 'Alumni',
                'email' => '11712344787@alumni.mts10.ac.id',
                'password' => bcrypt('123123123'),
                'no_hp' => '628137614123',
                'status' => 1,
            ]);
            $role = 6;
            $user->attachRole($role);
        //

        // Seeder Intances
            Instance::create([
                'name' => 'Lainnya',
                'slug' => 'lain-nya',
                'alamat' => 'Pekanbaru',
                'no_hp' => 911,
                'user_id' => 1,
            ]);
            Instance::create([
                'name' => 'MTS 1 Pekanbaru',
                'slug' => 'mts-1-pekanbaru',
                'alamat' => 'Pekanbaru, Jl. Amal Hamzah No.1, Cinta Raja, Kec. Sail, Kota Pekanbaru, Riau 28127',
                'no_hp' => 76138757,
                'user_id' => 1,
            ]);
            Instance::create([
                'name' => 'MTS 10 Pekanbaru',
                'slug' => 'mts-10-pekanbaru',
                'alamat' => 'Pekanbaru,JL.x, Kota Pekanbaru, Riau 281227',
                'no_hp' => 7613877676,
                'user_id' => 1,
            ]);
            Instance::create([
                'name' => 'Alumni MTS 10 Pekanbaru',
                'slug' => 'alumni-mts-10-pekanbaru',
                'alamat' => 'Pekanbaru, Jl.xx',
                'no_hp' => 62812312666,
                'user_id' => 1,
            ]);
            Instance::create([
                'name' => 'Siswa MTS 10 Pekanbaru',
                'slug' => 'siswa-mts-10-pekanbaru',
                'alamat' => 'Pekanbaru, Jl.xx',
                'no_hp' => 628675588,
                'user_id' => 1,
            ]);
            Instance::create([
                'name' => 'Institusi Pendidikan',
                'slug' => 'institusi-pendidikan',
                'alamat' => 'Jakarta, Jl.xx',
                'no_hp' => 6282198237,
                'user_id' => 1,
            ]);
            Instance::create([
                'name' => 'Direktorat Guru dan Tenaga Kependidikan Madrasah Direktorat Jenderal Pendidikan Islam',
                'slug' => 'direktorat-guru-dan-tenaga-kependidikan-madrasah-direktorat-jenderal-pendidikan-islam',
                'alamat' => 'Jl. Lapangan Banteng Barat No. 3-4 Jakarta, Indonesia 10710',
                'no_hp' => 628119343493,
                'user_id' => 1,
            ]);
            Instance::create([
                'name' => 'Perpustakaan Nasional Republik Indonesia',
                'slug' => 'perpustakaan-nasional-republik-indonesia',
                'alamat' => 'Jl. Medan Merdeka Sel. No.11',
                'no_hp' => 62213103554,
                'user_id' => 1,
            ]);
            Instance::create([
                'name' => 'Kementerian Pendidikan Kebudayaan Riset dan Teknologi',
                'slug' => 'kementerian-pendidikan-kebudayaan-riset-dan-teknologi',
                'alamat' => 'Jl. Jend. Sudirman No.19, Jakarta',
                'no_hp' => 215703303,
                'user_id' => 1,
            ]);
        //
    }
}
