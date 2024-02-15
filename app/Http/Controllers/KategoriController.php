<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;


class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Delete Data!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('admin.kategori.index',[
            'kategoris'=>Kategori::latest()->paginate(5)
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
            'nama_kategori'=>'required|string|max:75|unique:kategoris',
            'slug'=>'required|unique:kategoris'
        ];

        $customMessages = [
            'nama_kategori.required' => 'Nama kategori tidak boleh kosong',
            'nama_kategori.max' => 'Tidak boleh lebih dari 75 karakter',
            'nama_kategori.unique' => 'Nama kategori sudah tersedia',
            'slug.unique' => 'Slug sudah tersedia',
            // Tambahkan pesan kustom lainnya sesuai kebutuhan
        ];
        
        $validatedData= Validator::make($request->all(),$rules,$customMessages);
        if($validatedData->fails()){
            Alert::toast($validatedData->errors()->all(),'error');
            return redirect()->back()
                ->withErrors($validatedData);
        }

        $validatedData2 = $validatedData->validate([
            'nama_kategori'=> $request->nama_kategori,
            'slug'=> Str::slug($request->nama_kategori)
        ]);
        Kategori::create($validatedData2);
        toast('Tambah Kategori Berhasil', 'success');
        return redirect('/admin-kategori')->with('success','Tambah Kategori Berhasil');

    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'nama_kategori'=>'required|string|max:75|unique:kategoris',
        ];
    
        $customMessages = [
            'nama_kategori.required' => 'Nama kategori tidak boleh kosong',
            'nama_kategori.max' => 'Tidak boleh lebih dari 75 karakter',
            'nama_kategori.unique' => 'Nama kategori sudah tersedia',
            // Tambahkan pesan kustom lainnya sesuai kebutuhan
        ];
    
        $validatedData= Validator::make($request->all(),$rules,$customMessages);
    
        if($validatedData->fails()){
            Alert::toast($validatedData->errors()->all(),'error');
            return redirect()->back()->withErrors($validatedData);
        }
    
        $kategori = Kategori::find($id);
    
        if(!$kategori){
            Alert::error('Kategori tidak ditemukan');
            return redirect()->back();
        }
    
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->slug = Str::slug($request->nama_kategori); // Mengupdate slug
        $kategori->save();
    
        toast('Edit Kategori Berhasil', 'success');
        return redirect('/admin-kategori')->with('success','Tambah Kategori Berhasil');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Kategori::destroy($id);
        toast('Hapus Kategori Berhasil', 'success');
        return redirect('/admin-kategori')->with('success','Hapus Kategori Berhasil');
    }

    public function createslug(Request $request){
        $slug = SlugService::createSlug(Kategori::class, 'slug', $request->nama_kategori);
        return response()->json(['slug' => $slug]);
    }

}
