<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class PrestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $title = 'Hapus Data!';
        $text = "Anda yakin ingin menghapus data ?";
        confirmDelete($title, $text);
        return view('admin.prestasi.index',[
            'prestasis'=>Prestasi::latest()->paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.prestasi.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $customMessages = [
            'nama.required' => 'Kolom nama harus diisi',
            'nama.max' => 'Nama Tidak boleh lebih dari 75 karakter',
            'detail_prestasi.required' => 'Kolom detail prestasi harus diisi',
            'detail_prestasi.max' => 'Detail prestasi Tidak boleh lebih dari 150 karakter',
            'tahun.required' => 'Kolom tahun harus diisi',
            'tahun.starts_with' => 'Tahun harus diawali dengan angka 20',
            'tahun.digits' => 'Tahun harus harus berisi 4 digit angka',
            'tingkat.required' => 'Kolom tingkat harus diisi',


            // Tambahkan pesan kustom lainnya sesuai kebutuhan
        ];
        $validatedData = $request->validate([
            'nama'=>'required|string|max:75',
            'detail_prestasi'=>'required|string|max:150',
            'tahun' => 'required|numeric|digits:4|starts_with:20',
            'tingkat'=>'required|string|max:75',
        ],$customMessages);
        
        Prestasi::create($validatedData);
        toast('Tambah Prestasi Berhasil', 'success');
        return redirect('/admin-prestasi')->with('success','Tambah Prestasi Berhasil');
 
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('user.prestasi.index',[
            'prestasis'=>Prestasi::latest()->paginate(10),
            'total_prestasis'=>Prestasi::count()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        return view('admin.prestasi.edit',[
            'prestasis'=>Prestasi::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $customMessages = [
            'nama.required' => 'Kolom nama harus diisi',
            'nama.max' => 'Nama Tidak boleh lebih dari 75 karakter',
            'detail_prestasi.required' => 'Kolom detail prestasi harus diisi',
            'detail_prestasi.max' => 'Detail prestasi Tidak boleh lebih dari 150 karakter',
            'tahun.required' => 'Kolom tahun harus diisi',
            'tahun.starts_with' => 'Tahun harus diawali dengan angka 20',
            'tahun.digits' => 'Tahun harus harus berisi 4 digit angka',
            'tingkat.required' => 'Kolom tingkat harus diisi',


            // Tambahkan pesan kustom lainnya sesuai kebutuhan
        ];
        $validatedData = $request->validate([
            'nama'=>'required|string|max:75',
            'detail_prestasi'=>'required|string|max:150',
            'tahun' => 'required|numeric|digits:4|starts_with:20',
            'tingkat'=>'required|string|max:75',
        ],$customMessages);
        
        Prestasi::where('id',$id)->update($validatedData);
        toast('Edit Prestasi Berhasil', 'success');
        return redirect('/admin-prestasi')->with('success','Edit Prestasi Berhasil');
 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        Prestasi::destroy($id);
        toast('Hapus Prestasi berhasil', 'success');
        return redirect('/admin-prestasi');
    }
}
