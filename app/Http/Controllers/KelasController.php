<?php

namespace App\Http\Controllers;

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
        Kelas::create($validatedData2);
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
    public function destroy($id)
    {
        Kelas::destroy($id);
        toast('Hapus Kelas Berhasil', 'success');
        return redirect('admin-kelas');
    }
}
