<?php

use Illuminate\Database\Seeder;

class PerkaraTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('perkara')->insert([
            'butiran' => 'Semua kakitangan telah meninggalkan pejabat',
        ]);

        DB::table('perkara')->insert([
            'butiran' => 'Pintu-pintu bilik pegawai dikunci',
        ]);

        DB::table('perkara')->insert([
            'butiran' => 'Lampu-lampu bilik pegawai telah dipadamkan',
        ]);

        DB::table('perkara')->insert([
            'butiran' => 'Pintu-pintu rintangan api (kecemasan) bertutup rapat',
        ]);

        DB::table('perkara')->insert([
            'butiran' => 'Tingkap telah ditutup (jika berkaitan)',
        ]);

        DB::table('perkara')->insert([
            'butiran' => 'Suis komputer di workstation telah dimatikan',
        ]);

        DB::table('perkara')->insert([
            'butiran' => 'Peralatan elektrik telah dimatikan',
        ]);

        DB::table('perkara')->insert([
            'butiran' => 'Peralatan elektrik di pantri telah dimatikan dan paip air ditutup',
        ]);

        DB::table('perkara')->insert([
            'butiran' => 'Fail terperingkat tidak berada di atas meja atau workstation',
        ]);

        DB::table('perkara')->insert([
            'butiran' => 'Paip air di dalam tandas ditutup',
        ]);

        DB::table('perkara')->insert([
            'butiran' => 'Lampu-lampu pejabat telah dipadam sebelum meninggalkan pejabat',
        ]);
    }
}
