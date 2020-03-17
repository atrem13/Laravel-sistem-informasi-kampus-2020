@extends('layout.template')
@section('header')
    
    <div class="card-header">
        <p class="card-title">
            <a href="{{route('matakuliah.index')}}" class="btn btn-sm mr-3 btn-secondary"><span class="fa fa-arrow-left"></span></a>
            Edit Matakuliah
        </p>
      </div>
@endsection
@section('table')
<div class="row">
    <div class="col-sm-8 offset-2">
        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
        {{-- {{dd($matakuliah)}} --}}
        <form action="{{route('matakuliah.update', $matakuliah->id)}}" method="post">
            @csrf
            @method("PUT")
            <div class="form-group">
                <label for="">Kode</label>
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
    </div>
</div>
@endsection
