@extends('layout.template')
@section('header')
<div class="card-header">
    <p class="card-title">
        <a href="{{route('mahasiswa.index')}}" class="btn btn-sm mr-3 btn-secondary"><span class="fa fa-arrow-left"></span></a>
        Add Mahasiswa
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

        <form action="{{route('mahasiswa.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="">NIM</label>
                <input type="text" class="form-control" name="nim">
                @error('nim')
                    <span class="btn btn-sm btn-danger mt-2">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Nama</label>
                <input type="text" class="form-control" name="nama" value="{{old('nama')}}">
                @error('nama')
                    <span class="btn btn-sm btn-danger mt-2">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Prodi</label>
                <select name="prodi_id" id="" class="form-control" value="{{old('prodi_id')}}">
                    <option value="">-pilih-</option>
                    @foreach ($prodis as $prodi)
                        <option value="{{$prodi->id}}">{{$prodi->nama}}</option>
                    @endforeach
                </select>
                @error('prodi_id')
                    <span class="btn btn-sm btn-danger mt-2">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Angkatan</label>
                <input type="text" class="form-control" name="angkatan" value="{{old('nama')}}">
                @error('angkatan')
                    <span class="btn btn-sm btn-danger mt-2">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-sm-12 text-right">
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
    </div>
</div>
@endsection
