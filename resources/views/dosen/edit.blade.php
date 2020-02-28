@extends('layout.layout')
@section('title')
    edit dosen
@endsection
@section('content')
@if ($errors->any())
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <li >{{$error}}</li>
        @endforeach
    </ul>
@endif
    <a href="{{route('dosen.index')}}" class="btn btn-secondary">Back</a>
    <form action="{{route('dosen.update', $dosen->id)}}" method="post">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{$dosen->id}}">
        <div class="form-group">
            <label for="">Nama</label>
            <input type="text" class="form-control" name="nama" value="{{$dosen->nama}}">
        </div>
        <div class="form-group">
            <label for="">NIDN</label>
            <input type="text" class="form-control" name="nidn" value="{{$dosen->nidn}}">
        </div>
        <div class="form-group">
            <label for="">Nomor Telepon</label>
            <input type="text" class="form-control" name="notelp" value="{{$dosen->notelp}}">
        </div>
        <div class="form-group">
            <label for="">Alamat</label>
            <textarea class="form-control" name="alamat">{{$dosen->alamat}}</textarea>
        </div>
        <div class="col-sm-12 text-right">
            <button type="submit" class="btn btn-success">Update</button>
        </div>
    </form>
@endsection

