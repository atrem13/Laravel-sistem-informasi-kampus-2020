@extends('layout.template')
@section('header')
<div class="card-header">
    <p class="card-title">{{Route::current()->uri}} Table</p>
    <div class="card-tools">
        <form action="{{route('hari.index')}}" class="form-inline" method="get">
            <a href="{{route('hari.create')}}" class="btn btn-primary btn-sm mr-3"><i class="fa fa-plus"></i></a>
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
                <th>Nama</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($haris as $hari)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$hari->nama}}</td>
                    <td>
                        <a href="{{route('hari.edit', $hari->id)}}" class="btn btn-success btn-sm">edit</a>
                        <form style="display:inline" action="{{route('hari.destroy', $hari->id)}}" method="post">
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
    {{$haris->links()}}
@endsection
