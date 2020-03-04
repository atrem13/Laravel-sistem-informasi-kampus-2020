@extends('layout.layout')
@section('title')
    jadwalkuliah index
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-6">
            <a href="{{route('jadwal-kuliah.create')}}" class="btn btn-primary">Add</a>
        </div>
        <div class="col-sm-3 offset-3">
            <form action="{{route('jadwal-kuliah.index')}}" class="form-inline" method="get">
                <input type="text" name="search" class="form-control">
                <button type="submit" class="btn btn-primary">Cari</button>
            </form>
        </div>
    </div>
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
