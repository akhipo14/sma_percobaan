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
        ];

        $customMessages = [
            'jenis_ruang.required' => 'tidak boleh kosong',
            'jenis_ruang.max' => 'Tidak boleh lebih dari 15 karakter',
            'jenis_ruang.unique' => 'Jenis ruang sudah tersedia',
            // Tambahkan pesan kustom lainnya sesuai kebutuhan
        ];
        $validatedData= Validator::make($request->all(),$rules,$customMessages);
        if($validatedData->fails()){
            Alert::toast('gagal input data','error');
            return redirect()->back()
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ruang $ruang)
    {
        //
    }
}
