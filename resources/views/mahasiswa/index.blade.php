@extends('layout.template')
@section('header')
<div class="card-header">
    <h3 class="card-title">{{Route::current()->uri}} Table</h3>
    <div class="card-tools">
        <form action="{{route('mahasiswa.index')}}" class="form-inline" method="get">
            <a href="{{route('mahasiswa.create')}}" class="btn btn-primary btn-sm mr-3"><i class="fa fa-plus"></i></a>
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
            <th>NIM</th>
            <th>Nama</th>
            <th>Prodi</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($mahasiswas as $mahasiswa)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$mahasiswa->nim}}</td>
                    <td>{{$mahasiswa->nama}}</td>
                    <td>{{$mahasiswa->prodi->nama}}</td>
                    <td>
                        <a href="{{route('mahasiswa.edit', $mahasiswa->id)}}" class="btn btn-success btn-sm">edit</a>
                        <form style="display:inline" action="{{route('mahasiswa.destroy', $mahasiswa->id)}}" method="post">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger btn-sm">delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
@section('link')
    {{$mahasiswas->links()}}
@endsection
