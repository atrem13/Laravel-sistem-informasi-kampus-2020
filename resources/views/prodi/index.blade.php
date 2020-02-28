@extends('layout.layout')
@section('title')
    index prodi
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-6">
            <a href="{{route('prodi.create')}}" class="btn btn-primary">add</a>
        </div>
        <div class="col-sm-3 offset-3">
            <form action="{{route('prodi.index')}}" method="get" class="form-inline">
                <input type="text" name="search" class="form-control">
                <button type="submit" class="btn btn-primary">Cari</button>
            </form>
        </div>
    </div>
    {{-- {{dd($prodis)}} --}}
    <table class="table table-striped">
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
    {{$prodis->links()}}
@endsection

