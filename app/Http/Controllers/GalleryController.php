<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.gallery.index',[
            'gallerys'=>Gallery::latest()->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.gallery.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $customMessages = [
            'judul.required' => 'Judul tidak boleh kosong',
            'judul.unique' => 'Judul sudah tersedia',
            'judul.max' => 'Tidak boleh lebih dari 100 karakter',
            'gambar.required' =>'gambar tidak boleh kosong',
            'gambar.max:2048' =>'Ukuran gambar maksimal 2mb',
            'gambar.image' =>'Gambar Harus berupa gambar',
            'gambar.mimes' =>'Format gambar jpeg,png,jpg,gif,svg',
            // Tambahkan pesan kustom lainnya sesuai kebutuhan
        ];

        $validatedData = $request->validate([
            'judul'=> 'required|max:100|string|unique:posts',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],$customMessages);

        if($request->file('gambar')){
            $validatedData['gambar'] = $request->file('gambar')->store('gallery','public'); 
        }

        Gallery::create($validatedData);
        toast('Tambah Gallery berhasil', 'success');
        return redirect('/admin-gallery')->with('success','berhasil tambah gallery');



    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('admin.gallery.edit',[
            'gallerys'=> Gallery::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        $customMessages = [
            'judul.required' => 'Judul tidak boleh kosong',
            'judul.unique' => 'Judul sudah tersedia',
            'judul.max' => 'Tidak boleh lebih dari 100 karakter',
            'gambar.required' =>'gambar tidak boleh kosong',
            'gambar.max:2048' =>'Ukuran gambar maksimal 2mb',
            'gambar.image' =>'Gambar Harus berupa gambar',
            'gambar.mimes' =>'Format gambar jpeg,png,jpg,gif,svg',
            // Tambahkan pesan kustom lainnya sesuai kebutuhan
        ];

        $validatedData = $request->validate([
            'judul'=> 'required|max:100|string|unique:galleries,judul,' . $gallery->id,
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],$customMessages);

        if($request->file('gambar')){
            $validatedData['gambar'] = $request->file('gambar')->store('gallery','public'); 
        }

        if( $request->judul == $gallery->judul && $request->gambar == $gallery->gambar){
            toast('Tidak ada perubahan', 'Info');            
            return redirect('/admin-gallery');
        }

        $gallery->update($validatedData);
        toast('Edit gallery berhasil', 'success');
        return redirect('/admin-gallery')->with('success','berhasil edit gallery');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Gallery::destroy($id);
        toast('Hapus gallery berhasil', 'success');
        return redirect('/admin-gallery');
    }
}
