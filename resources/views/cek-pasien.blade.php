@extends('layouts.main')

@section('container')
<h1 class="text-6xl font-bold text-center font-serif">PASIEN ANDA <br> HARI INI</h1>

<!-- Blur Background -->
<div>
    <div class="rounded-full bg-[#183e9f] w-[700px] h-[700px] blur-2xl -mt-[300px] -ml-[400px] opacity-80">
    </div>
</div>

<div class="relative rounded-3xl overflow-hidden shadow-2xl mx-20 -mt-[200px]">
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
            <tr class="bg-blue-500 ">
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                    <h1 class="text-3xl text-white ">Michael Anderson</h1>
                </td>
                <td class="px-6 py-4">
                    <h1 class="text-3xl text-white">Demam tinggi selama tiga hari, disertai sakit kepala dan nyeri otot
                    </h1>
                </td>
                <td class="px-6 py-4">
                    <h1 class="text-3xl text-white">Antrian ke-10</h1>
                </td>
            </tr>
            <tr class="bg-blue-500 ">
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    <h1 class="text-3xl text-white">Sarah Williams</h1>
                </td>
                <td class="px-6 py-4">
                    <h1 class="text-3xl text-white">Batuk kering lebih dari dua minggu, terkadang sulit bernapas.</h1>
                </td>
                <td class="px-6 py-4">
                    <h1 class="text-3xl text-white">Antrian ke-11</h1>
                </td>
            </tr>
            <tr class="bg-blue-500">
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    <h1 class="text-3xl text-white">James Taylor</h1>
                </td>
                <td class="px-6 py-4">
                    <h1 class="text-3xl text-white">Nyeri di punggung bawah, terutama saat berdiri terlalu lama.</h1>
                </td>
                <td class="px-6 py-4">
                    <h1 class="text-3xl text-white">Antrian ke-12</h1>
                </td>
            </tr>
            <tr class="bg-blue-500">
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    <h1 class="text-3xl text-white">Emily Carter</h1>
                </td>
                <td class="px-6 py-4">
                    <h1 class="text-3xl text-white">Ruam merah di kulit tangan yang terasa gatal, muncul sejak dua hari
                        lalu.</h1>
                </td>
                <td class="px-6 py-4">
                    <h1 class="text-3xl text-white">Antrian ke-13</h1>
                </td>
            </tr>
            <tr class="bg-blue-500">
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    <h1 class="text-3xl text-white">Daniel Foster</h1>
                </td>
                <td class="px-6 py-4">
                    <h1 class="text-3xl text-white">Rasa mual setelah makan dan perut kembung selama seminggu.</h1>
                </td>
                <td class="px-6 py-4">
                    <h1 class="text-3xl text-white">Antrian ke-14</h1>
                </td>
            </tr>
        </tbody>
    </table>
</div>


<!-- Blur Background -->
<div class="relative overflow-x-clip">
    <div
        class="relative rounded-full bg-[#183e9f] w-[700px] h-[700px] blur-2xl -mt-[400px] ml-[1600px] -z-[100] opacity-80">
    </div>
</div>

<div class="flex justify-around mt-[300px]">
    <img src="{{ asset('assets/2-4.png') }}" alt="">
    <img src="{{ asset('assets/2-4.png') }}" alt="">
    <img src="{{ asset('assets/2-4.png') }}" alt="">
    <img src="{{ asset('assets/2-4.png') }}" alt="">
</div>

@endsection