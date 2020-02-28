@extends('layout.layout')
@section('title')
    edit mahasiswa
@endsection
@section('content')
    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    {{-- {{dd($mahasiswa)}} --}}
    <a href="{{route('mahasiswa.index')}}" class="btn btn-secondary">Back</a>
    <form action="{{route('mahasiswa.update', $mahasiswa->id)}}" method="post">
        @csrf
        @method("PUT")
        <div class="form-group">
            <label for="">NIM</label>
            <input type="text" class="form-control" name="nim" value="{{$mahasiswa->nim}}">
        </div>
        <div class="form-group">
            <label for="">Nama</label>
            <input type="text" class="form-control" name="nama" value="{{$mahasiswa->nama}}">
        </div>
        <div class="form-group">
            <label for="">Prodi</label>
            <select name="prodi_id" id="" class="form-control">
                <option value="">-pilih-</option>
                @foreach ($prodis as $prodi)
                    <option value="{{$prodi->id}}"
                        {{($prodi->id == $mahasiswa->prodi_id) ? 'selected' : ''}}
                    >
                        {{$prodi->nama}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Angkatan</label>
            <input type="text" class="form-control" name="angkatan" value="{{$mahasiswa->angkatan}}">
        </div>
        <div class="col-sm-12 text-right">
            <button type="submit" class="btn btn-success">Update</button>
        </div>
    </form>
@endsection
