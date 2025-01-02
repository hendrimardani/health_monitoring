@extends('dashboard.layouts.main')

@section('body')

<h1 class="text-3xl text-black ">Hallo, {{ auth()->user()->nama }}</h1>
<div class="container flex flex-wrap gap-6">
    <div
        class="max-w-[500px] max-w-h-[400px] mt-5 p-5 shadow-[0_35px_60px_-15px_rgba(0,0,0,0.4)] bg-white rounded-xl group hover:bg-blue-800 hover:shadow-[0_35px_60px_-15px_rgba(0,0,0,0.9)] transition ease-in-out duration-700">
        <svg class="inline-block group-hover:text-white w-24 h-24 text-blue-800 transition ease-in-out duration-700"
            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
            viewBox="0 0 24 24">
            <path fill-rule="evenodd"
                d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z"
                clip-rule="evenodd" />
        </svg>
        <h1
            class="relative mt-[-90px] ml-[100px] text-xl text-gray-400 font-bold group-hover:text-white transition ease-in-out duration-700 mt-[-2px]">
            Total Pasien</h1>
        <div style="relative margin-top:-50px;">
            <h1 class="text-[30px] text-center text-black font-bold group-hover:text-white transition ease-in-out duration-700 mt-[-2px]"
                style="margin-top:10px; margin-left:50px;">
                keluhan</h1>
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
            Total Status Pasien</h1>
        <div class="flex flex-wrap gap-2 justify-center mt-[10px] ml-[50px]">
            <svg class="group-hover:text-white w-6 h-6 text-orange-500 transition ease-in-out duration-700"
                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 9a3 3 0 0 1 3-3m-2 15h4m0-3c0-4.1 4-4.9 4-9A6 6 0 1 0 6 9c0 4 4 5 4 9h4Z" />
            </svg>
            <h1
                class="text-xl text-center text-orange-500 font-bold group-hover:text-white transition ease-in-out duration-700 mt-[-2px]">
                pasien menunggu</h1>
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
                pasien selesai</h1>
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
            Tanggal Terakhir Pekeriksaan</h1>
        <div style="relative margin-top:-50px;">
            <h1 class="text-[30px] text-center text-black font-bold group-hover:text-white transition ease-in-out duration-700 mt-[-2px]"
                style="margin-top:10px; margin-left:100px;">
            </h1>
        </div>
    </div>
    <div
        class="max-w-[500px] max-h-[400px] mt-5 p-5 shadow-[0_35px_60px_-15px_rgba(0,0,0,0.4)] bg-white rounded-xl group hover:bg-blue-800 hover:shadow-[0_35px_60px_-15px_rgba(0,0,0,0.9)] transition ease-in-out duration-700">
        <svg class="inline-block group-hover:text-white w-24 h-24 text-blue-800 transition ease-in-out duration-700"
            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
            viewBox="0 0 24 24">
            <path fill-rule="evenodd"
                d="M17.44 3a1 1 0 0 1 .707.293l2.56 2.56a1 1 0 0 1 0 1.414L18.194 9.78 14.22 5.806l2.513-2.513A1 1 0 0 1 17.44 3Zm-4.634 4.22-9.513 9.513a1 1 0 0 0 0 1.414l2.56 2.56a1 1 0 0 0 1.414 0l9.513-9.513-3.974-3.974ZM6 6a1 1 0 0 1 1 1v1h1a1 1 0 0 1 0 2H7v1a1 1 0 1 1-2 0v-1H4a1 1 0 0 1 0-2h1V7a1 1 0 0 1 1-1Zm9 9a1 1 0 0 1 1 1v1h1a1 1 0 1 1 0 2h-1v1a1 1 0 1 1-2 0v-1h-1a1 1 0 1 1 0-2h1v-1a1 1 0 0 1 1-1Z"
                clip-rule="evenodd" />
            <path d="M19 13h-2v2h2v-2ZM13 3h-2v2h2V3Zm-2 2H9v2h2V5ZM9 3H7v2h2V3Zm12 8h-2v2h2v-2Zm0 4h-2v2h2v-2Z" />
        </svg>
        <h1
            class="relative mt-[-90px] ml-[100px] text-xl text-gray-400 font-bold group-hover:text-white transition ease-in-out duration-700 mt-[-2px]">
            Total Pasien yang Anda Periksa</h1>
        <div style="relative margin-top:-50px;">
            <h1 class="text-[30px] text-center text-black font-bold group-hover:text-white transition ease-in-out duration-700 mt-[-2px]"
                style="margin-top:10px; margin-left:100px;">
                askdoaskdoaksos</h1>
        </div>
    </div>
</div>

@endsection