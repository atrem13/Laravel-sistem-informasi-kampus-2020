@extends('layout.layout')
@section('title')
    index ruangan
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-6">
            <a href="{{route('ruangan.create')}}" class="btn btn-primary">Add</a>
        </div>
        <div class="col-sm-3 offset-3">
            <form action="{{route('ruangan.index')}}" class="form-inline" method="GET">
                <input type="text" name="search" class="form-control">
                <button type="submit" class="btn btn-primary">Cari</button>
            </form>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ruangans as $ruangan)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$ruangan->nama}}</td>
                    <td>
                        <a href="{{route('ruangan.edit', $ruangan->id)}}" class="btn btn-success btn-sm">edit</a>
                        <form style="display:inline" action="{{route('ruangan.destroy', $ruangan->id)}}" method="post">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger btn-sm">delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$ruangans->links()}}
@endsection
