<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Hari;
use Illuminate\Database\Seeder;
use \App\Models\Kelas;
use \App\Models\Jadwal;
use App\Models\Pelajaran;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Kelas::create([
            'nama_kelas'=>'I A',
        ]);
        Kelas::create([
            'nama_kelas'=>'I B',
        ]);
        Kelas::create([
            'nama_kelas'=>'II A',
        ]);
        Kelas::create([
            'nama_kelas'=>'II B',
        ]);
        Kelas::create([
            'nama_kelas'=>'III A',
        ]);
        Kelas::create([
            'nama_kelas'=>'III B',
        ]);
        Kelas::create([
            'nama_kelas'=>'IV A',
        ]);
        Kelas::create([
            'nama_kelas'=>'IV B',
        ]);
        Kelas::create([
            'nama_kelas'=>'V A',
        ]);
        Kelas::create([
            'nama_kelas'=>'V B',
        ]);
        Kelas::create([
            'nama_kelas'=>'VI A',
        ]);
        Kelas::create([
            'nama_kelas'=>'VI B',
        ]);

        Pelajaran::create([
            'nama_pelajaran'=>'Bahasa Indonesia'
        ]);
        Pelajaran::create([
            'nama_pelajaran'=>'Bahasa Inggris'
        ]);
        Pelajaran::create([
            'nama_pelajaran'=>'Matematika'
        ]);
        Pelajaran::create([
            'nama_pelajaran'=>'IPA'
        ]);
        Pelajaran::create([
            'nama_pelajaran'=>'IPS'
        ]);
        Pelajaran::create([
            'nama_pelajaran'=>'PKN'
        ]);


        Hari::create([
            'nama_hari'=>'Senin'
        ]);
        Hari::create([
            'nama_hari'=>'Selasa'
        ]);
        Hari::create([
            'nama_hari'=>'Rabu'
        ]);
        Hari::create([
            'nama_hari'=>'Kamis'
        ]);
        Hari::create([
            'nama_hari'=>'Jumat'
        ]);


        Jadwal::Create([
            'hari_id'=>1,
            'kelas_id'=>1,
            'mapel_1_id'=>1,
            'mapel_2_id'=>2,
            'mapel_3_id'=>3,
            'mapel_4_id'=>4,
            'mapel_5_id'=>2,
            'mapel_6_id'=>5,
            'mapel_7_id'=>1,
            'mapel_8_id'=>2,
            'mapel_9_id'=>3,
            'mapel_10_id'=>4,
            'mapel_11_id'=>5,
            'mapel_12_id'=>2,
        ]);

        Jadwal::Create([
            'hari_id'=>2,
            'kelas_id'=>1,
            'mapel_1_id'=>1,
            'mapel_2_id'=>3,
            'mapel_3_id'=>2,
            'mapel_4_id'=>5,
            'mapel_5_id'=>4,
            'mapel_6_id'=>1,
            'mapel_7_id'=>4,
            'mapel_8_id'=>3,
            'mapel_9_id'=>1,
            'mapel_10_id'=>5,
            'mapel_11_id'=>3,
            'mapel_12_id'=>2,
        ]);

        Jadwal::Create([
            'hari_id'=>3,
            'kelas_id'=>1,
            'mapel_1_id'=>1,
            'mapel_2_id'=>3,
            'mapel_3_id'=>2,
            'mapel_4_id'=>5,
            'mapel_5_id'=>4,
            'mapel_6_id'=>1,
            'mapel_7_id'=>4,
            'mapel_8_id'=>3,
            'mapel_9_id'=>1,
            'mapel_10_id'=>5,
            'mapel_11_id'=>3,
            'mapel_12_id'=>2,
        ]);

        Jadwal::Create([
            'hari_id'=>4,
            'kelas_id'=>1,
            'mapel_1_id'=>1,
            'mapel_2_id'=>3,
            'mapel_3_id'=>2,
            'mapel_4_id'=>5,
            'mapel_5_id'=>4,
            'mapel_6_id'=>1,
            'mapel_7_id'=>4,
            'mapel_8_id'=>3,
            'mapel_9_id'=>1,
            'mapel_10_id'=>5,
            'mapel_11_id'=>3,
            'mapel_12_id'=>2,
        ]);

        Jadwal::Create([
            'hari_id'=>5,
            'kelas_id'=>1,
            'mapel_1_id'=>1,
            'mapel_2_id'=>3,
            'mapel_3_id'=>2,
            'mapel_4_id'=>5,
            'mapel_5_id'=>4,
            'mapel_6_id'=>1,
            'mapel_7_id'=>4,
            'mapel_8_id'=>3,
            'mapel_9_id'=>1,
            'mapel_10_id'=>5,
            'mapel_11_id'=>3,
            'mapel_12_id'=>2,
        ]);


        Jadwal::Create([
            'hari_id'=>1,
            'kelas_id'=>2,
            'mapel_1_id'=>1,
            'mapel_2_id'=>2,
            'mapel_3_id'=>3,
            'mapel_4_id'=>4,
            'mapel_5_id'=>2,
            'mapel_6_id'=>5,
            'mapel_7_id'=>1,
            'mapel_8_id'=>2,
            'mapel_9_id'=>3,
            'mapel_10_id'=>4,
            'mapel_11_id'=>5,
            'mapel_12_id'=>2,
        ]);

        Jadwal::Create([
            'hari_id'=>2,
            'kelas_id'=>2,
            'mapel_1_id'=>1,
            'mapel_2_id'=>3,
            'mapel_3_id'=>2,
            'mapel_4_id'=>5,
            'mapel_5_id'=>4,
            'mapel_6_id'=>1,
            'mapel_7_id'=>4,
            'mapel_8_id'=>3,
            'mapel_9_id'=>1,
            'mapel_10_id'=>5,
            'mapel_11_id'=>3,
            'mapel_12_id'=>2,
        ]);

        Jadwal::Create([
            'hari_id'=>3,
            'kelas_id'=>2,
            'mapel_1_id'=>1,
            'mapel_2_id'=>3,
            'mapel_3_id'=>2,
            'mapel_4_id'=>5,
            'mapel_5_id'=>4,
            'mapel_6_id'=>1,
            'mapel_7_id'=>4,
            'mapel_8_id'=>3,
            'mapel_9_id'=>1,
            'mapel_10_id'=>5,
            'mapel_11_id'=>3,
            'mapel_12_id'=>2,
        ]);

        Jadwal::Create([
            'hari_id'=>4,
            'kelas_id'=>2,
            'mapel_1_id'=>1,
            'mapel_2_id'=>3,
            'mapel_3_id'=>2,
            'mapel_4_id'=>5,
            'mapel_5_id'=>4,
            'mapel_6_id'=>1,
            'mapel_7_id'=>4,
            'mapel_8_id'=>3,
            'mapel_9_id'=>1,
            'mapel_10_id'=>5,
            'mapel_11_id'=>3,
            'mapel_12_id'=>2,
        ]);

        Jadwal::Create([
            'hari_id'=>5,
            'kelas_id'=>2,
            'mapel_1_id'=>1,
            'mapel_2_id'=>3,
            'mapel_3_id'=>2,
            'mapel_4_id'=>5,
            'mapel_5_id'=>4,
            'mapel_6_id'=>1,
            'mapel_7_id'=>4,
            'mapel_8_id'=>3,
            'mapel_9_id'=>1,
            'mapel_10_id'=>5,
            'mapel_11_id'=>3,
            'mapel_12_id'=>2,
        ]);


    }
}
