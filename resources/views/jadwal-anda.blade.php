@extends('layouts.main')

@section('container')

<div>
    <h1 class="text-8xl font-sans text-center">JADWAL</h1>
    <h1 class="text-8xl font-sans text-center">PRAKTIK ANDA HARI INI</h1>
</div>

<div class="flex flex-wrap justify-center gap-20 mt-24 mb-[500px]">
    <div
        class="bg-[#183e9f] w-[500px] h-[500px] rounded-tl-[50px] rounded-br-[50px] shadow-2xl hover:bg-blue-500 hover:scale-[1.1] transition duration-300">
        <h1 class="text-6xl text-center text-white py-5">SENIN</h1>
        <hr>
        <h1 class="text-5xl text-center text-white my-5">08:00 - 12:00 WIB</h1>
        <h1 class="text-5xl text-center text-white my-5">14:00 - 18:00 WIB</h1>
    </div>
    <div
        class="bg-[#183e9f] w-[500px] h-[500px] rounded-tl-[50px] rounded-br-[50px] shadow-2xl hover:bg-blue-500 hover:scale-[1.1] transition duration-300">
        <h1 class="text-6xl text-center text-white py-5">SELASA</h1>
        <hr>
        <h1 class="text-5xl text-center text-white my-5">08:00 - 12:00 WIB</h1>
        <h1 class="text-5xl text-center text-white my-5">14:00 - 18:00 WIB</h1>
    </div>
    <div
        class="bg-[#183e9f] w-[500px] h-[500px] rounded-tl-[50px] rounded-br-[50px] shadow-2xl hover:bg-blue-500 hover:scale-[1.1] transition duration-300">
        <h1 class="text-6xl text-center text-white py-5">RABU</h1>
        <hr>
        <h1 class="text-5xl text-center text-white my-5">08:00 - 12:00 WIB</h1>
        <h1 class="text-5xl text-center text-white my-5">14:00 - 18:00 WIB</h1>
    </div>
    <div
        class="bg-[#183e9f] w-[500px] h-[500px] rounded-tl-[50px] rounded-br-[50px] shadow-2xl hover:bg-blue-500 hover:scale-[1.1] transition duration-300">
        <h1 class="text-6xl text-center text-white py-5">KAMIS</h1>
        <hr>
        <h1 class="text-5xl text-center text-white my-5">08:00 - 12:00 WIB</h1>
        <h1 class="text-5xl text-center text-white my-5">14:00 - 18:00 WIB</h1>
    </div>
    <div
        class="bg-[#183e9f] w-[500px] h-[500px] rounded-tl-[50px] rounded-br-[50px] shadow-2xl hover:bg-blue-500 hover:scale-[1.1] transition duration-300">
        <h1 class="text-6xl text-center text-white py-5">JUM'AT</h1>
        <hr>
        <h1 class="text-5xl text-center text-white my-5">08:00 - 12:00 WIB</h1>
        <h1 class="text-5xl text-center text-white my-5">14:00 - 18:00 WIB</h1>
    </div>
    <div
        class="bg-[#183e9f] w-[500px] h-[500px] rounded-tl-[50px] rounded-br-[50px] shadow-2xl hover:bg-blue-500 hover:scale-[1.1] transition duration-300">
        <h1 class="text-6xl text-center text-white py-5">SABTU</h1>
        <hr>
        <h1 class="text-5xl text-center text-white my-5">09:00 - 13:00 WIB</h1>
    </div>
    <div
        class="bg-[#183e9f] w-[500px] h-[500px] rounded-tl-[50px] rounded-br-[50px] shadow-2xl hover:bg-blue-500 hover:scale-[1.1] transition duration-300">
        <h1 class="text-6xl text-center text-white py-5">MINGGU</h1>
        <hr>
        <h1 class="text-5xl text-center text-white my-5">09:00 - 13:00 WIB</h1>
    </div>
</div>

<!-- Blur Background -->
<div class="overflow-x-clip">
    <div
        class="relative rounded-full bg-[#183e9f] w-[700px] h-[700px] blur-2xl opacity-80 -mt-[2300px] -ml-[200px] -z-10">
    </div>
</div>

<!-- Blur Background -->
<div class="overflow-x-clip">
    <div
        class="relative rounded-full bg-[#183e9f] w-[700px] h-[700px] blur-2xl opacity-80 -mt-[700px] ml-[1400px] -z-10">
    </div>
</div>

<!-- Blur Background -->
<div class="overflow-x-clip">
    <div
        class="relative rounded-full bg-[#183e9f] w-[700px] h-[700px] blur-2xl opacity-80 mt-[300px] ml-[1400px] -z-10">
    </div>
</div>

<!-- Blur Background -->
<div class="overflow-x-clip">
    <div
        class="relative rounded-full bg-[#183e9f] w-[700px] h-[700px] blur-2xl opacity-80 -mt-[800px] -ml-[200px] -z-10">
    </div>
</div>

@endsection