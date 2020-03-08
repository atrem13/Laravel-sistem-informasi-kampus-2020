@extends('layout.layout')
@section('title')
    create khs
@endsection
@section('content')
    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    <a href="{{route('khs.index')}}" class="btn btn-secondary">Back</a>
    <form action="{{route('khs.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="">Mahasiswa</label>
            <select name="krs_id" id="" class="form-control">
                <option value="">-pilih-</option>
                @foreach ($krss as $krs)
                    <option value="{{$krs->id}}">{{$krs->mahasiswa['nama']}} - ({{$krs->semester}})</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm-12 text-right">
            <button class="btn btn-primary" type="submit">Add</button>
        </div>
    </form>
@endsection
