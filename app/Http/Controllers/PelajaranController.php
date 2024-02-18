<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Pelajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pelajaran.index',[
            'pelajarans'=> Pelajaran::latest()->paginate(5)
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
            'nama_pelajaran'=>'required|string|max:75|unique:pelajarans',
        ];

        $customMessages = [
            'nama_pelajaran.required' => 'Nama kelas tidak boleh kosong',
            'nama_pelajaran.max' => 'Tidak boleh lebih dari 75 karakter',
            'nama_pelajaran.unique' => 'Nama kelas sudah tersedia',
            // Tambahkan pesan kustom lainnya sesuai kebutuhan
        ];
        
        $validatedData= Validator::make($request->all(),$rules,$customMessages);
        if($validatedData->fails()){
            Alert::toast($validatedData->errors()->all(),'error');
            return redirect()->back()
                ->withErrors($validatedData);
        }

        $validatedData2 = $validatedData->validate([
            'nama_pelajaran'=> $request->nama_pelajaran,
        ]);
        Pelajaran::create($validatedData2);
        toast('Tambah Pelajaran Berhasil', 'success');
        return redirect('/admin-pelajaran')->with('success','Tambah pelajaran Berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelajaran $pelajaran)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelajaran $pelajaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pelajaran $pelajaran)
    {
        $rules = [
            'nama_pelajaran' => 'required|string|max:75|unique:pelajarans,nama_pelajaran,' . $pelajaran->id,
        ];
    
        $customMessages = [
            'nama_pelajaran.required' => 'Nama kelas tidak boleh kosong',
            'nama_pelajaran.max' => 'Tidak boleh lebih dari 75 karakter',
            'nama_pelajaran.unique' => 'Nama kelas sudah tersedia',
            // Tambahkan pesan kustom lainnya sesuai kebutuhan
        ];
    
        $validatedData = $request->validate($rules, $customMessages);
    
        $pelajaran->update($validatedData);
    
        // Tambahkan pesan sukses
        toast('Edit Pelajaran Berhasil', 'success');
    
        return redirect('/admin-pelajaran')->with('success', 'Edit Pelajaran Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        Pelajaran::destroy($id);
        toast('Hapus Pelajaran Berhasil', 'success');
        return redirect('/admin-pelajaran');
    }
}
