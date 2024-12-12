@extends('layouts.main')

@section('container')
<div>
  <!-- Blur Background -->
  <div>
    <div class="rounded-full bg-[#183e9f] w-[700px] h-[700px] blur-2xl -mt-[50px] -ml-[200px] opacity-80">
    </div>
  </div>
  <!-- Blur Background -->
  <div>
    <div class="rounded-full bg-[#183e9f] w-[700px] h-[700px] blur-2xl -mt-[300px] ml-[200px] opacity-80">
    </div>
  </div>
  <!-- Blur Background -->
  <div>
    <div class="rounded-full bg-[#183e9f] w-[700px] h-[700px] blur-2xl -mt-[1000px] ml-[1100px] opacity-80">
    </div>
  </div>
  <!-- Blur Background -->
  <div class="overflow-x-clip">
    <div class="rounded-full bg-[#183e9f] w-[700px] h-[700px] blur-2xl -mt-[400px] ml-[1300px] opacity-80">
    </div>
  </div>
</div>

<div class="relative">
  <h1 class="text-8xl font-bold text-center -mt-[700px]">HALLO, Pasien!</h1>
  <h1 class="text-3xl font-bold text-center">Siap memulai hari
    ini ?</h1>
</div>

<div class="relative overflow-x-clip">
  <img src="{{ asset('assets/tanya-(1)-1.png') }}" alt="" class="ml-[300px] -mt-[500px]">
  <img src="{{ asset('assets/tanya-(1)-2.png') }}" alt="">
  <img src="{{ asset('assets/tanya-(1)-3.png') }}" alt="" class="mt-[300px] ml-[200px]">
  <img src="{{ asset('assets/tanya-(1)-4.png') }}" alt="" class="-mt-[700px] ml-[1300px]">
  <img src="{{ asset('assets/tanya-(1)-5.png') }}" alt="" class="mt-[200px] ml-[1400px]">
  <img src="{{ asset('assets/tanya-(1)-6.png') }}" alt="" class="ml-[1000px]">
</div>

<!-- Blur Background -->
<div class="overflow-x-clip">
  <div class="rounded-full bg-[#183e9f] w-[700px] h-[700px] blur-2xl -ml-[250px] mt-[400px] opacity-80">
  </div>
</div>

<div class="text-center -mt-[500px]">
  <h1 class="text-8xl font-bold">Sudah Lebih Dari</h1>
  <h1 class="text-8xl font-bold">1.000.0000++</h1>
  <h1 class="text-8xl font-bold">Pengguna<br>Mempercayai Kami</h1>
</div>

<!-- Blur Background -->
<div class="overflow-x-clip">
  <div class="rounded-full bg-[#183e9f] w-[700px] h-[700px] blur-2xl -ml-[250px] opacity-80">
  </div>
</div>

<!-- Blur Background -->
<div class="overflow-x-clip">
  <div class="rounded-full bg-[#183e9f] w-[700px] h-[700px] blur-2xl ml-[1400px] -mt-[900px] opacity-80">
  </div>
</div>

<div class="flex justify-around mt-[200px] mb-[300px]">
  <img src="{{ asset('assets/2-4.png') }}" alt="">
  <img src="{{ asset('assets/2-4.png') }}" alt="">
  <img src="{{ asset('assets/2-4.png') }}" alt="">
  <img src="{{ asset('assets/2-4.png') }}" alt="">
</div>

<div>
  <div class="bg-[#183e9f] h-[400px] rounded-3xl blur-sm"></div>
  <div class="flex justify-center">
    <h1 class="relative text-7xl text-white w-[700px] -mt-[400px]">Waktunya berubah, jaga kesehatan dengan konsultasi
      mudah bersama iHeal+h!</h1>
    <img src="{{ asset('assets/tanya-1.png') }}" alt="" class="relative -mt-[610px] h-[600px]">
  </div>
</div>

<div class="mt-[200px]">
  <h1 class="text-6xl text-black text-center font-bold">Konsultasi Mudah,</h1><br>
  <h1 class="text-6xl text-black text-center font-bold">Kesehatan Terjaga dengan</h1>
  <img src="{{ asset('assets/2-4.png') }}" alt="" class="mx-auto">
</div>

@endsection