@extends('dashboard.layouts.main')

@section('body')

<h1 class="text-3xl text-black ">Hallo, {{ auth()->user()->nama }}</h1>
<div
    class="container max-w-[400px] max-w-h-[400px] mt-5 p-5 shadow-[0_35px_60px_-15px_rgba(0,0,0,0.4)] bg-white rounded-xl group hover:bg-blue-800 hover:shadow-[0_35px_60px_-15px_rgba(0,0,0,0.9)] transition ease-in-out duration-700">
    <svg class="inline-block group-hover:text-white w-24 h-24 text-blue-800 transition ease-in-out duration-700"
        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M5 19V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v13H7a2 2 0 0 0-2 2Zm0 0a2 2 0 0 0 2 2h12M9 3v14m7 0v4" />
    </svg>
    <h1
        class="relative mt-[-90px] ml-[100px] text-xl text-gray-400 font-bold group-hover:text-white transition ease-in-out duration-700 mt-[-2px]">
        Total Keluhan Anda</h1>
    <div style="relative margin-top:-50px;">
        <h1 class="text-[30px] text-center text-black font-bold group-hover:text-white transition ease-in-out duration-700 mt-[-2px]"
            style="margin-top:10px">
            5 keluhan</h1>
    </div>
</div>


@endsection