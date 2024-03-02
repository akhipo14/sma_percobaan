<?php

namespace App\Http\Controllers;

use App\Models\Ruang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class RuangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Hapus Data!';
        $text = "Anda yakin ingin menghapus data ?";
        confirmDelete($title, $text);
        return view('admin.ruang.index',[
            'ruangs'=>Ruang::latest()->paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.ruang.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $customMessages = [
            'jenis_ruang.required' => 'Kolom jenis ruang harus diisi',
            'jenis_ruang.max' => 'Tidak boleh lebih dari 15 karakter',
            'jenis_ruang.unique' => 'kolom Jenis ruang sudah tersedia',
            'jumlah.required' => 'Kolom jumlah harus diisi',
            'jumlah.integer' => 'Kolom jumlah harus berupa angka',
            'image.required' =>'image tidak boleh kosong',
            'image.max:2048' =>'Ukuran image maksimal 2mb',
            'image.image' =>'image Harus berupa image',
            'image.mimes' =>'Format image jpeg,png,jpg,gif,svg',

            // Tambahkan pesan kustom lainnya sesuai kebutuhan
        ];

        $validatedData = $request->validate( [
            'jenis_ruang'=>'required|string|max:50|unique:ruangs',
            'kondisi'=>'required',
            'jumlah'=>'required|integer',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],$customMessages);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('ruang','public');
        }
    
       
       
        Ruang::create($validatedData);
        toast('Tambah data Berhasil', 'success');
        return redirect('/admin-ruang')->with('success','Tambah data Berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ruang $ruang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('admin.ruang.edit',[
            'ruangs'=>Ruang::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ruang $ruang)
    {
        $customMessages = [
            'jenis_ruang.required' => 'Kolom jenis ruang harus diisi',
            'jenis_ruang.max' => 'Tidak boleh lebih dari 15 karakter',
            'jenis_ruang.unique' => 'kolom Jenis ruang sudah tersedia',
            'jumlah.required' => 'Kolom jumlah harus diisi',
            'jumlah.integer' => 'Kolom jumlah harus berupa angka',
            'image.required' =>'image tidak boleh kosong',
            'image.max:2048' =>'Ukuran image maksimal 2mb',
            'image.image' =>'image Harus berupa image',
            'image.mimes' =>'Format image jpeg,png,jpg,gif,svg',

            // Tambahkan pesan kustom lainnya sesuai kebutuhan
        ];

        $validatedData = $request->validate( [
            'jenis_ruang'=>'required|string|max:50|unique:ruangs,jenis_ruang,' . $ruang->id,
            'kondisi'=>'required',
            'jumlah'=>'required|integer',
            'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],$customMessages);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('ruang','public');
        }
       
        $ruang->update($validatedData);
        toast('Edit data Berhasil', 'success');
        return redirect('/admin-ruang')->with('success','Edit data Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        Ruang::destroy($id);
        toast('hapus data berhasil','info');
        return redirect('/admin-ruang');
    }
}
