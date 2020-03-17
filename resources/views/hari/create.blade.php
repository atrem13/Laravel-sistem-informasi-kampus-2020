@extends('layout.template')
@section('header')
    <div class="card-header">
        <p class="card-title"><a href="{{route('hari.index')}}" class="btn btn-secondary bt-sm mr-3"><span class="fa fa-arrow-left "></span></a>Add Hari</p>     
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
    </div>
</div>
@endsection
