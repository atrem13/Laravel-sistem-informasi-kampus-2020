<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Http\Requests\dosenStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DosenController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Request $request)
    {
        $this->middleware(function($request, $next){

            if($request->user()){
                $status = $request->user()->hak_akses_id;
                if($status == 3 || $status == 5){
                    return redirect('/')->with('message', 'anda tidak memiliki hak akses ke halaman Dosen');
                }
                if($status == 1 || $status == 2 || $status == 4){
                    return $next($request);
                }
            }
            return redirect()->route('login');
        });
    }
    public function index(Request $request)
    {

        if($request->has('search')){
            $search = $request->search;
            $dosens = Dosen::where('nama', 'LIKE', '%' . $search . '%')
                            ->orWhere('nidn', 'LIKE', '%' . $search . '%')
                            ->orWhere('notelp', 'LIKE', '%' . $search . '%')
                            ->orWhere('alamat', 'LIKE', '%' . $search . '%')
                            ->paginate(5);

        }else{
            $dosens = Dosen::paginate(5);
        }
        $no = 1;
        return view('dosen.index', compact('dosens','no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dosen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(dosenStoreRequest $request)
    {
        $validated = $request->validated();
        Dosen::create($validated);
        return redirect('/dosen');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function show(dosen $dosen)
    {
        $dosen = Dosen::findOrFail($dosen);
        return view('dosen.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function edit(dosen $dosen)
    {
        $dosen = Dosen::findOrFail($dosen)->first();
        return view('dosen.edit', compact('dosen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function update(dosenStoreRequest $request, dosen $dosen)
    {
        $validated = $request->validated();
        Dosen::findOrFail($dosen)->first()->update($validated);
        return redirect('/dosen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function destroy(dosen $dosen)
    {
        Dosen::findOrFail($dosen)->first()->delete();
        return redirect('/dosen');
    }
}
