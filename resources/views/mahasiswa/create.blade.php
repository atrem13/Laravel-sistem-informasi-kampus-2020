@extends('layout.layout')
@section('title')
    create mahasiswa
@endsection
@section('content')
    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    <a href="{{route('mahasiswa.index')}}" class="btn btn-secondary">Back</a>
    <form action="{{route('mahasiswa.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="">NIM</label>
            <input type="text" class="form-control" name="nim">
        </div>
        <div class="form-group">
            <label for="">Nama</label>
            <input type="text" class="form-control" name="nama">
        </div>
        <div class="form-group">
            <label for="">Prodi</label>
            <select name="prodi_id" id="" class="form-control">
                <option value="">-pilih-</option>
                @foreach ($prodis as $prodi)
                    <option value="{{$prodi->id}}">{{$prodi->nama}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Angkatan</label>
            <input type="text" class="form-control" name="angkatan">
        </div>
        <div class="col-sm-12 text-right">
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </form>
@endsection
