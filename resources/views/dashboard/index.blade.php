@extends('layout.template')
@section('table')
@if (session()->has('message'))
    <div class="alert alert-danger">
        <p>{{session('message')}}</p>
    </div>
@endif
<div class="col-sm-10 offset-1 mt-3">
    <div class="row">
        <div class="card-deck">
            @foreach ($datas as $data)
                <div class="col-sm-4 mb-3">
                    <div class="card">
                        <div class="card-body bg-primary">
                            <h4 class="text-center">{{$data['nama']}}</h4>
                        </div>
                        <div class="card-footer">
                            <h5 class="text-center">{{$data['jumlah']}}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
