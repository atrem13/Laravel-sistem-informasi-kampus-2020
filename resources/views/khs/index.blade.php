@extends('layout.template')
@section('header')
<div class="card-header">
    <p class="card-title">{{Route::current()->uri}} Table</p>
    <div class="card-tools">
        <form action="{{route('khs.index')}}" class="form-inline" method="get">
            <a href="{{route('khs.create')}}" class="btn btn-primary btn-sm mr-3"><i class="fa fa-plus"></i></a>
            <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="search" class="form-control float-right" placeholder="search">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('table')
    <table class="table table-head-fixed text-nowrap">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Semester</th>
                <th>IPK</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($khss as $khs)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$khs->krs['mahasiswa']['nama']}}</td>
                    <td>{{$khs->krs['semester']}}</td>
                    <td>{{$khs->ipk}}</td>
                    <td>
                        <a href="{{route('khs.showDetail', $khs->id)}}" class="btn btn-success btn-sm">detail</a>
                        <form style="display:inline" action="{{route('khs.destroy', $khs->id)}}" method="post">
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-sm btn-danger" type="submit">delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
@section('link')
    {{$khss->links()}}
@endsection
