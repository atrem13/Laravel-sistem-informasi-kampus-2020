@extends('layout.template')
@section('header')
<div class="card-header">
    <h3 class="card-title">{{Route::current()->uri}} Table</h3>
    <div class="card-tools">
        <form action="{{route('krs-detail.create', $krs_id)}}" class="form-inline" method="get">
            <a href="{{route('krs.create')}}" class="btn btn-primary btn-sm mr-3"><i class="fa fa-left-arrow"></i></a>
            <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="search" class="form-control float-right" placeholder="search">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('table')
    @if(!$krsDetails->isEmpty())
        <table class="table table-head-fixed text-nowrap mb-5">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Hari</th>
                    <th>Matakuliah</th>
                    <th>Dosen Pengajar</th>
                    <th>Ruangan</th>
                    <th>Semester</th>
                    <th>Slot Tersisa</th>
                    <th>Jam</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($krsDetails as $krsDetail)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$krsDetail->jadwalKuliah['hari']['nama']}}</td>
                        <td>{{$krsDetail->jadwalKuliah['matakuliah']['nama']}}</td>
                        <td>{{$krsDetail->jadwalKuliah['dosen']['nama']}}</td>
                        <td>{{$krsDetail->jadwalKuliah['ruangan']['nama']}}</td>
                        <td>{{$krsDetail->jadwalKuliah['semester']}}</td>
                        <td>{{$krsDetail->jadwalKuliah['slot']}}</td>
                        <td>{{$krsDetail->jadwalKuliah['waktu_mulai']}} - {{$krsDetail->jadwalKuliah['waktu_selesai']}}</td>
                        <td>
                            <form action="{{route('krs-detail.cancel', $krsDetail->id)}}" style="display:inline " method="POST">
                                @csrf
                                @method("DELETE")
                                <input type="hidden" name="jadwal_kuliah_id" value="{{$krsDetail->jadwalKuliah['id']}}">
                                <input type="hidden" name="krs_id" value="{{$krs_id}}">
                                <button type="submit" class="btn btn-danger btn-sm">cancel</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <br>
    @endif
@endsection

@section('header2')
<div class="card-header">
    <h3 class="card-title">{{Route::current()->uri}} Table</h3>
    <div class="card-tools">
        <form action="{{route('krs-detail.create', $krs_id)}}" class="form-inline" method="get">
            <a href="{{route('krs.create')}}" class="btn btn-primary btn-sm mr-3"><i class="fa fa-left-arrow"></i></a>
            <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="search2" class="form-control float-right" placeholder="search">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('table2')
    <table class="table table-head-fixed text-nowrap">
        <thead>
            <tr>
                <th>No</th>
                <th>Hari</th>
                <th>Matakuliah</th>
                <th>Dosen Pengajar</th>
                <th>Ruangan</th>
                <th>Semester</th>
                <th>Slot</th>
                <th>Jam</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jadwalKuliahs as $jadwalKuliah)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$jadwalKuliah->hari->nama}}</td>
                    <td>{{$jadwalKuliah->matakuliah->nama}}</td>
                    <td>{{$jadwalKuliah->dosen->nama}}</td>
                    <td>{{$jadwalKuliah->ruangan->nama}}</td>
                    <td>{{$jadwalKuliah->semester}}</td>
                    <td>{{$jadwalKuliah->slot}}</td>
                    <td>{{$jadwalKuliah->waktu_mulai}} - {{$jadwalKuliah->waktu_selesai}}</td>
                    <td>
                        <form action="{{route('krs-detail.store', $jadwalKuliah->id)}}" style="display:inline " method="POST">
                            @csrf
                            <input type="hidden" name="jadwal_kuliah_id" value="{{$jadwalKuliah->id}}">
                            <input type="hidden" name="krs_id" value="{{$krs_id}}">
                            <button type="submit" class="btn btn-primary btn-sm">Choose</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
