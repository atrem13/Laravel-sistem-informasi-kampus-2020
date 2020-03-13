@extends('layout.template')
@section('header')
<div class="card-header">
    <h3 class="card-title">{{Route::current()->uri}} Table</h3>
    <div class="card-tools">
        <form action="{{route('dosen.index')}}" class="form-inline" method="get">
            <a href="{{route('dosen.create')}}" class="btn btn-primary btn-sm mr-3"><i class="fa fa-plus"></i></a>
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
@endsection
@section('link')
    {{$dosens->links()}}
@endsection
