<?php

namespace App\Http\Controllers;

use App\Http\Requests\ruanganStoreRequest;
use App\Models\Ruangan;
use Illuminate\Http\Request;

class RuanganController extends Controller
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
            $ruangans = Ruangan::where('nama', $request->$search)->paginate(10);
        }else{
            $ruangans = Ruangan::paginate(10);
        }
        $no=1;

        return view('ruangan.index', compact('ruangans', 'no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ruangan.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ruanganStoreRequest $request)
    {
        $validated = $request->validated();
        Ruangan::create($validated);

        return redirect('/ruangan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function show(Ruangan $ruangan)
    {
        $ruangan = Ruangan::findOrfail($ruangan)->first();
        return view('ruangan.show', compact('ruangan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function edit(Ruangan $ruangan)
    {
        $ruangan = Ruangan::findOrfail($ruangan)->first();
        return view('ruangan.show', compact('ruangan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function update(ruanganStoreRequest $request, Ruangan $ruangan)
    {
        $validated = $request->validated();
        Ruangan::findOrfail($ruangan)->first()->update($validated);
        return redirect('/ruangan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ruangan $ruangan)
    {
        Ruangan::findOrfail($ruangan)->first()->delete();
        return redirect('/ruangan');
    }
}
