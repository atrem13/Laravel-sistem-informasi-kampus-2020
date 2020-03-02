@extends('layout.layout')
@section('title')
    edit jadwal kuliah
@endsection
@section('content')
    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    <a href="{{route('JadwalKuliah.index')}}" class="btn btn-secondary">back</a>
    <form action="{{route('JadwalKuliah.update', $jadwalKuliah->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">Hari</label>
            <select name="hari_id" id="" class="form-control">
                <option value="">-pilih-</option>
                @foreach ($haris as $hari)
                    <option value="{{$hari->id}}" {{($hari->id === $jadwalKuliah->hari_id) ? 'selected' : ''}}>{{$hari->nama}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Matakuliah</label>
            <select name="matakuliah_id" id="" class="form-control">
                <option value="">-pilih-</option>
                @foreach ($matakuliahs as $matakuliah)
                    <option value="{{$matakuliah->id}}" {{($matakuliah->id === $jadwalKuliah->matakuliah_id) ? 'selected' : ''}}>{{$matakuliah->nama}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Dosen Pengajar</label>
            <select name="dosen_id" id="" class="form-control">
                <option value="">-pilih-</option>
                @foreach ($dosens as $dosen)
                    <option value="{{$dosen->id}}" {{($dosen->id === $jadwalKuliah->dosen_id) ? 'selected' : ''}}>{{$dosen->nama}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Ruangan</label>
            <select name="ruangan_id" id="" class="form-control">
                <option value="">-pilih-</option>
                @foreach ($ruangans as $ruangan)
                    <option value="{{$ruangan->id}}" {{($ruangan->id === $jadwalKuliah->ruangan_id) ? 'selected' : ''}}>{{$ruangan->nama}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Waktu Mulai</label>
            <input type="time" class="form-control" name="waktu_mulai" value="{{$jadwalKuliah->waktu_mulai}}">
        </div>
        <div class="form-group">
            <label for="">Waktu Selesi</label>
            <input type="time" class="form-control" name="waktu_selesai" value="{{$jadwalKuliah->waktu_selesai}}">
        </div>
        <div class="col-sm-12 text-right">
            <button type="submit" class="btn btn-success">Update</button>
        </div>
    </form>
@endsection
