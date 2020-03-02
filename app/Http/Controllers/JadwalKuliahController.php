<?php

namespace App\Http\Controllers;

use App\Http\Requests\jadwalKuliahStoreRequest;
use App\Models\Dosen;
use App\Models\Hari;
use App\Models\JadwalKuliah;
use App\Models\Matakuliah;
use App\Models\Ruangan;
use Illuminate\Http\Request;

class JadwalKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $no = 1;
        $jadwalKuliahs = JadwalKuliah::paginate(10);
        return view('jadwalKuliah.index', compact('jadwalKuliahs', 'no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $haris = Hari::all();
        $matakuliahs = Matakuliah::all();
        $ruangans = Ruangan::all();
        $dosens = Dosen::all();
        return view('jadwalKuliah.create', compact('haris', 'matakuliahs', 'ruangans', 'dosens'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(jadwalKuliahStoreRequest $request)
    {
        $validated = $request->validated();
        // dd($request->waktu_mulai);
        JadwalKuliah::create($validated);
        return redirect('/JadwalKuliah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JadwalKuliah  $jadwalKuliah
     * @return \Illuminate\Http\Response
     */
    public function show(JadwalKuliah $jadwalKuliah)
    {
        $jadwalKuliah = JadwalKuliah::findOrfail($jadwalKuliah);
        return view('jadwalKuliah.show', compact('jadwalKuliah'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JadwalKuliah  $jadwalKuliah
     * @return \Illuminate\Http\Response
     */
    public function edit($jadwalKuliah)
    {
        $haris = Hari::all();
        $matakuliahs = Matakuliah::all();
        $ruangans = Ruangan::all();
        $dosens = Dosen::all();
        $jadwalKuliah = JadwalKuliah::where('id',$jadwalKuliah)->first();
        return view('jadwalKuliah.edit', compact('haris', 'matakuliahs', 'ruangans', 'jadwalKuliah','dosens'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JadwalKuliah  $jadwalKuliah
     * @return \Illuminate\Http\Response
     */
    public function update(jadwalKuliahStoreRequest $request, $jadwalKuliah)
    {
        $validated = $request->validated();
        JadwalKuliah::where('id',$jadwalKuliah)->first()->update($validated);
        return redirect('/JadwalKuliah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JadwalKuliah  $jadwalKuliah
     * @return \Illuminate\Http\Response
     */
    public function destroy($jadwalKuliah)
    {
        JadwalKuliah::where('id',$jadwalKuliah)->first()->delete();
        return redirect('/JadwalKuliah');
    }
}
