<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\Pelajaran;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $kelas = Kelas::all();

        // Mengambil jadwal dengan kelas_id = 1 sebagai default
        $selected_kelas_id = $request->input('kategori_id', 1);

        // Mengambil jadwal berdasarkan kelas yang dipilih oleh pengguna
        $jadwals = Jadwal::where('kelas_id', $selected_kelas_id)->get();

        return view('admin.jadwal.index', compact('jadwals', 'kelas', 'selected_kelas_id'));
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
    public function edit($id)
    {
        //
        return view('admin.jadwal.edit',[
            'jadwals'=>Jadwal::find($id),
            'kelas'=> Kelas::all(),
            'pelajarans'=>Pelajaran::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'mapel_1_id'=>'required',
            'mapel_1_id'=>'required',
            'mapel_3_id'=>'required',
            'mapel_4_id'=>'required',
            'mapel_5_id'=>'required',
            'mapel_6_id'=>'required',
            'mapel_7_id'=>'required',
            'mapel_8_id'=>'required',
            'mapel_9_id'=>'required',
            'mapel_10_id'=>'required',
            'mapel_11_id'=>'required',
            'mapel_12_id'=>'required',
        ]);

        Jadwal::where('id',$id)->update($validatedData);
        toast('Edit data berhasil','success');
        return redirect('/admin-jadwal');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jadwal $jadwal)
    {
        //
    }
}
