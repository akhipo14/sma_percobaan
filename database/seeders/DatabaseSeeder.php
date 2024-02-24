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
        // Kelas::create([
        //     'nama_kelas'=>'II A',
        // ]);
        // Kelas::create([
        //     'nama_kelas'=>'II B',
        // ]);
        // Kelas::create([
        //     'nama_kelas'=>'III A',
        // ]);
        // Kelas::create([
        //     'nama_kelas'=>'III B',
        // ]);
        // Kelas::create([
        //     'nama_kelas'=>'IV A',
        // ]);
        // Kelas::create([
        //     'nama_kelas'=>'IV B',
        // ]);
        // Kelas::create([
        //     'nama_kelas'=>'V A',
        // ]);
        // Kelas::create([
        //     'nama_kelas'=>'V B',
        // ]);
        // Kelas::create([
        //     'nama_kelas'=>'VI A',
        // ]);
        // Kelas::create([
        //     'nama_kelas'=>'VI B',
        // ]);

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

        for ($i = 0; $i < 12; $i++) {
            $pelajaran_id = ($i % 5) + 1; // Menghasilkan nilai 1-5 secara berulang
            Jadwal::create([
                'hari_id' => 1,
                'kelas_id' => 1,
                'pelajaran_id' => $pelajaran_id,
            ]);
        }

        for ($i = 0; $i < 12; $i++) {
            $pelajaran_id = ($i % 5) + 1; // Menghasilkan nilai 1-5 secara berulang
            Jadwal::create([
                'hari_id' => 2,
                'kelas_id' => 1,
                'pelajaran_id' => $pelajaran_id,
            ]);
        }

        for ($i = 0; $i < 12; $i++) {
            $pelajaran_id = ($i % 5) + 1; // Menghasilkan nilai 1-5 secara berulang
            Jadwal::create([
                'hari_id' => 3,
                'kelas_id' => 1,
                'pelajaran_id' => $pelajaran_id,
            ]);
        }

        for ($i = 0; $i < 12; $i++) {
            $pelajaran_id = ($i % 5) + 1; // Menghasilkan nilai 1-5 secara berulang
            Jadwal::create([
                'hari_id' => 4,
                'kelas_id' => 1,
                'pelajaran_id' => $pelajaran_id,
            ]);
        }

        for ($i = 0; $i < 12; $i++) {
            $pelajaran_id = ($i % 5) + 1; // Menghasilkan nilai 1-5 secara berulang
            Jadwal::create([
                'hari_id' => 5,
                'kelas_id' => 1,
                'pelajaran_id' => $pelajaran_id,
            ]);
        }
// 
        for ($i = 0; $i < 12; $i++) {
            $pelajaran_id = ($i % 5) + 1; // Menghasilkan nilai 1-5 secara berulang
            Jadwal::create([
                'hari_id' => 1,
                'kelas_id' => 2,
                'pelajaran_id' => $pelajaran_id,
            ]);
        }

        for ($i = 0; $i < 12; $i++) {
            $pelajaran_id = ($i % 5) + 1; // Menghasilkan nilai 1-5 secara berulang
            Jadwal::create([
                'hari_id' => 2,
                'kelas_id' => 2,
                'pelajaran_id' => $pelajaran_id,
            ]);
        }

        for ($i = 0; $i < 12; $i++) {
            $pelajaran_id = ($i % 5) + 1; // Menghasilkan nilai 1-5 secara berulang
            Jadwal::create([
                'hari_id' => 3,
                'kelas_id' => 2,
                'pelajaran_id' => $pelajaran_id,
            ]);
        }

        for ($i = 0; $i < 12; $i++) {
            $pelajaran_id = ($i % 5) + 1; // Menghasilkan nilai 1-5 secara berulang
            Jadwal::create([
                'hari_id' => 4,
                'kelas_id' => 2,
                'pelajaran_id' => $pelajaran_id,
            ]);
        }

        for ($i = 0; $i < 12; $i++) {
            $pelajaran_id = ($i % 5) + 1; // Menghasilkan nilai 1-5 secara berulang
            Jadwal::create([
                'hari_id' => 5,
                'kelas_id' => 2,
                'pelajaran_id' => $pelajaran_id,
            ]);
        }




    }
}
