@extends('layouts.main')

@section('container')
<h1 class="text-6xl font-bold text-center font-serif" data-aos="fade-up" data-aos-duration="3000">PASIEN ANDA <br>
    HARI INI</h1>

<!-- Blur Background -->
<div>
    <div class="rounded-full bg-[#183e9f] w-[700px] h-[700px] blur-2xl -mt-[300px] -ml-[400px] opacity-80"
        data-aos="fade-right" data-aos-duration="3000">
    </div>
</div>

<div class="relative rounded-3xl overflow-hidden shadow-2xl mx-20 -mt-[200px]" data-aos="flip-left"
    data-aos-duration="3000">
    <table class="w-full text-sm text-left rtl:text-right">
        <thead class="text-xs text-white bg-[#183e9f]">
            <tr class="bg-[#183e9f]">
                <th scope="col" class="px-6 py-3">
                    <h1 class="text-4xl">Nama</h1>
                </th>
                <th scope="col" class="px-6 py-3 hover:bg-slate-700">
                    <h1 class="text-4xl">Keluhan Pasien</h1>
                </th>
                <th scope="col" class="px-6 py-3">
                    <h1 class="text-4xl">Antrian Pasien</h1>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pasiens as $pasien)
            <tr class="bg-blue-500 ">
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                    <h1 class="text-3xl text-white ">{{ $pasien->pasien->nama }}</h1>
                </td>
                <td class="px-6 py-4">
                    <h1 class="text-3xl text-white">{{ $pasien->keluhan }}
                    </h1>
                </td>
                <td class="px-6 py-4">
                    <h1 class="text-3xl text-white">Antrian Ke- {{ $pasien->antrian }}</h1>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


<!-- Blur Background -->
<div class="relative overflow-x-clip">
    <div class="relative rounded-full bg-[#183e9f] w-[700px] h-[700px] blur-2xl -mt-[200px] ml-[1600px] -z-[100] opacity-80"
        data-aos="fade-down" data-aos-duration="3000">
    </div>
</div>

<div class="flex justify-around mt-[300px]" data-aos="zoom-in-left" data-aos-duration="3000">
    <img src="{{ asset('assets/2-4.png') }}" alt="">
    <img src="{{ asset('assets/2-4.png') }}" alt="">
    <img src="{{ asset('assets/2-4.png') }}" alt="">
    <img src="{{ asset('assets/2-4.png') }}" alt="">
</div>

<script>
    // AOS Init
document.addEventListener('DOMContentLoaded', () => {
  AOS.init();
});
</script>
@endsection