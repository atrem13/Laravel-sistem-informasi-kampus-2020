@extends('layout.template')
@section('header')
<div class="card-header">
    <p class="card-title">
        <a href="{{route('prodi.index')}}" class="btn btn-secondary btn-sm mr-3 "><span class="fa fa-arrow-left"></span></a>
        Edit Prodi
    </p>
</div>
@endsection
@section('table')
<div class="row">
    <div class="col-sm-8 offset-2">
        {{-- @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif --}}

        <form action="{{route('prodi.update', $prodi->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="">Nama</label>
                <input type="text" name="nama" class="form-control" value="{{$prodi->nama}}">
                @error('nama')
                    <span class="btn btn-sm btn-danger mt-2">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-sm-12 text-right">
                <button type="submit" class="btn btn-success">update</button>
            </div>
        </form>
    </div>
</div>
@endsection
