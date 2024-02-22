<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.post.index',[
            'posts'=>Post::latest()->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.post.add',[
            'kategoris'=>Kategori::all()
        ]);
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
            'foto.required' =>'Foto tidak boleh kosong',
            'foto.max:2048' =>'Ukuran foto maksimal 2mb',
            'foto.image' =>'Foto Harus berupa gambar',
            'foto.mimes' =>'Format gambar jpeg,png,jpg,gif,svg',
            'body.required' => 'Body tidak boleh kosong',
            'kategori_id.required' => 'Kategori tidak boleh kosong',

            // Tambahkan pesan kustom lainnya sesuai kebutuhan
        ];

        $validatedData = $request->validate([
            'judul'=> 'required|max:100|string|unique:posts',
            'kategori_id' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'body'=> 'required',
            'slug' => ''
        ],$customMessages);

        if($request->file('foto')){
            $validatedData['foto'] = $request->file('foto')->store('post','public'); 
        }
            $validatedData['slug'] = Str::slug($request->judul); 
     
        Post::create($validatedData);
        toast('Tambah post berhasil', 'success');
        return redirect('/admin-post')->with('success','berhasil tambah post');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('admin.post.test',[
            'posts'=>Post::find($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('admin.post.edit',[
            'posts'=>Post::find($id),
            'kategoris'=>Kategori::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $customMessages = [
            'judul.required' => 'Judul tidak boleh kosong',
            'judul.unique' => 'Judul sudah tersedia',
            'judul.max' => 'Tidak boleh lebih dari 100 karakter',
            'foto.required' =>'Foto tidak boleh kosong',
            'foto.max:2048' =>'Ukuran foto maksimal 2mb',
            'foto.image' =>'Foto Harus berupa gambar',
            'foto.mimes' =>'Format gambar jpeg,png,jpg,gif,svg',
            'body.required' => 'Body tidak boleh kosong',
            // Tambahkan pesan kustom lainnya sesuai kebutuhan
        ];

        $rules = [
            'judul'=> 'required|max:100|string|unique:posts,judul,' . $post->id,
            'kategori_id' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'body'=> 'required',
        ];

        $validatedData = $request->validate($rules,$customMessages);
        
        if($request->judul != $post->judul){
            $validatedData['slug'] = Str::slug($request->judul); 
        }

        if($request->file('foto')){
            $validatedData['foto'] = $request->file('foto')->store('post','public'); 
        }

        $post->update($validatedData);
        toast('Edit post berhasil', 'success');
        return redirect('/admin-post')->with('success','berhasil edit post');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        
        Post::destroy($id);
        toast('Hapus Post Berhasil', 'success');
        return redirect('/admin-post')->with('success','Hapus Post Berhasil');
        
    }
}
