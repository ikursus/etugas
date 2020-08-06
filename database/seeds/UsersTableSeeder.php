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
        // Sample user 1 (pentadbir)
        DB::table('users')->insert([
            'name' => 'En Pentadbir',
            'nric' => '800808-12-8888',
            'no_staf' => '1234',
            'email' => 'pentadbir@etugas.test',
            'telefon' => '0123456789',
            'penempatan_id' => 1,
            'jawatan' => 'PPT',
            'password' => bcrypt('pentadbir'),
            'role' => 'pentadbir'
        ]);

        // Sample user 2 (pengguna)
        DB::table('users')->insert([
            'name' => 'En Pengguna',
            'nric' => '900921-12-8888',
            'no_staf' => '1235',
            'email' => 'pengguna@etugas.test',
            'telefon' => '0123456789',
            'penempatan_id' => 1,
            'jawatan' => 'PPT',
            'password' => bcrypt('pengguna'),
            'role' => 'pengguna'
        ]);
    }
}
