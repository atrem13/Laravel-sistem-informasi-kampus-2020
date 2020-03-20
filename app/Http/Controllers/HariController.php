<?php

namespace App\Http\Controllers;

use App\Http\Requests\hariStoreRequest;
use App\Models\Hari;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HariController extends Controller
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
                if($status == 2 || $status == 3){
                    return redirect('/')->with('message', 'anda tidak memiliki hak akses ke halaman Hari');
                }
                if($status == 1 || $status == 4 || $status == 5){
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
            $haris = hari::where('nama', 'LIKE' , '%' . $search . '%')->paginate(5);
        }else{
            $haris = hari::paginate(5);
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
        return view('hari.edit', compact('hari'));
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
