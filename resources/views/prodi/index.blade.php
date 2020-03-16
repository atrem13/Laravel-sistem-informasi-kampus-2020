@extends('layout.template')
@section('header')
<div class="card-header">
    <p class="card-title">{{Route::current()->uri}} Table</p>
    <div class="card-tools">
        <form action="{{route('prodi.index')}}" class="form-inline" method="get">
            <a href="{{route('prodi.create')}}" class="btn btn-primary btn-sm mr-3"><i class="fa fa-plus"></i></a>
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
            @foreach ($prodis as $prodi)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$prodi->nama}}</td>
                    <td>
                        <a href="{{route('prodi.edit', $prodi->id)}}" class="btn btn-sm btn-success">edit</a>
                        <form action="{{route('prodi.destroy', $prodi->id)}}" style="display: inline" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            @if (empty($prodis))
                <tr class="text-center">
                    <td colspan="3">Data tidak ada</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
@section('link')
    {{$prodis->links()}}
@endsection

