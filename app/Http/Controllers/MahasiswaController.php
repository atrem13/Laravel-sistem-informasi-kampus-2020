<?php

namespace App\Http\Controllers;

use App\Http\Requests\mahasiswaStoreRequest;
use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
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
            // $mahasiswas = mahasiswas::with('Prodi')->where(function($query) use ($search)
            // {
            //     $query->where('nim', 'LIKE', '%' . $search . '%')
            //           ->orWhere('nama', 'LIKE', '%' . $search . '%')
            //           ->orWhereHas('Prodi', function($q) use ($search) {
            //                 $q->where(function($q) use ($search) {
            //                     $q->where('nama', 'LIKE', '%' . $search . '%');
            //             });
            //         });

            // })->paginate(10);

            // AFTER
            $closure = function ($query) use ($search) {
                $query->where('nama', 'like', '%' . $search . '%');
            };
            $mahasiswas = Mahasiswa::where('nim', 'LIKE', '%' . $search . '%')
                                            ->orWhere('nama', 'LIKE', '%' . $search . '%')
                                            ->orWhereHas('Prodi', $closure)->paginate(5);
        }
        else{
            $mahasiswas = Mahasiswa::paginate(5);
        }
        $no=1;
        return view('mahasiswa.index', compact('mahasiswas', 'no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prodis = Prodi::all();
        return view('mahasiswa.create', compact('prodis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(mahasiswaStoreRequest $request)
    {
        $validated = $request->validated();
        Mahasiswa::create($validated);
        return redirect('/mahasiswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show($mahasiswa)
    {
        $mahasiswa = Mahasiswa::findOrFal($mahasiswa);
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit($mahasiswa)
    {
        $mahasiswa = Mahasiswa::where('id',$mahasiswa)->first();
        $prodis = Prodi::all();
        return view('mahasiswa.edit', compact('mahasiswa', 'prodis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(mahasiswaStoreRequest $request, $mahasiswa)
    {
        $validated = $request->validated();
        Mahasiswa::where('id', $mahasiswa->id)->first()->update($validated);
        return redirect('/mahasiswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($mahasiswa)
    {
        Mahasiswa::where('id',$mahasiswa->id)->first()->delete();
        return redirect('/mahasiswa');
    }
}
