@extends('layout.layout')
@section('title')
    create krs
@endsection
@section('content')
    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    <a href="{{route('krs.index')}}" class="btn btn-secondary">Back</a>
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
        </div>
        <div class="form-group">
            <label for="">Semester</label>
            <input type="text" class="form-control" name="semester">
        </div>
        {{-- <div class="form-group">
            <label for="">Status</label>
            <input type="text" class="form-control" name="status">
        </div> --}}
        <div class="col-sm-12 text-right">
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </form>
@endsection
