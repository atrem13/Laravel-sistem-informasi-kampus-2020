@extends('layout.template')
@section('header')
<div class="card-header">
    <p class="card-title">
        <a href="{{route('khs.index')}}" class="btn btn-sm mr-3 btn-secondary"><span class="fa fa-arrow-left"></span></a>
        Detail KHS
    </p>
</div>
@endsection
@section('table')
<div class="row">
    <div class="col-sm-8 offset-2">
      
    </div>
</div>
    
    <table class="table-striped table">
        <thead>
            <tr>
                <th>No</th>
                <th>Matakuliah</th>
                <th>Dosen Pengajar</th>
                <th>Semester</th>
                <th>Grade</th>
                <th>Nilai</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($khsDetails as $khsDetail)
            <?php
                    $nilai = $khsDetail->nilai;
                    $grade = 'F';
                    if($nilai <50){
                        $grade = 'F';
                    }else if($nilai < 60){
                        $grade = 'E';
                    }else if($nilai < 70){
                        $grade = 'D';
                    }else if($nilai < 80){
                        $grade = 'C';
                    }else if($nilai <90){
                        $grade = 'B';
                    }else if($nilai <=100){
                        $grade = 'A';
                    }else{
                        $grade = 'F';
                    }
            ?>
            <tr>
                <form method="post" action="{{route('khs.updateDetail', $khsDetail->id)}}">
                    @csrf
                    @method("PUT")
                    <td>{{$no++}}</td>
                    <td>{{$khsDetail->krsDetail['jadwalKuliah']['matakuliah']['nama']}}</td>
                    <td>{{$khsDetail->krsDetail['jadwalKuliah']['dosen']['nama']}}</td>
                    <td>{{$khsDetail->krsDetail['jadwalKuliah']['semester']}}</td>
                    <td>{{$grade}}</td>
                    <td><input type="number" style="width:70px;" name="nilai" class="form-control" value="{{$khsDetail->nilai}}"></td>
                    <td>
                        <input type="hidden" name="khs_id" value="{{$khsDetail->khs_id}}">
                        <button type="submit" class="btn btn-success">update detail</button>
                    </td>
                </form>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
