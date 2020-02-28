@extends('layout.layout')
@section('title')
    create matakuliah
@endsection
@section('content')
    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    <a href="{{route('matakuliah.index')}}" class="btn btn-secondary">Back</a>
    <form action="{{route('matakuliah.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="">Kode</label>
            <input type="text" class="form-control" name="kode">
        </div>
        <div class="form-group">
            <label for="">Nama</label>
            <input type="text" class="form-control" name="nama">
        </div>
        <div class="col-sm-12 text-right">
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </form>
@endsection
