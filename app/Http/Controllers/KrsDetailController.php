<?php

namespace App\Http\Controllers;

use App\Http\Requests\krsDetailStoreRequest;
use App\Models\JadwalKuliah;
use App\Models\KrsDetail;
use Illuminate\Http\Request;

class KrsDetailController extends Controller
{
    public function create($krs_id)
    {
        $krs_id = $krs_id;
        $krsDetails = KrsDetail::where('krs_id', $krs_id)->get();
        $jadwalKuliahs = JadwalKuliah::WhereDoesntHave('krsDetails',function($query) use ($krs_id){
                                            //  dd($krs_id);

                                            $query->where('krs_id', '=', $krs_id);
                                        })->get();
        $no = 1;
        // dd($jadwalKuliahs);
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
