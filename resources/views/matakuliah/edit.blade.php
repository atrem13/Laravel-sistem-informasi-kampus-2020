@extends('layout.layout')
@section('title')
    edit matakuliah
@endsection
@section('content')
    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    {{-- {{dd($matakuliah)}} --}}
    <a href="{{route('matakuliah.index')}}" class="btn btn-secondary">Back</a>
    <form action="{{route('matakuliah.update', $matakuliah->id)}}" method="post">
        @csrf
        @method("PUT")
        <div class="form-group">
            <label for="">NIM</label>
            <input type="text" class="form-control" name="kode" value="{{$matakuliah->kode}}">
        </div>
        <div class="form-group">
            <label for="">Nama</label>
            <input type="text" class="form-control" name="nama" value="{{$matakuliah->nama}}">
        </div>
        <div class="col-sm-12 text-right">
            <button type="submit" class="btn btn-success">Update</button>
        </div>
    </form>
@endsection
