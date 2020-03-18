@extends('layout.template')
@section('header')
<div class="card-header">
    <p class="card-title">
        <a href="{{route('krs.index')}}" class="btn btn-secondary btn-sm mr-3"><span class="fa fa-arrow-left"></span></a>
         Add KRS
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

        <form action="{{route('krs.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="">Mahasiswa</label>
                <select name="mahasiswa_id" id="" class="form-control">
                    <option value="">-pilih-</option>
                    @foreach ($mahasiswas as $mahasiswa)
                        <option value="{{$mahasiswa->id}}">{{$mahasiswa->nama}}</option>
                    @endforeach
                </select>
                @error('mahasiswa_id')
                    <span class="btn btn-sm btn-danger mt-2">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Semester</label>
                <input type="text" class="form-control" name="semester">
                @error('semester')
                    <span class="btn btn-sm btn-danger mt-2">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            {{-- <div class="form-group">
                <label for="">Status</label>
                <input type="text" class="form-control" name="status">
            </div> --}}
            <div class="col-sm-12 text-right">
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
    </div>
</div>
@endsection
