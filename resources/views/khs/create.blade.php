@extends('layout.template')
@section('header')
<div class="card-header">
    <p class="card-title">
        <a href="{{route('khs.index')}}" class="btn btn-secondary btn-sm mr-3"><span class="fa fa-arrow-left"></span></a>
         Add Khs
    </p>
</div>
@endsection
@section('table')
<div class="row">
    <div class="col-sm-8 offset-2">
        <form action="{{route('khs.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="">Mahasiswa</label>
                <select required name="krs_id" id="" class="form-control">
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
    </div>
</div>
@endsection
