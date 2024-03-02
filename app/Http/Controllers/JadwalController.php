<?php

namespace App\Http\Controllers;

use App\Models\Hari;
use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\Pelajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\AssignOp\Concat;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $kelasId = $request->input('kelas');
        $kelas2 = $kelasId ? Kelas::find($kelasId) : Kelas::first();
        $hari = Hari::all();
        $kelas = Kelas::all();
        $pelajarans = Pelajaran::all();
        // Ambil semua hari yang tersedia
        $jadwals_hari = Hari::all();
        // Inisialisasi array kosong untuk menampung data jadwal berdasarkan hari
        $jadwals_by_hari = [];
        // Iterasi melalui setiap hari untuk mengambil data jadwal berdasarkan hari_id
        foreach ($hari as $hariItem) {
            // Ambil jadwal berdasarkan hari_id saat ini
            $jadwals = Jadwal::where('hari_id', $hariItem->id)->where('kelas_id', $kelas2->id)->get();
            // Masukkan ke dalam array $jadwals_by_hari
            $jadwals_by_hari[$hariItem->id] = $jadwals;
        }
        
        return view('admin.jadwal.index', compact('kelas', 'jadwals_by_hari','pelajarans','jadwals_hari','kelas2'));
    }
        // $jam = [
        //     '07.00 - 07.30','07.30 - 08.05','08.05 - 08.40','08.40 - 09.15',
        //     '09.15 - 09.50','09.50 - 10.10','10.10 - 10.45','10.45 - 11.20',
        //     '11.20 - 11.55','11.55 - 13.00','13.00 - 13.35','13.35 - 14.00',
        // ];
    public function jadwaluser(Request $request){
            $kelasId = $request->input('kelas');
            $kelas2 = $kelasId ? Kelas::find($kelasId) : Kelas::first();
            $hari = Hari::all();
            $kelas = Kelas::all();
            $pelajarans = Pelajaran::all();
            // Ambil semua hari yang tersedia
            $jadwals_hari = Hari::all();
            // Inisialisasi array kosong untuk menampung data jadwal berdasarkan hari
            $jadwals_by_hari = [];
            // Iterasi melalui setiap hari untuk mengambil data jadwal berdasarkan hari_id
            foreach ($hari as $hariItem) {
            // Ambil jadwal berdasarkan hari_id saat ini
            $jadwals = Jadwal::where('hari_id', $hariItem->id)->where('kelas_id', $kelas2->id)->get();
            // Masukkan ke dalam array $jadwals_by_hari
            $jadwals_by_hari[$hariItem->id] = $jadwals;
        }
            return view('user.jadwal_mapel.index', compact('kelas', 'jadwals_by_hari','pelajarans','jadwals_hari','kelas2'));
    }
        
                
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Jadwal $jadwal)
    {
        Kelas::all();

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($kelas_id, $hari_id)
    {
        
        // $jadwals = Jadwal::where('kelas_id',$kelas_id)
        // ->where('hari_id',$hari_id)->first();
        $pelajarans = Pelajaran::all();
        // dd($jadwals);

        // 
        $hari = Hari::all();
        // Ambil semua hari yang tersedia
        $jadwals_hari = Hari::all();
        // Inisialisasi array kosong untuk menampung data jadwal berdasarkan hari
        $jadwals_by_hari = [];
        // Iterasi melalui setiap hari untuk mengambil data jadwal berdasarkan hari_id
        foreach ($hari as $hariItem) {
            // Ambil jadwal berdasarkan hari_id saat ini
            $jadwals = Jadwal::where('hari_id',$hari_id)->where('kelas_id',$kelas_id)->get();
            // Masukkan ke dalam array $jadwals_by_hari
            $jadwals_by_hari[$hariItem->id] = $jadwals;
        }


        return view('admin.jadwal.edit',compact('jadwals','pelajarans','jadwals_by_hari'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $kelas_id,$hari_id)
    {
       // Ambil data jadwal berdasarkan kelas_id dan hari_id
       $selectedPelajaranIds = $request->input('pelajaran_id');
       $jadwals = Jadwal::where('kelas_id', $kelas_id)
       ->where('hari_id', $hari_id)
       ->get();

       $i = 0;
       foreach ($jadwals as $jadwal) {
           // Update data pelajaran_id dari request
               
           if (isset($selectedPelajaranIds[$i])) {
               $jadwal->pelajaran_id = $selectedPelajaranIds[$i];
           }
           // Simpan perubahan

           $i++;
           $jadwal->save();

        }
       alert('update','success');
        return redirect('admin-jadwal');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jadwal $jadwal)
    {
        //
    }
}
