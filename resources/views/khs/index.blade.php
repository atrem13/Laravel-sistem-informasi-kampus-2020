@extends('layout.layout')
@section('title')
    index khs
@endsection
@section('content')
<div class="row">
    <div class="col-sm-6">
        <a href="{{route('khs.create')}}" class="btn btn-primary">Add</a>
    </div>
    <div class="col-sm-3 offset-3">
        <form action="{{route('khs.index')}}" class="form-inline" method="GET">
            <input type="text" name="search" class="form-control">
            <button type="submit" class="btn btn-primary">Cari</button>
        </form>
    </div>
</div>
    <table class="table table-striped mt-3">
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
    {{-- {{$khss->links()}} --}}
@endsection

