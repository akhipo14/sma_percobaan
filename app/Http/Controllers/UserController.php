<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Post;
use App\Models\Prestasi;
use App\Models\Ruang;
use App\Models\SDM;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.index',[
            'kelas'=>Kelas::count(),
            'ruangs'=>Ruang::count(),
            'sdms'=>SDM::count(),
            'prestasis'=>Prestasi::count(),    
            'posts'=>Post::latest()->paginate(3),
            'gallerys'=>Gallery::all()

        ]);
    }

    public function blog_single($slug){
      
        $post_id = Post::where('slug',$slug)->firstOrFail();

        $kategori_id = $post_id->kategori_id;
        // dd($kategori_id);
        $post_all_by_kategori = Post::where('kategori_id',$kategori_id)->latest()->paginate(3);
        $kategoris = Kategori::withCount('post' )->get();
        return view('user.blog.blog-single',[
            'posts'=>$post_id,
            'kategoris'=>$kategoris,
            'post_all_by_kategori' => $post_all_by_kategori,
        ]);
    }

    public function blog_kategori($slug){
        $kategori = Kategori::where('slug',$slug)->firstOrFail();

        $kategori_id = $kategori->id ;
        
        // dd($kategori_id);
        $post_all_by_kategori = Post::where('kategori_id',$kategori_id)->latest()->paginate();
        $post = $post_all_by_kategori;
        // dd($post);
        $kategoris = Kategori::withCount('post' )->get();
        return view('user.blog.blog-kategori',[
            'posts'=>$post,
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
