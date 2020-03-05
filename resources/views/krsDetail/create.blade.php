@extends('layout.layout')
@section('title')
    index krsDetail
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-6">
            <a href="{{route('krs.index')}}" class="btn btn-secondary">back</a>
        </div>
    </div>
    @if(!$krsDetails->isEmpty())
    <table class="table-striped table mb-5">
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
    @endif
    <table class="table-striped table">
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
    {{-- {{$krsDetails->links()}} --}}
@endsection
