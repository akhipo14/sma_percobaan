<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Kelas;
use App\Models\Pelajaran;
use App\Models\SDM;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Hapus Data!';
        $text = "Anda yakin ingin menghapus data ?";
        confirmDelete($title, $text);
        return view('admin.classroom.index',[
            'classrooms'=>Classroom::latest()->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.classroom.add',[
            'mapels'=>Pelajaran::all(),
            'kelas' =>Kelas::all(),
            'sdms'  =>SDM::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $customMessages = [
            'link.required' => 'Kolom link G Classroom harus diisi',
            // Tambahkan pesan kustom lainnya sesuai kebutuhan
        ];
        $validatedData = $request->validate([
            'mapel_id'=>'required',
            'kelas_id'=>'required',
            'sdm_id' => 'required',
            'link'=>'required|string',
        ],$customMessages);
        
        Classroom::create($validatedData);
        toast('Tambah Classroom Berhasil', 'success');
        return redirect('/admin-classroom')->with('success','Tambah Classroom Berhasil');
 
    }

    /**
     * Display the specified resource.
     */
    public function show(Classroom $classroom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('admin.classroom.edit',[
            'mapels'=>Pelajaran::all(),
            'kelas' =>Kelas::all(),
            'sdms'  =>SDM::all(),
            'classrooms'=>Classroom::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $customMessages = [
            'link.required' => 'Kolom link G Classroom harus diisi',
            // Tambahkan pesan kustom lainnya sesuai kebutuhan
        ];
        $validatedData = $request->validate([
            'mapel_id'=>'required',
            'kelas_id'=>'required',
            'sdm_id' => 'required',
            'link'=>'required|string',
        ],$customMessages);
        
        Classroom::where('id',$id)->update($validatedData);
        toast('Edit Classroom Berhasil', 'success');
        return redirect('/admin-classroom')->with('success','Edit Classroom Berhasil');
 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        Classroom::destroy($id);
        toast('Hapus Classroom Berhasil', 'success');
        return redirect('/admin-classroom');
 
    }
}
