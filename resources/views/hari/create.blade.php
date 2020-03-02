@extends('layout.layout')
@section('title')
    create hari
@endsection
@section('content')
    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    <a href="{{route('hari.index')}}" class="btn btn-secondary">Back</a>
    <form action="{{route('hari.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="">Nama</label>
            <input type="text" name="nama" class="form-control">
        </div>
        <div class="col-sm-12 text-right">
            <button class="btn btn-primary" type="submit">Add</button>
        </div>
    </form>
@endsection
