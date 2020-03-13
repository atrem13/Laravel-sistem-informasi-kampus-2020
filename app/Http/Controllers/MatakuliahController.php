<?php

namespace App\Http\Controllers;

use App\Http\Requests\matakuliahStoreRequest;
use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
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
            $matakuliahs = Matakuliah::where('kode', 'LIKE', '%' . $search . '%')
                                     ->orWhere('nama', 'LIKE', '%' . $search . '%')
                                     ->paginate(5);
            // dd($matakuliahs);
        }else{
            $matakuliahs = Matakuliah::paginate(5);
        }
        $no = 1;
        return view('matakuliah.index', compact('matakuliahs', 'no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('matakuliah.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(matakuliahStoreRequest $request)
    {
        $validated = $request->validated();
        Matakuliah::create($validated);
        return redirect('/matakuliah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Matakuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function show(Matakuliah $matakuliah)
    {
        $matakuliah = Matakuliah::findOrfail($matakuliah)->first();
        return view('matakuliah.show', compact('matakuliah'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Matakuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function edit(Matakuliah $matakuliah)
    {
        $matakuliah = Matakuliah::findOrfail($matakuliah)->first();
        return view('matakuliah.edit', compact('matakuliah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Matakuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function update(matakuliahStoreRequest $request, Matakuliah $matakuliah)
    {
        $validated = $request->validated();
        Matakuliah::findOrfail($matakuliah)->first()->update($validated);
        return redirect('/matakuliah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Matakuliah  $matakuliah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Matakuliah $matakuliah)
    {
        Matakuliah::findOrfail($matakuliah)->first()->delete();
        return redirect('/matakuliah');
    }
}
