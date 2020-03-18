@extends('layout.template')
@section('header')
<div class="card-header">
    <p class="card-title">
        <a href="{{route('krs.index')}}" class="btn btn-secondary btn-sm mr-3"><span class="fa fa-arrow-left"></span></a>
         Edit KRS
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
        {{-- {{dd($krs)}} --}}
        <form action="{{route('krs.update', $krs->id)}}" method="post">
            @csrf
            @method("PUT")
            <div class="form-group">
                <label for="">mahasiswa</label>
                <select name="mahasiswa_id" id="" class="form-control">
                    <option value="">-pilih-</option>
                    @foreach ($mahasiswas as $mahasiswa)
                        <option value="{{$mahasiswa->id}}"
                            {{($mahasiswa->id == $krs->mahasiswa_id) ? 'selected' : ''}}
                        >
                            {{$mahasiswa->nama}}</option>
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
                <input type="text" class="form-control" name="semester" value="{{$krs->semester}}">
                @error('semester')
                    <span class="btn btn-sm btn-danger mt-2">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Status</label>
                <select name="status" id="" class="form-control">
                    <option value="">-pilih-</option>
                    @foreach ($statuss as $status)
                        <option value="{{$status['status']}}"
                            {{($status['status'] == $krs->status) ? 'selected' : ''}}
                        >
                            {{$status['nama']}}</option>
                    @endforeach
                </select>
                @error('status')
                    <span class="btn btn-sm btn-danger mt-2">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-sm-12 text-right">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
