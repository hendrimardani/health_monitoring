@extends('dashboard.layouts.main')

@section('body')
<h1 class="text-3xl text-black ">Pasien Anda:</h1>

@foreach ($pemeriksaans as $pemeriksaan)
<h1>{{ $pemeriksaan->pasien->nama_pasien }}</h1>
@endforeach
@endsection