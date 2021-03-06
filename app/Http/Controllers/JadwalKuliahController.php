<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\jadwalKuliahStoreRequest;
use App\Models\Dosen;
use App\Models\Hari;
use App\Models\JadwalKuliah;
use App\Models\Matakuliah;
use App\Models\Ruangan;

class JadwalKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $search = $request->search;
            // BEFORE
            // $jadwalKuliahs = JadwalKuliah::where('waktu_mulai', 'LIKE', '%' . $search . '%')
            //                                ->orWhere('waktu_selesai', 'LIKE', '%' . $search . '%')
            //                                ->orWhereHas('Dosen', function($q) use($search){
            //                                     $q->where('nama', 'LIKE', '%' . $search . '%');
            //                                 })
            //                                ->orWhereHas('Hari', function($q) use($search){
            //                                    $q->where('nama', 'LIKE', '%' . $search . '%');
            //                                })
            //                                ->orWhereHas('Matakuliah', function($q) use($search){
            //                                    $q->where('nama', 'LIKE', '%' . $search . '%');
            //                                })
            //                                ->orWhereHas('Ruangan', function($q) use($search){
            //                                    $q->where('nama', 'LIKE', '%' . $search . '%');
            //                                })->paginate();

            // AFTER
            $closure = function ($query) use ($search) {
                $query->where('nama', 'like', '%' . $search . '%');
            };
            $jadwalKuliahs = JadwalKuliah::where('waktu_mulai', 'LIKE', '%' . $search . '%')
                                            ->orWhere('waktu_selesai', 'LIKE', '%' . $search . '%')
                                            ->orWhere('semester',  'LIKE', '%' . $search . '%')
                                            ->orWhere('slot', 'LIKE', '%' . $search . '%')
                                            ->orWhereHas('Dosen', $closure)
                                            ->orWhereHas('Hari', $closure)
                                            ->orWhereHas('Ruangan', $closure)
                                            ->orWhereHas('Matakuliah', $closure)->paginate(5);
            // dd($jadwalKuliahs);

        }else{
            $jadwalKuliahs = JadwalKuliah::paginate(5);
        }
        $no = 1;
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
