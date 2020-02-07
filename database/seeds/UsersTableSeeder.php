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
            'name' => 'Muhammad Ali',
            'nric' => '800808-12-8888',
            'no_staf' => '1234',
            'email' => 'ali@gmail.com',
            'telefon' => '0123456789',
            'penempatan_id' => 1,
            'jawatan' => 'PPT',
            'password' => bcrypt('ali'),
            'role' => 'pentadbir'
        ]);

        // Sample user 2 (pengguna)
        DB::table('users')->insert([
            'name' => 'Upin',
            'nric' => '900921-12-8888',
            'no_staf' => '1235',
            'email' => 'upin@gmail.com',
            'telefon' => '0123456789',
            'penempatan_id' => 1,
            'jawatan' => 'PPT',
            'password' => bcrypt('upin'),
            'role' => 'pengguna'
        ]);

        // Sample user 3 (pengguna)
        DB::table('users')->insert([
            'name' => 'Ipin',
            'nric' => '900921-12-8889',
            'no_staf' => '1236',
            'email' => 'ipin@gmail.com',
            'telefon' => '0123456789',
            'penempatan_id' => 2,
            'jawatan' => 'PPT',
            'password' => bcrypt('ipin'),
            'role' => 'pengguna'
        ]);
    }
}
