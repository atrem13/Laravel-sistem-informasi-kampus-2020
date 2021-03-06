@extends('layout.template')
@section('header')
    <div class="card-header">
        <p class="card-title">
            <a href="{{route('jadwal-kuliah.index')}}" class="btn btn-secondary btn-sm mr-3 "><span class="fa fa-arrow-left"></span></a>
            Edit Jadwal Kuliah
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

        <form action="{{route('jadwal-kuliah.update', $jadwalKuliah->id)}}" method="post">
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
                @error('hari_id')
                    <span class="btn btn-sm btn-danger mt-2">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Matakuliah</label>
                <select name="matakuliah_id" id="" class="form-control">
                    <option value="">-pilih-</option>
                    @foreach ($matakuliahs as $matakuliah)
                        <option value="{{$matakuliah->id}}" {{($matakuliah->id === $jadwalKuliah->matakuliah_id) ? 'selected' : ''}}>{{$matakuliah->nama}}</option>
                    @endforeach
                </select>
                @error('matakuliah_id')
                    <span class="btn btn-sm btn-danger mt-2">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Dosen Pengajar</label>
                <select name="dosen_id" id="" class="form-control">
                    <option value="">-pilih-</option>
                    @foreach ($dosens as $dosen)
                        <option value="{{$dosen->id}}" {{($dosen->id === $jadwalKuliah->dosen_id) ? 'selected' : ''}}>{{$dosen->nama}}</option>
                    @endforeach
                </select>
                @error('dosen_id')
                    <span class="btn btn-sm btn-danger mt-2">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Ruangan</label>
                <select name="ruangan_id" id="" class="form-control">
                    <option value="">-pilih-</option>
                    @foreach ($ruangans as $ruangan)
                        <option value="{{$ruangan->id}}" {{($ruangan->id === $jadwalKuliah->ruangan_id) ? 'selected' : ''}}>{{$ruangan->nama}}</option>
                    @endforeach
                </select>
                @error('ruangan_id')
                    <span class="btn btn-sm btn-danger mt-2">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Semester</label>
                <input type="number" class="form-control" name="semester" value="{{$jadwalKuliah->semester}}">
                @error('semester')
                    <span class="btn btn-sm btn-danger mt-2">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Slot</label>
                <input type="number" class="form-control" name="slot" value="{{$jadwalKuliah->slot}}">
                @error('slot')
                    <span class="btn btn-sm btn-danger mt-2">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Waktu Mulai</label>
                <input type="time" class="form-control" name="waktu_mulai" value="{{$jadwalKuliah->waktu_mulai}}">
                @error('waktu_mulai')
                    <span class="btn btn-sm btn-danger mt-2">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Waktu Selesi</label>
                <input type="time" class="form-control" name="waktu_selesai" value="{{$jadwalKuliah->waktu_selesai}}">
                @error('waktu_selesai')
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
