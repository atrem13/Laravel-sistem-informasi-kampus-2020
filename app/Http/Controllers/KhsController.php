<?php

namespace App\Http\Controllers;

// use App\Http\Requests\khsDetailStoreRequest;
// use App\Http\Requests\khsStoreRequest;
use App\Models\Khs;
use App\Models\KhsDetail;
use App\Models\Krs;
use App\Models\KrsDetail;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class KhsController extends Controller
{
    public function index(Request $request)
    {
        $khss = Khs::paginate(10);
        $no = 1;

        return view('khs.index', compact('khss', 'no'));
    }

    public function create(Request $request)
    {
        $krss = Krs::whereDoesntHave('Khs')->get();
        // dd($krss);
        return view('khs.create', compact('krss'));
    }

    public function store(Request $request){
        // $krs_id = Krs::select('id')->where('mahasiswa_id', $request->mahasiswa_id)
        //                 ->where('semester', $request->semester)
        //                 ->first();
        $khs_id = Khs::create(['krs_id'=>$request->krs_id])->id;
        // dd($khs_id);
        $krsDetails = KrsDetail::select('id')->where('krs_id', $request->krs_id)->get();
        // dd($krsDetails);
        foreach($krsDetails as $item){
            KhsDetail::create([
                'khs_id'=>$khs_id,
                'krs_detail_id'=>$item->id
            ]);
        }
        return redirect('/khs');
    }

    public function showDetail($khs_id)
    {
        $khsDetails = KhsDetail::where('khs_id', $khs_id)->paginate(10);
        $no=1;
        return view('khs.showDetail', compact('khsDetails','no'));
    }
    public function updateDetail(Request $request, $id)
    {
        $validated = $this->validate($request,[
            'nilai'=>'required|numeric'
        ]);
        // dd($request->khs_id);
        KhsDetail::where('id',$id)->first()->update($validated);
        $data = KhsDetail::where('khs_id', $request->khs_id)
                                ->selectRaw("count(id) as totalMatkul, sum(nilai) as totalNilai")
                                ->first();
        // dd($data);
        $ipk = $data['totalNilai']/$data['totalMatkul'];
        Khs::where('id',$request->khs_id)->first()->update(['ipk'=>$ipk]);

        return redirect()->route('khs.showDetail',[$request->khs_id]);

    }

}
