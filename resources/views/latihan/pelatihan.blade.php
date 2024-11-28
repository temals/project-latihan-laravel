@extends('layouts.appbs')

@section('content-title')
<div><h2>Daftar Pelatihan</h2></div>
@endsection

@section('content')
<div class="table-responsive">
<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Nama Pelatihan</th>
        <th scope="col">Trainer</th>
        <th scope="col">Lama Pelatihan</th>
        <th scope="col">Tanggal</th>
        <th scope="col">&nbsp;</th>
    </tr>
    </thead>
    <tbody>
        @if(!empty($courses))
        @foreach($courses as $course)
    <tr>
        <td>{{$loop->index + 1}}</td>
        <td>{{$course->name}}</td>
        <td>-</td>
        <td>{{$course->days}} Hari</td>
        <td>{{$course->start}}</td>
        <td><a href="/pelatihan/detail" class="btn btn-primary">Detail</a></td>
    </tr>
    @endforeach
    @endif
    </tbody>
</table>
@endsection