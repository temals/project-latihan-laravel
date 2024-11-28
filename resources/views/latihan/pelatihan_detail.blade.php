@extends('layouts.appbs')

@section('content-title')
<div><h1>{{ $course->name }}</h1></div>
@endsection

@section('content')
    
    <p class="fs-5 col-md-8">{{ $course->description }}</p>

    <div class="mb-5"> 
      <a href="{{ route('course.join', ['id' => $course->id]) }}" class="btn btn-primary btn-lg px-4">Ikuti Pelatihan</a>
    </div>

    <hr class="col-3 col-md-2 mb-5">

    <div class="row g-5">
      <div class="col-md-6">
        <h2>Silabus</h2>
        <p>Ready to beyond the starter template? Check out these open source projects that you can quickly duplicate to a new GitHub repository.</p>
        <ul class="icon-list">
          <li>Belajar dasar 1</li>
          <li>Belajar dasar 2</li>
          <li>Ujian</li>
        </ul>
      </div>

      <div class="col-md-6">
        <h2>Peserta yang sudah terdaftar</h2>
        <p>Read more detailed instructions and documentation on using or contributing to Bootstrap.</p>
        <ul class="icon-list">
          @if(!$course->users->isEmpty())
          @foreach($course->users as $user)
          <li>{{ $user->name }}</li>
          @endforeach 
          @else
          <li>Belum ada yang mengikuti pelatihan</li> 
          @endif 
        </ul>
      </div>
    </div>
@endsection