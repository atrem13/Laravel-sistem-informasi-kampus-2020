@extends('layout.layout')
@section('title')
    index mahasiswa
@endsection
@section('content')
    <div class="row">
        <di class="col-sm-6">
            <a href="{{route('mahasiswa.create')}}" class="btn btn-primary">Add</a>
        </di>
        <div class="col-sm-3 offset-3">
            <form action="{{route('mahasiswa.index')}}" class="form-inline" method="get">
                <input type="text" name="search" class="form-control">
                <button type="submit" class="btn btn-primary">cari</button>
            </form>
        </div>
    </div>
    <table class="table table-striped">
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
    {{$mahasiswas->links()}}
@endsection

