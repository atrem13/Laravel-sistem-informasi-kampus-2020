@extends('layout.layout')
@section('title')
    create dosen
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
    <form action="{{route('dosen.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="">Nama</label>
            <input type="text" class="form-control" name="nama">
        </div>
        <div class="form-group">
            <label for="">NIDN</label>
            <input type="text" class="form-control" name="nidn">
        </div>
        <div class="form-group">
            <label for="">Nomor Telepon</label>
            <input type="text" class="form-control" name="notelp">
        </div>
        <div class="form-group">
            <label for="">Alamar</label>
            <textarea class="form-control" name="alamat"></textarea>
        </div>
        <div class="col-sm-12 text-right">
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </form>
@endsection

