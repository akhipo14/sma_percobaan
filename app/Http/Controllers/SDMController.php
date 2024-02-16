<?php

namespace App\Http\Controllers;

use App\Models\SDM;
use Illuminate\Http\Request;

class SDMController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.sdm.index',[
            'sdms'=>SDM::latest()->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sdm.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $customMessages = [
            'nama.required' => 'Nama tidak boleh kosong',
            'nama.max' => 'Tidak boleh lebih dari 100 karakter',
            'posisi.required' => 'Posisi tidak boleh kosong',
            'posisi.max' => 'Tidak boleh lebih dari 100 karakter',
            'foto.required' =>'Foto tidak boleh kosong',
            'foto.max:2048' =>'Ukuran foto maksimal 2mb',
            'foto.image' =>'Foto Harus berupa gambar',
            'foto.mimes' =>'Format foto jpeg,png,jpg,gif,svg',
            // Tambahkan pesan kustom lainnya sesuai kebutuhan
        ];

        $validatedData = $request->validate([
            'nama'=> 'required|max:100|string',
            'posisi'=> 'required|max:100|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],$customMessages);

        if($request->file('foto')){
            $validatedData['foto'] = $request->file('foto')->store('sdm','public'); 
        }

        SDM::create($validatedData);
        toast('Tambah SDM berhasil', 'success');
        return redirect('/admin-sdm')->with('success','berhasil tambah sdm');

    }

    /**
     * Display the specified resource.
     */
    public function show(SDM $sDM)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('admin.sdm.edit',[
            'sdms'=>SDM::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SDM $sdm)
    {

        $customMessages = [
            'nama.required' => 'Nama tidak boleh kosong',
            'nama.max' => 'Tidak boleh lebih dari 100 karakter',
            'posisi.required' => 'Posisi tidak boleh kosong',
            'posisi.max' => 'Tidak boleh lebih dari 100 karakter',
            'foto.required' =>'Foto tidak boleh kosong',
            'foto.max:2048' =>'Ukuran foto maksimal 2mb',
            'foto.image' =>'Foto Harus berupa gambar',
            'foto.mimes' =>'Format foto jpeg,png,jpg,gif,svg',
            // Tambahkan pesan kustom lainnya sesuai kebutuhan
        ];


        $validatedData = $request->validate([
            'nama'=> 'required|max:100|string',
            'posisi'=> 'required|max:100|string',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],$customMessages);

        if($request->file('foto')){
            $validatedData['foto'] = $request->file('foto')->store('sdm','public'); 
        }

        $sdm->update($validatedData);
        toast('Edit SDM berhasil', 'success');
        return redirect('/admin-sdm')->with('success','berhasil edit sdm');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        SDM::destroy($id);
        toast('Hapus SDM berhasil', 'success');
        return redirect('/admin-sdm');
    }
}
