<?php

namespace App\Http\Controllers;

use App\Http\Requests\krsStoreRequest;
use App\Models\Krs;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class KrsController extends Controller
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
                if($status == 2 || $status == 5){
                    return redirect('/')->with('message', 'anda tidak memiliki hak akses ke halaman KRS');
                }
                if($status == 1 || $status == 3 || $status == 4){
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
            $closure = function ($query) use ($search) {
                $query->where('nama', 'like', '%' . $search . '%');
            };
            $krss = Krs::where('semester', 'LIKE', '%'.$search.'%')
                        ->orWhereHas('Mahasiswa', $closure)
                        ->paginate(10);
        }else{
            $krss = Krs::paginate(10);
        }
        $no=1;
        $status = [
            ['status'=>'0', 'nama'=>'belum approve'],
            ['status'=>'1', 'nama'=>'approve'],
            ['status'=>'2', 'nama'=>'sudah selesai'],
        ];

        return view('krs.index', compact('krss', 'no', 'status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mahasiswas = Mahasiswa::all();
        return view('krs.create', compact('mahasiswas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(krsStoreRequest $request)
    {
        $validated = $request->validated();
        Krs::create($validated);

        return redirect('/krs');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Krs  $krs
     * @return \Illuminate\Http\Response
     */
    public function show($krs)
    {
        $krs = Krs::where('id', $krs)->first();
        return view('krs.show', compact('krs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Krs  $krs
     * @return \Illuminate\Http\Response
     */
    public function edit($krs)
    {
        $krs = Krs::where('id', $krs)->first();
        $mahasiswas = Mahasiswa::all();
        $statuss = [
                    ['status'=>'0', 'nama'=>'belum approve'],
                    ['status'=>'1', 'nama'=>'approve'],
                    ['status'=>'2', 'nama'=>'sudah selesai'],
                ];
        // dd($status);
        return view('krs.edit', compact('krs', 'mahasiswas','statuss'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Krs  $krs
     * @return \Illuminate\Http\Response
     */
    public function update(krsStoreRequest $request, $krs)
    {
        $validated = $request->validated();
        // dd($request->status);
        Krs::where('id',$krs)->first()->update($validated);

        return redirect('/krs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Krs  $krs
     * @return \Illuminate\Http\Response
     */
    public function destroy($krs)
    {
        Krs::where('id',$krs)->first()->delete();

        return redirect('/krs');
    }
}
