@extends('layout.layout')
@section('title')
    create prodi
@endsection
@section('content')
    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    <a href="{{route('prodi.index')}}" class="btn btn-secondary">Back</a>
    <form action="{{route('prodi.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="">Nama</label>
            <input type="text" name="nama" class="form-control">
        </div>
        <div class="col-sm-12 text-right">
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </form>
@endsection
