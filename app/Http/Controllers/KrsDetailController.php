<?php

namespace App\Http\Controllers;

use App\Http\Requests\krsDetailStoreRequest;
use App\Models\Dosen;
use App\Models\Hari;
use App\Models\JadwalKuliah;
use App\Models\Matakuliah;
use App\Models\Ruangan;
use App\Models\KrsDetail;
use Illuminate\Http\Request;

class KrsDetailController extends Controller
{
    public function create(Request $request, $krs_id)
    {
        $krs_id = $krs_id;
        if($request->has('search')){
            $search = $request->search;
            $closure = function ($query) use ($search) {
                $query->where('nama', 'LIKE', '%' . $search . '%');
            };
            $krsDetails = KrsDetail::whereHas('JadwalKuliah.dosen', $closure)
                                        ->orWhereHas('JadwalKuliah.hari', $closure)
                                        ->orWhereHas('JadwalKuliah.matakuliah', $closure)
                                        ->orWhereHas('JadwalKuliah.ruangan', $closure)
                                        ->paginate(10);
        }else{
            $krsDetails = KrsDetail::where('krs_id', $krs_id)->paginate(10);
        }
        if($request->has('search2')){
            $search = $request->search2;
            $closure = function ($query) use ($search){
                $query->where('nama', 'LIKE', '%' . $search . '%');
            };
            $jadwalKuliahs = JadwalKuliah::where('waktu_mulai', 'LIKE', '%' . $search . '%')
                                            ->orWhere('waktu_selesai', 'LIKE', '%' . $search . '%')
                                            ->orWhere('semester',  'LIKE', '%' . $search . '%')
                                            ->orWhere('slot', 'LIKE', '%' . $search . '%')
                                            ->orWhereHas('Dosen', $closure)
                                            ->orWhereHas('Hari', $closure)
                                            ->orWhereHas('Ruangan', $closure)
                                            ->orWhereHas('Matakuliah', $closure)
                                            ->WhereDoesntHave('krsDetails',function($query) use ($krs_id){
                                                $query->where('krs_id', '=', $krs_id);
                                            })->paginate(10);
                                            // dd($jadwalKuliahs);

        }else{
            $jadwalKuliahs = JadwalKuliah::WhereDoesntHave('krsDetails',function($query) use ($krs_id){
                                                $query->where('krs_id', '=', $krs_id);
                                            })->paginate(10);
        }
        $no = 1;
        return view('krsDetail.create', compact('no', 'krsDetails', 'jadwalKuliahs', 'krs_id'));
    }
    public function store(krsDetailStoreRequest $request)
    {
        $validated = $request->validated();
        KrsDetail::Create($validated);
        JadwalKuliah::where('id', $request->jadwal_kuliah_id)->decrement('slot', 1);

        return redirect()->route('krs-detail.create', [$request->krs_id]);
    }
    public function cancel(Request $request, $id)
    {
        KrsDetail::where('id', $id)->first()->delete();
        JadwalKuliah::where('id', $request->jadwal_kuliah_id)->increment('slot', 1);
        return redirect()->route('krs-detail.create', [$request->krs_id]);
    }
}
