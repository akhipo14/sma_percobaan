<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Hapus Data!';
        $text = "Anda yakin ingin menghapus data ?";
        confirmDelete($title, $text);
        $kelas = Kelas::paginate(5);
        return view('admin.kelas.index',compact('kelas'));
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
        $rules = [
            'nama_kelas'=>'required|string|max:75|unique:kelas',
        ];

        $customMessages = [
            'nama_kelas.required' => 'Nama kelas tidak boleh kosong',
            'nama_kelas.max' => 'Tidak boleh lebih dari 75 karakter',
            'nama_kelas.unique' => 'Nama keals sudah tersedia',
            // Tambahkan pesan kustom lainnya sesuai kebutuhan
        ];
        
        $validatedData= Validator::make($request->all(),$rules,$customMessages);
        if($validatedData->fails()){
            Alert::toast($validatedData->errors()->all(),'error');
            return redirect()->back()
                ->withErrors($validatedData);
        }

        $validatedData2 = $validatedData->validate([
            'nama_kelas'=> $request->nama_kelas,
        ]);
        $kelas = Kelas::create(['nama_kelas' => $request->nama_kelas]);
        $jadwal = [];
        for ($i = 1; $i <= 5; $i++) {
             // Buat entri jadwal untuk setiap hari
            $jadwal[] = [
            'kelas_id' => $kelas->id,
            'hari_id' => $i,
            'mapel_1_id' => 1, // Isi dengan nilai mata_pelajaran yang sesuai
            'mapel_2_id' => 1,// Isi dengan nilai mata_pelajaran yang sesuai
            'mapel_3_id' => 1, // Isi dengan nilai mata_pelajaran yang sesuai
            'mapel_4_id' => 1, // Isi dengan nilai mata_pelajaran yang sesuai
            'mapel_5_id' => 1, // Isi dengan nilai mata_pelajaran yang sesuai
            'mapel_6_id' => 1, // Isi dengan nilai mata_pelajaran yang sesuai
            'mapel_7_id' => 1, // Isi dengan nilai mata_pelajaran yang sesuai
            'mapel_8_id' => 1, // Isi dengan nilai mata_pelajaran yang sesuai
            'mapel_9_id' => 1, // Isi dengan nilai mata_pelajaran yang sesuai
            'mapel_10_id' => 1, // Isi dengan nilai mata_pelajaran yang sesuai
            'mapel_11_id' => 1, // Isi dengan nilai mata_pelajaran yang sesuai
            'mapel_12_id' => 1, // Isi dengan nilai mata_pelajaran yang sesuai
        ];
    }

    // Masukkan entri jadwal ke dalam database
        Jadwal::insert($jadwal);
        toast('Tambah Kelas Berhasil', 'success');
        return redirect('/admin-kelas')->with('success','Tambah Kelas Berhasil');

    }

    /**
     * Display the specified resource.
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelas $kelas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kelas $kelas)
    {
        $rules = [
            'nama_kelas' => 'required|string|max:75|unique:kelas,nama_kelas,' . $kelas->id,
        ];
    
        $customMessages = [
            'nama_kelas.required' => 'Nama kelas tidak boleh kosong',
            'nama_kelas.max' => 'Tidak boleh lebih dari 75 karakter',
            'nama_kelas.unique' => 'Nama kelas sudah tersedia',
            // Tambahkan pesan kustom lainnya sesuai kebutuhan
        ];
    
        $validatedData = $request->validate($rules, $customMessages);
    
        $kelas->update($validatedData);
    
        // Tambahkan pesan sukses
        toast('Edit Kelas Berhasil', 'success');
    
        return redirect('/admin-kelas')->with('success', 'Edit Kelas Berhasil');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelas $kelas)
    {
        $kelas->jadwal()->delete();
    
    // Hapus kelas
    $kelas->delete();

        toast('Hapus Kelas Berhasil', 'success');
        return redirect('admin-kelas');
    }
}
