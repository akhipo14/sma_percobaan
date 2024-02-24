<?php

namespace App\Http\Controllers;

use App\Models\Ketenagaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class KetenagaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.ketenagaan.index',[
            'ketenagaans'=>Ketenagaan::latest()->paginate(3)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'jenis_guru'=>'required|string|max:50|unique:ketenagaans',
            'laki_laki'=>'',
            'perempuan'=>'',
            'ket'=>''
        
        ];

        $customMessages = [
            'jenis_guru.required' => 'tidak boleh kosong',
            'jenis_guru.max' => 'Tidak boleh lebih dari 15 karakter',
            'jenis_guru.unique' => 'Jenis Guru sudah tersedia',
            // Tambahkan pesan kustom lainnya sesuai kebutuhan
        ];
        $validatedData= Validator::make($request->all(),$rules,$customMessages);
        if($validatedData->fails()){
            Alert::toast('gagal input data','error');
            return redirect()->back()
                ->withErrors($validatedData);
            }

        $validatedData2 = $validatedData->validated();
        Ketenagaan::create($validatedData2);
        toast('Tambah data Berhasil', 'success');
        return redirect('/admin-ketenagaan')->with('success','Tambah data Berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ketenagaan $ketenagaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ketenagaan $ketenagaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'jenis_guru'=>'required|string|max:50',
            'laki_laki'=>'',
            'perempuan'=>'',
            'ket'=>''
        
        ];

        $customMessages = [
            'jenis_guru.required' => 'tidak boleh kosong',
            'jenis_guru.max' => 'Tidak boleh lebih dari 15 karakter',
            // Tambahkan pesan kustom lainnya sesuai kebutuhan
        ];
        $validatedData= Validator::make($request->all(),$rules,$customMessages);
        if($validatedData->fails()){
            Alert::toast('gagal edit data','error');
            return redirect()->back()
                ->withErrors($validatedData);
            }

        $validatedData2 = $validatedData->validated();
        Ketenagaan::where('id', $id)->update($validatedData2);
        toast('Berhasil edit data', 'success');
        return redirect('/admin-ketenagaan')->with('success','Berhasil edit data');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Ketenagaan::destroy($id);
        toast('Data berhasil dihapus','success');
        return redirect()->back();
    }
}
