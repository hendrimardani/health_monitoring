@extends('dashboard.layouts.main')

@section('body')

<h1
    class="inline-block p-5 text-3xl text-black rounded-xl shadow-[0_35px_60px_-15px_rgba(0,0,0,0.4)] hover:shadow-[0_35px_60px_-15px_rgba(0,0,0,1)] bg-white transition ease-in-out duration-700 mt-5 hover:text-white hover:bg-blue-800">
    Hallo, {{ auth()->user()->nama }}, semoga harimu menyenangkan dan tetap sehat !</h1>
<div class="container flex flex-wrap justify-start gap-12">
    <div
        class="max-w-[500px] max-w-h-[400px] mt-5 p-5 shadow-[0_35px_60px_-15px_rgba(0,0,0,0.4)] bg-white rounded-xl group hover:bg-blue-800 hover:shadow-[0_35px_60px_-15px_rgba(0,0,0,0.9)] transition ease-in-out duration-700">
        <svg class="inline-block group-hover:text-white w-24 h-24 text-blue-800 transition ease-in-out duration-700"
            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
            viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M5 19V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v13H7a2 2 0 0 0-2 2Zm0 0a2 2 0 0 0 2 2h12M9 3v14m7 0v4" />
        </svg>
        <h1
            class="relative mt-[-90px] ml-[100px] text-xl text-gray-400 font-bold group-hover:text-white transition ease-in-out duration-700 mt-[-2px]">
            Total Keluhan Anda</h1>
        <div style="relative margin-top:-50px;">
            <h1 class="text-[30px] text-center text-black font-bold group-hover:text-white transition ease-in-out duration-700 mt-[-2px]"
                style="margin-top:10px; margin-left:50px;">
                {{ $jumlahKeluhan }} keluhan</h1>
        </div>
    </div>
    <div
        class="max-w-[500px] max-w-h-[400px] mt-5 p-5 shadow-[0_35px_60px_-15px_rgba(0,0,0,0.4)] bg-white rounded-xl group hover:bg-blue-800 hover:shadow-[0_35px_60px_-15px_rgba(0,0,0,0.9)] transition ease-in-out duration-700">
        <svg class="inline-block group-hover:text-white w-24 h-24 text-blue-800 transition ease-in-out duration-700"
            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
            viewBox="0 0 24 24">
            <path fill-rule="evenodd"
                d="M5 9a7 7 0 1 1 8 6.93V21a1 1 0 1 1-2 0v-5.07A7.001 7.001 0 0 1 5 9Zm5.94-1.06A1.5 1.5 0 0 1 12 7.5a1 1 0 1 0 0-2A3.5 3.5 0 0 0 8.5 9a1 1 0 0 0 2 0c0-.398.158-.78.44-1.06Z"
                clip-rule="evenodd" />
        </svg>
        <h1
            class="relative mt-[-90px] ml-[100px] text-xl text-gray-400 font-bold group-hover:text-white transition ease-in-out duration-700 mt-[-2px]">
            Total Status Keluhan Anda</h1>
        <div class="flex flex-wrap gap-2 justify-center mt-[10px] ml-[50px]">
            <svg class="group-hover:text-white w-6 h-6 text-orange-500 transition ease-in-out duration-700"
                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 9a3 3 0 0 1 3-3m-2 15h4m0-3c0-4.1 4-4.9 4-9A6 6 0 1 0 6 9c0 4 4 5 4 9h4Z" />
            </svg>
            <h1
                class="text-xl text-center text-orange-500 font-bold group-hover:text-white transition ease-in-out duration-700 mt-[-2px]">
                {{ $jumlahKeluhanMenunggu }} menunggu</h1>
        </div>
        <div class="flex flex-wrap gap-2 justify-center mt-[10px] ml-[15px]">
            <svg class="group-hover:text-white w-6 h-6 text-green-500 transition ease-in-out duration-700"
                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            <h1
                class="text-xl text-center text-green-500 font-bold group-hover:text-white transition ease-in-out duration-700 mt-[-2px]">
                {{ $jumlahKeluhanSelesai }} selesai</h1>
        </div>
    </div>
    <div
        class="max-w-[500px] max-h-[400px] mt-5 p-5 shadow-[0_35px_60px_-15px_rgba(0,0,0,0.4)] bg-white rounded-xl group hover:bg-blue-800 hover:shadow-[0_35px_60px_-15px_rgba(0,0,0,0.9)] transition ease-in-out duration-700">
        <svg class="inline-block group-hover:text-white w-24 h-24 text-blue-800 transition ease-in-out duration-700"
            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
            viewBox="0 0 24 24">
            <path fill-rule="evenodd"
                d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z"
                clip-rule="evenodd" />
        </svg>
        <h1
            class="relative mt-[-90px] ml-[100px] text-xl text-gray-400 font-bold group-hover:text-white transition ease-in-out duration-700 mt-[-2px]">
            Keluhan Terakhir Anda</h1>
        <div style="relative margin-top:-50px;">
            <h1 class="text-[30px] text-center text-black font-bold group-hover:text-white transition ease-in-out duration-700 mt-[-2px]"
                style="margin-top:10px; margin-left:100px;">
                {{ $tanggalLatest }}</h1>
        </div>
    </div>
</div>


@endsection