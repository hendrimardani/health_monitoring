@extends('dashboard.layouts.main')

@section('body')

<h1 class="text-3xl text-black ">Hallo, {{ auth()->user()->nama }}</h1>

@endsection