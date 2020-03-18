@extends('layout.template')
@section('header')
<div class="card-header">
    <p class="card-title"><a href="{{route('dosen.index')}}" class="btn btn-secondary btn-sm mr-3"> <i class="fa fa-arrow-left"></i> </a>Add dosen</p>
</div>
@endsection
@section('table')
<div class="row">
    <div class="col-sm-8 offset-2">
        {{-- @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li >{{$error}}</li>
                @endforeach
            </ul>
        @endif --}}
            <form action="{{route('dosen.store')}}" method="post">
                @csrf
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
                    <label for="">NIDN</label>
                    <input type="text" class="form-control" name="nidn" value="{{old('nidn')}}">
                    @error('nidn')
                        <span class="btn btn-sm btn-danger mt-2">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Nomor Telepon</label>
                    <input type="text" class="form-control" name="notelp" value="{{old('notelp')}}">
                    @error('notelp')
                        <span class="btn btn-sm btn-danger mt-2">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Alamat</label>
                    <textarea class="form-control" name="alamat">{{old('alamat')}}</textarea>
                    @error('alamat')
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

