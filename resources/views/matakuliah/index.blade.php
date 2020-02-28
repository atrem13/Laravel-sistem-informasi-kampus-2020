@extends('layout.layout')
@section('title')
    index matakuliah
@endsection
@section('content')
    <div class="row">
        <di class="col-sm-6">
            <a href="{{route('matakuliah.create')}}" class="btn btn-primary">Add</a>
        </di>
        <div class="col-sm-3 offset-3">
            <form action="{{route('matakuliah.index')}}" class="form-inline" method="get">
                <input type="text" name="search" class="form-control">
                <button type="submit" class="btn btn-primary">cari</button>
            </form>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($matakuliahs as $matakuliah)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$matakuliah->kode}}</td>
                    <td>{{$matakuliah->nama}}</td>
                    <td>
                        <a href="{{route('matakuliah.edit', $matakuliah->id)}}" class="btn btn-success btn-sm">edit</a>
                        <form style="display:inline" action="{{route('matakuliah.destroy', $matakuliah->id)}}" method="post">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger btn-sm">delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$matakuliahs->links()}}
@endsection

