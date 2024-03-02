<?php

namespace App\Http\Controllers;

use App\Models\AbsenSdm;
use App\Models\Hari;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
class AbsenSdmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $today = now()->toDateString();
        $inputDate = now()->toDateString();
        // $sdms_created_at = $request->input('created_at');
        $sdms_created_at = AbsenSdm::whereDate('created_at',$today)->get();
        // Jika ada input created_at, ambil data berdasarkan tanggal yang dipilih
        // if($sdms_created_at) {
        //     $absensdm = AbsenSdm::whereDate('created_at', $sdms_created_at)->get();
        // } else {
        //     Jika tidak ada input created_at, ambil semua data
        //     $absensdm = AbsenSdm::all();
        // }
    
        return view('admin.absensdm.index', [
            'absensdm' => $sdms_created_at,
            'inputdate'=>$inputDate
        ]);
    }
    public function cetak_pdf($inputDate){
        $today = now()->toDateString();
       
    

        $sdms_created_at = $inputDate ? AbsenSdm::whereDate('created_at', $inputDate)->get() : AbsenSdm::whereDate('created_at', $today)->get();
        $absenSdm = $sdms_created_at;
        $pdf = Pdf::loadView('admin.absensdm.absen_pdf',
        ['absensdm'=> $absenSdm,
         'inputData' => $inputDate]);
        return $pdf->stream('invoice.pdf');    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.absensdm.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama'=>'required',
            'nip'=>'required|min:10|max:33',
            'posisi'=>'required',
            'ket'=>'required',
            
        ]);

        AbsenSdm::create($validatedData);
        return view('user.absensdm.notifabsen');
    }

    public function notifabsen(){
        return view('user.absensdm.notifabsen');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
            // $sdms_created_at = $request->input('created_at'); // Ambil input tanggal dari permintaan
        $inputDate = $request->input('created_at');
 
        // Ubah format tanggal menjadi format yang sesuai dengan format dalam database (YYYY-MM-DD)
      

        // Cari data berdasarkan tanggal yang dimasukkan pengguna
        $absen_sdm = AbsenSdm::whereDate('created_at', $inputDate)->get();

        // Kembalikan data ke halaman tampilan
        return view('admin.absensdm.index', [
            'absensdm' => $absen_sdm,
            'inputdate'=>$inputDate
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AbsenSdm $absenSdm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AbsenSdm $absenSdm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AbsenSdm $absenSdm)
    {
        //
    }
}
