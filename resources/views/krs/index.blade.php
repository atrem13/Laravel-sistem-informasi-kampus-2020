@extends('layout.layout')
@section('title')
    index krs
@endsection
@section('content')
    <div class="row">
        <di class="col-sm-6">
            <a href="{{route('krs.create')}}" class="btn btn-primary">Add</a>
        </di>
        <div class="col-sm-3 offset-3">
            <form action="{{route('krs.index')}}" class="form-inline" method="get">
                <input type="text" name="search" class="form-control">
                <button type="submit" class="btn btn-primary">cari</button>
            </form>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Mahasiswa</th>
                <th>Semester</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($krss as $krs)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$krs->mahasiswa->nama}}</td>
                    <td>{{$krs->semester}}</td>
                    <td>{{$status[$krs->status]['nama']}}</td>
                    <td>
                        <a href="{{route('krs-detail.create', $krs->id)}}" class="btn btn-secondary btn-sm">get krs</a>
                        <a href="{{route('krs.edit', $krs->id)}}" class="btn btn-success btn-sm">edit</a>
                        <form style="display:inline" action="{{route('krs.destroy', $krs->id)}}" method="post">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger btn-sm">delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$krss->links()}}
@endsection

