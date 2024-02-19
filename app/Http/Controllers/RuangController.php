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
            'ruangs'=>Ruang::all()
        ]);
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
            'jenis_ruang'=>'required|string|max:50|unique:ruangs',
            'kondisi'=>'required',
            'jumlah'=>'required|integer'
        ];

        $customMessages = [
            'jenis_ruang.required' => 'Kolom jenis ruang harus diisi',
            'jenis_ruang.max' => 'Tidak boleh lebih dari 15 karakter',
            'jenis_ruang.unique' => 'kolom Jenis ruang sudah tersedia',
            'jumlah.required' => 'Kolom jumlah harus diisi',
            'jumlah.integer' => 'Kolom jumlah harus berupa angka'
            // Tambahkan pesan kustom lainnya sesuai kebutuhan
        ];
        $validatedData= Validator::make($request->all(),$rules,$customMessages);
        if($validatedData->fails()){
            $errors = $validatedData->errors()->all();
            $errorMessage = 'Tambah data gagal:<br>' . implode('<br>', $errors);
            Alert::toast($errorMessage,'error');
            return redirect('/admin-ruang')
                ->withErrors($validatedData);
            }

        $validatedData2 = $validatedData->validated();
        Ruang::create($validatedData2);
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
    public function edit(Ruang $ruang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ruang $ruang)
    {
        $rules = [
            'jenis_ruang'=>'required|string|max:50|unique:ruangs,jenis_ruang,' . $ruang->id ,
            'kondisi'=>'required',
            'jumlah'=>'required|integer'
        ];

        $customMessages = [
            'jenis_ruang.required' => 'Kolom jenis ruang harus diisi',
            'jenis_ruang.max' => 'Tidak boleh lebih dari 15 karakter',
            'jenis_ruang.unique' => 'kolom Jenis ruang sudah tersedia',
            'jumlah.required' => 'Kolom jumlah harus diisi',
            'jumlah.integer' => 'Kolom jumlah harus berupa angka'
            // Tambahkan pesan kustom lainnya sesuai kebutuhan
        ];
        $validatedData= Validator::make($request->all(),$rules,$customMessages);
        if($validatedData->fails()){
            $errors = $validatedData->errors()->all();
            $errorMessage = 'Edit data gagal:<br>' . implode('<br>', $errors);
            Alert::toast($errorMessage,'error');
            return redirect('/admin-ruang')
                ->withErrors($validatedData);
            }

        $validatedData2 = $validatedData->validated();
        $ruang->update($validatedData2);
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
