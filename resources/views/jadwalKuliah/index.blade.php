@extends('layout.template')
@section('header')
<div class="card-header">
    <h3 class="card-title">{{Route::current()->uri}} Table</h3>
    <div class="card-tools">
        <form action="{{route('jadwal-kuliah.index')}}" class="form-inline" method="get">
            <a href="{{route('jadwal-kuliah.create')}}" class="btn btn-primary btn-sm mr-3"><i class="fa fa-plus"></i></a>
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
                        <a href="{{route('jadwal-kuliah.edit', $jadwalKuliah->id)}}" class="btn btn-success btn-sm">edit</a>
                        <form action="{{route('jadwal-kuliah.destroy', $jadwalKuliah->id)}}" style="display:inline " method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
@section('link')
    {{$jadwalKuliahs->links()}}
@endsection
