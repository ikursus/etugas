<?php

use Illuminate\Database\Seeder;

class PenempatanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('penempatan')->insert([
            'kod' => '0001',
            'negeri' => 'Selangor',
            'bahagian' => 'BPM',
            'tingkat' => '17',
            'unit' => 'UPPA',
        ]);

        DB::table('penempatan')->insert([
            'kod' => '0002',
            'negeri' => 'Selangor',
            'bahagian' => 'BPS',
            'tingkat' => '20',
            'unit' => 'Urus Setia',
        ]);
    }
}
