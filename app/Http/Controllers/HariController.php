<?php

namespace App\Http\Controllers;

use App\Http\Requests\hariStoreRequest;
use App\Models\Hari;
use Illuminate\Http\Request;

class HariController extends Controller
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
            $haris = hari::where('nama', 'LIKE' , '%' . $search . '%')->paginate(10);
        }else{
            $haris = hari::paginate(10);
        }
        $no=1;

        return view('hari.index', compact('haris', 'no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hari.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(hariStoreRequest $request)
    {
        $validated = $request->validated();
        hari::create($validated);

        return redirect('/hari');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hari  $hari
     * @return \Illuminate\Http\Response
     */
    public function show(Hari $hari)
    {
        $hari = hari::findOrfail($hari)->first();
        return view('hari.show', compact('hari'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hari  $hari
     * @return \Illuminate\Http\Response
     */
    public function edit(Hari $hari)
    {
        $hari = hari::findOrfail($hari)->first();
        return view('hari.show', compact('hari'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hari  $hari
     * @return \Illuminate\Http\Response
     */
    public function update(hariStoreRequest $request, Hari $hari)
    {
        $validated = $request->validated();
        hari::findOrfail($hari)->first()->update($validated);
        return redirect('/hari');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hari  $hari
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hari $hari)
    {
        hari::findOrfail($hari)->first()->delete();
        return redirect('/hari');
    }
}
