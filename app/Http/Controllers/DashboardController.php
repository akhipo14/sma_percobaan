<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Prestasi;
use App\Models\Ruang;
use App\Models\SDM;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){
        return view('admin.dashboard',[
        'kelas'=>Kelas::count(),
        'ruangs'=>Ruang::count(),
        'sdms'=>SDM::count(),
        'prestasis'=>Prestasi::count()    
        ]);
    }
}
