@extends('layout.template')
@section('header')
<div class="card-header">
    <p class="card-title">
        <a href="{{route('ruangan.index')}}" class="btn btn-sm mr-3 btn-secondary"><span class="fa fa-arrow-left"></span></a>
        Edit Ruangan
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
    </div>
</div>
@endsection
