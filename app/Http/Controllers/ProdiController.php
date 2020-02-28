<?php

namespace App\Http\Controllers;

use App\Http\Requests\prodiStoreRequest;
use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
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
            $prodis = Prodi::where('nama', 'LIKE', '%' . $search . '%')->paginate(10);
    	}else{
    		$prodis = Prodi::paginate(10);
        }
        $no=1;
        return view('prodi.index',compact('prodis', 'no'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('prodi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(prodiStoreRequest $request)
    {
        $validated = $request->validated();
        $prodi = Prodi::create($validated);
        // $prodi->searchable();

        return redirect('/prodi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function show(Prodi $prodi)
    {
        $prodi = Prodi::findOrFail($prodi)->first();
        return view('prodi.show', compact('prodi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function edit(Prodi $prodi)
    {
        $prodi = Prodi::findOrFail($prodi)->first();
        return view('prodi.edit', compact('prodi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function update(prodiStoreRequest $request, Prodi $prodi)
    {
        $validated = $request->validated();
        $prodi = Prodi::findOrFail($prodi)->first()->update($validated);
        // $prodi->searchable();
        return redirect('/prodi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prodi $prodi)
    {
        $prodi = Prodi::findOrFail($prodi)->first()->delete()->unsearchable();
        return redirect('/prodi');
    }
}
