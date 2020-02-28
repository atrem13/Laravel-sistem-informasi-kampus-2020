@extends('layout.layout')
@section('title')
    index dosen
@endsection
@section('content')
<div class="row">
    <div class="col-sm-6">
        <a href="{{route('dosen.create')}}" class="btn btn-primary">Add</a>
    </div>
    <div class="col-sm-3 offset-3">
        <form action="{{route('dosen.index')}}" class="form-inline" method="GET">
            <input type="text" name="search" class="form-control">
            <button type="submit" class="btn btn-primary">Cari</button>
        </form>
    </div>
</div>
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>No</th>
                <th>NIDN</th>
                <th>Nama</th>
                <th>Notelp</th>
                <th>Alamat</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dosens as $dosen)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$dosen->nidn}}</td>
                    <td>{{$dosen->nama}}</td>
                    <td>{{$dosen->notelp}}</td>
                    <td>{{$dosen->alamat}}</td>
                    <td>
                        <a href="{{route('dosen.edit', $dosen->id)}}" class="btn btn-success btn-sm">edit</a>
                        <form style="display:inline" action="{{route('dosen.destroy', $dosen->id)}}" method="post">
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-sm btn-danger" type="submit">delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$dosens->links()}}
@endsection

