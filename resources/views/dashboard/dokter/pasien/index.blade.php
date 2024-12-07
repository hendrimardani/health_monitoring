@extends('dashboard.layouts.main')

@section('body')

<h1 class="text-3xl text-black mt-2">Pasien Anda</h1>

<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">
                No
            </th>
            <th scope="col" class="px-6 py-3">
                Nama Pasien
            </th>
            <th scope="col" class="px-6 py-3">
                NIK Pasien
            </th>
            <th scope="col" class="px-6 py-3">
                Usia Pasien
            </th>
            <th scope="col" class="px-6 py-3">
                Jenis Kelamin
            </th>
            <th scope="col" class="px-6 py-3">
                Riwayat Penyakit
            </th>
            <th scope="col" class="px-6 py-3">
                Periksa
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pemeriksaans as $pemeriksaan)
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $loop->iteration }}
            </th>
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $pemeriksaan->pasien->user->nama }}
            </th>
            <td class="px-6 py-4">
                {{ $pemeriksaan->pasien->nik }}
            </td>
            <td class="px-6 py-4">
                {{ $pemeriksaan->pasien->usia }}
            </td>
            <td class="px-6 py-4">
                {{ $pemeriksaan->pasien->jenis_kelamin }}
            </td>
            <td class="px-6 py-4">
                {{ $pemeriksaan->pasien->riwayat_penyakit }}
            </td>
            <td class="px-6 py-4">
                <div
                    class="group inline-flex items-center gap-1 border-orange-500 border-2 p-2 rounded-lg hover:bg-orange-500 hover:text-white transition duration-500">
                    <a href="{{ route('dokter.diagnosa.show', $pemeriksaan->pasien->id) }}"
                        class="flex items-center gap-1">
                        <svg class="w-6 h-6 text-orange-500 group-hover:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <span class="text-orange-500 group-hover:text-white">Diagnosa</span>
                    </a>
                </div>

            </td>

        </tr>
        @endforeach
    </tbody>
</table>
@endsection