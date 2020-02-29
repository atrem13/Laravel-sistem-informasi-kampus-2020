@extends('layout.layout')
@section('title')
    edit ruangan
@endsection
@section('content')
    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    <a href="{{route('ruangan.index')}}" class="btn btn-secondary">Back</a>
    <form action="{{route('ruangan.update', $ruangan->id)}}" method="post">
        @csrf
        @method("PUT")
        <div class="form-group">
            <label for="">Nama</label>
            <input type="text" name="nama" value="{{$ruangan->nama}}" class="form-control">
        </div>
        <div class="col-sm-12 text-right">
            <button class="btn btn-success" type="submit">Update</button>
        </div>
    </form>
@endsection
