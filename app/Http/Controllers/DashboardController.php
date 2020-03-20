<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Hari;
use App\Models\JadwalKuliah;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use App\Models\Prodi;
use App\Models\Ruangan;
use Illuminate\Http\Request;
class DashboardController extends Controller
{
    public function index(){
        $dosen = Dosen::count('id');
        $hari = Hari::count('id');
        $jadwalKuliah = JadwalKuliah::count('id');
        $mahasiswa = Mahasiswa::count('id');
        $matakuliah = Matakuliah::count('id');
        $prodi = Prodi::count('id');
        $ruangan = Ruangan::count('id');
        $datas = [
            ['nama'=>'Dosen', 'jumlah'=>$dosen],
            ['nama'=>'Hari', 'jumlah'=>$hari],
            ['nama'=>'Jadwal Kuliah', 'jumlah'=>$jadwalKuliah],
            ['nama'=>'Mahasiswa', 'jumlah'=>$mahasiswa],
            ['nama'=>'Matakuliah', 'jumlah'=>$matakuliah],
            ['nama'=>'Prodi', 'jumlah'=>$prodi],
            ['nama'=>'Ruangan', 'jumlah'=>$ruangan]
        ];
        return view('dashboard.index', compact('datas'));

    }
}
