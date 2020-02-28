@extends('layout.layout')
@section('title')
    edit prodi
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
    <form action="{{route('prodi.update', $prodi->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">Nama</label>
            <input type="text" name="nama" class="form-control" value="{{$prodi->nama}}">
        </div>
        <div class="col-sm-12 text-right">
            <button type="submit" class="btn btn-success">update</button>
        </div>
    </form>
@endsection
