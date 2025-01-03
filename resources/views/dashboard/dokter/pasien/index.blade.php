@extends('dashboard.layouts.main')
{{-- JQuery --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@section('body')
<h1 class="text-3xl text-black mt-2">Pasien Anda</h1>

@if (session()->has('success'))
<div id="alert-3"
    class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
    role="alert">
    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
        viewBox="0 0 20 20">
        <path
            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
    </svg>
    <span class="sr-only">Info</span>
    <div class="ms-3 text-sm font-medium">
        <strong>{{ session('success') }}</strong>
    </div>
    <button type="button"
        class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
        data-dismiss-target="#alert-3" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
    </button>
</div>
@endif

<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mt-5">
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
                Status
            </th>
            <th scope="col" class="px-6 py-3">
                Periksa
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pasiens as $pasien)
        <tr
            class="{{ $loop->iteration % 2 == 0 ? 'bg-gray-50' : 'bg-white' }} border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100">

            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $loop->iteration }}
            </th>
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $pasien->pasien->nama }}
            </th>
            <td class="px-6 py-4">
                {{ $pasien->pasien->nik }}
            </td>
            <td class="px-6 py-4">
                {{ $pasien->pasien->usia }}
            </td>
            <td class="px-6 py-4">
                {{ $pasien->pasien->jenis_kelamin }}
            </td>
            <td class="px-6 py-4">
                {{-- Ngambil dari entitas riwayat_penyakit --}}
                {{ $pasien->keluhan }}
            </td>
            <td class="px-6 py-4">
                @if ($pasien->status === 'selesai')
                {{-- Selesai --}}
                <div class="inline-flex items-center gap-1 border-green-500 border-2 p-2 rounded-lg">
                    <svg class="w-6 h-6 text-green-500 group-hover:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <span class="text-green-500">{{ $pasien->status }}</span>
                </div>
                @else
                {{-- Menunggu --}}
                <div class="inline-flex items-center gap-1 border-orange-500 border-2 p-2 rounded-lg">
                    <svg class="w-6 h-6 text-orange-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 9a3 3 0 0 1 3-3m-2 15h4m0-3c0-4.1 4-4.9 4-9A6 6 0 1 0 6 9c0 4 4 5 4 9h4Z" />
                    </svg>
                    <span class="text-orange-500">{{ $pasien->status }}</span>
                </div>
                @endif
            </td>
            <td class="px-6 py-4">
                @if ($pasien->status === 'selesai')
                <div class="flex flex-wrap justify-start gap-4">
                    <div class="inline-flex items-center gap-1 border-green-500 border-2 p-2 rounded-lg">
                        <svg class="w-6 h-6 text-green-500 group-hover:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <span class="text-green-500">Sudah diagnosa</span>
                    </div>
                    <button data-modal-target="show-detail-modal" data-modal-toggle="show-detail-modal"
                        onclick="showPemeriksaan({{ $pasien->pemeriksaan->id }}, {{ $pasien->pemeriksaan->pasien_id }}, {{ $pasien->pemeriksaan->dokter_id }})"
                        class="shadow-[0_35px_60px_-15px_rgba(0,0,0,0.4)] hover:shadow-[0_35px_60px_-15px_rgba(0,0,0,1)] text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5  dark:bg-blue-500 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Lihat</button>
                </div>
                @else
                <div
                    class="group inline-flex items-center gap-1 border-orange-500 border-2 p-2 rounded-lg hover:bg-orange-500 hover:text-white transition duration-700">
                    {{-- Fungsi dari '@json($pasien)' untuk mengirimkan data ke modal --}}
                    <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                        data-pasien='@json($pasien)' class="flex items-center gap-1">
                        <svg class="w-6 h-6 text-orange-500 group-hover:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <span class="text-orange-500 group-hover:text-white">Diagnosa</span>
                    </button>
                </div>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{-- Diagnosa Modal --}}
<!-- Main modal -->
<div id="authentication-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal Header -->
            <div class="flex items-center justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Diagnosa Pasien
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto"
                    data-modal-hide="authentication-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
            <!-- Modal Body -->
            <div class="p-4">
                <form action="/dashboard/dokter/pasien/diagnosa" method="post" id="modal-diagnosa-form"
                    class="modal-diagnosa-form mt-5">
                    @csrf
                    <!-- Step 1 -->
                    <div class="modal-step modal-step-1">
                        <!-- Hidden Inputs -->
                        <input type="hidden" name="id_pasien" id="id_pasien">
                        <input type="hidden" id="nama" name="nama" value="" required readonly />
                        <input type="hidden" id="nik" name="nik" value="" required readonly />
                        <input type="hidden" id="no_telepon" name="no_telepon" value="" required readonly />
                        <input type="hidden" id="usia" name="usia" value="" required readonly />
                        <input type="hidden" id="alamat" name="alamat" value="" required readonly />
                        <input type="hidden" name="id" id="id_riwayat_penyakit">

                        <!-- Jenis Kelamin -->
                        <div>
                            <select id="jenis_kelamin" name="jenis_kelamin"
                                class="mb-5 bg-gray-50 border border-blue-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                style="display: none;">
                                <option disabled selected>Jenis Kelamin</option>
                                <option value="laki-laki">laki-laki</option>
                                <option value="perempuan">perempuan</option>
                            </select>
                        </div>

                        <!-- Riwayat Penyakit & Status -->
                        <input type="hidden" id="status" name="status" value="selesai" required readonly />

                        <!-- Vital Signs -->
                        <div>
                            <label for="saturasi_oksigen"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Saturasi
                                Oksigen</label>
                            <input type="number" step="0.01" id="saturasi_oksigen"
                                class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Cnth: 70.5" name="saturasi_oksigen" required />
                        </div>
                        <div>
                            <label for="detak_jantung"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Detak
                                Jantung</label>
                            <input type="number" step="0.01" id="detak_jantung"
                                class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Cnth: 120" name="detak_jantung" required />
                        </div>
                        <div>
                            <label for="suhu_badan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Suhu
                                Badan</label>
                            <input type="number" step="0.01" id="suhu_badan"
                                class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Cnth: 37.5" name="suhu_badan" required />
                        </div>
                        <div>
                            <label for="berat_badan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Berat
                                Badan</label>
                            <input type="number" step="0.01" id="berat_badan"
                                class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Cnth: 160" name="berat_badan" required />
                        </div>
                        <div>
                            <label for="tekanan_darah_sistol"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tekanan Darah
                                Sistol</label>
                            <input type="number" step="0.01" id="tekanan_darah_sistol"
                                class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Cnth: 120" name="tekanan_darah_sistol" required />
                        </div>
                        <div>
                            <label for="tekanan_darah_diastol"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tekanan Darah
                                Diastol</label>
                            <input type="number" step="0.01" id="tekanan_darah_diastol"
                                class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Cnth: 120" name="tekanan_darah_diastol" required />
                        </div>
                        <div class="mt-2">
                            <label for="waktu_pengukuran"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Waktu
                                Pengukuran</label>
                            <input type="datetime-local" id="waktu_pengukuran"
                                class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                name="waktu_pengukuran" value="{{ now()->format('Y-m-d\TH:i:s') }}" autofocus required
                                readonly />

                        </div>
                        <!-- Tombol Lanjut -->
                        <div class="col-span-2 text-center">
                            <button type="button" id="next-step-1"
                                class="group w-full text-blue-500 cta-btn font-semibold mt-5 rounded-xl shadow-lg hover:shadow-xl hover:bg-blue-600 hover:text-white flex items-center justify-between p-[10px] transition ease-in-out duration-700 border border-blue-500">
                                Lanjut
                                <svg class="group-hover:text-white w-6 h-6 text-blue-500" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m9 5 7 7-7 7" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="modal-step modal-step-2 hidden">
                        <div class="mt-2">
                            <input type="hidden" id="dokter_id"
                                class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                name="dokter_id" autofocus required />
                        </div>
                        <div>
                            <label for="kode_icd"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode
                                ICD</label>
                            <input type="text" id="kode_icd"
                                class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                name="kode_icd" placeholder="Cnth: A001" required />
                        </div>
                        <div>
                            <label for="keluhan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keluhan
                                Pasien</label>
                            <input type="text" id="keluhan"
                                class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                name="keluhan" placeholder="Keluhan Pasien" required readonly />
                        </div>
                        <div>
                            <label for="catatan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Catatan</label>
                            <input type="text" id="catatan"
                                class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                name="catatan" placeholder="Catatan" required />
                        </div>
                        <div class="mt-2">
                            <label for="deskripsi"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                            <input type="text" id="deskripsi"
                                class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                name="deskripsi" placeholder="Deskripsi" autofocus required />
                        </div>
                        <div class="mt-2">
                            <label for="rekomendasi"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rekomendasi</label>
                            {{-- <input type="text" id="rekomendasi"
                                class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                name="rekomendasi" placeholder="Rekomendasi" autofocus required /> --}}
                            <textarea type="text" id="rekomendasi"
                                class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                name="rekomendasi"
                                placeholder="Cnt: Pasien disarankan istirahat dan melakukan konsultasi lagi dalam jangk 3 hari setelah pemeriksaan"
                                rows="4" cols="50" autofocus required></textarea>
                        </div>
                        <div class="mt-2">
                            <label for="waktu_pemeriksaan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Waktu
                                Pemeriksaan</label>
                            <input type="datetime-local" id="waktu_pemeriksaan"
                                class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                name="waktu_pemeriksaan" value="{{ now()->format('Y-m-d\TH:i:s') }}" autofocus required
                                readonly />
                        </div>
                        <div class="flex flex-wrap justify-between">
                            <!-- Tombol Kembali -->
                            <div class="mt-4">
                                <button type="button" id="back-to-step-1"
                                    class="group w-[150px] text-blue-500 cta-btn font-semibold rounded-xl shadow-lg hover:shadow-xl hover:bg-blue-600 hover:text-white flex items-center justify-between p-[10px] transition ease-in-out duration-700 border border-blue-500">
                                    <svg class="group-hover:text-white w-6 h-6 text-blue-500" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m15 19-7-7 7-7" />
                                    </svg>
                                    Kembali
                                </button>
                            </div>
                            <!-- Tombol Lanjut -->
                            <div class="mt-4">
                                <button type="button" id="next-step-2"
                                    class="group w-[150px] text-blue-500 cta-btn font-semibold rounded-xl shadow-lg hover:shadow-xl hover:bg-blue-600 hover:text-white flex items-center justify-between p-[10px] transition ease-in-out duration-700 border border-blue-500">
                                    Lanjut
                                    <svg class="group-hover:text-white w-6 h-6 text-blue-500" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m9 5 7 7-7 7" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="modal-step modal-step-3 hidden">
                        <input type="hidden" id="obat_id"
                            class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            name="obat_id" autofocus required />
                        <select id="nama_obat" name="nama_obat"
                            class="mb-5 bg-gray-50 border border-blue-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option disabled selected>Pilih Obat</option>
                            @foreach ($namaObats as $namaObat)
                            <option value="{{ $namaObat->nama_obat }}" data-id="{{ $namaObat->id }}">{{
                                $namaObat->nama_obat }}</option>
                            @endforeach
                        </select>
                        <select id="kategori_obat" name="kategori_obat"
                            class="mb-5 bg-gray-50 border border-blue-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option disabled selected>Kategori Obat</option>
                            @foreach ($kategoriObats as $kategoriObat)
                            <option value="{{ $kategoriObat->id }}">{{ $kategoriObat->nama_kategori }}
                            </option>
                            @endforeach
                        </select>
                        <select id="dosis_tersedia" name="dosis_tersedia"
                            class="mb-5 bg-gray-50 border border-blue-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option disabled selected>Dosis Obat</option>
                            <option value="100 mg">100 mg</option>
                            <option value="200 mg">200 mg</option>
                        </select>
                        <div class="mt-2">
                            <label for="unit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Unit
                                Obat</label>
                            <input type="number" id="unit"
                                class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                name="unit" placeholder="Unit Obat" autofocus required />
                        </div>
                        <select id="frekuensi" name="frekuensi"
                            class="mt-2 bg-gray-50 border border-blue-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option disabled selected>Frekuensi Obat</option>
                            <option value="setelah makan">Setelah Makan</option>
                            <option value="sebelum makan">Sebelum Makan</option>
                        </select>
                        <div class="mt-2">
                            <label for="durasi_hari"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Durasi Hari
                                Penggunaan Obat</label>
                            <input type="number" id="durasi_hari"
                                class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                name="durasi_hari" placeholder="Durasi hari penggunaan obat" autofocus required />
                        </div>
                        <div class="mt-2">
                            <label for="cara_penggunaan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cara
                                Penggunaan</label>
                            {{-- <input type="text" id="cara_penggunaan"
                                class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                name="cara_penggunaan" placeholder="Cara penggunaan" autofocus required /> --}}
                            <textarea type="text" id="cara_penggunaan"
                                class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                name="cara_penggunaan" placeholder="Cnt: 
1. Dikonsumsi secara oral (diminum) dengan segelas air.
2. Hindari penggunaan lebih dari 8 tablet dalam 24 jam." rows="4" cols="50" autofocus required></textarea>
                        </div>
                        <div class="flex flex-wrap justify-between">
                            <!-- Tombol Kembali -->
                            <div class="mt-4">
                                <button type="button" id="back-to-step-2"
                                    class="group w-[150px] text-blue-500 cta-btn font-semibold rounded-xl shadow-lg hover:shadow-xl hover:bg-blue-600 hover:text-white flex items-center justify-between p-[10px] transition ease-in-out duration-700 border border-blue-500">
                                    <svg class="group-hover:text-white w-6 h-6 text-blue-500" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m15 19-7-7 7-7" />
                                    </svg>
                                    Kembali
                                </button>
                            </div>
                            <!-- Tombol Diagnosa -->
                            <div class="col-span-2 text-center mt-4">
                                <button type="submit" id="diagnosa-submit"
                                    class="w-[150px] text-blue-500 cta-btn font-semibold rounded-xl shadow-lg hover:shadow-xl hover:bg-blue-600 hover:text-white flex items-center justify-center p-[10px] transition ease-in-out duration-700 border border-blue-500">
                                    Diagnosa
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Show Detail Modal --}}
<!-- Main modal -->
<div id="show-detail-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal Header -->
            <div class="flex items-center justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Pemeriksa
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto"
                    data-modal-hide="show-detail-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
            <!-- Modal Body -->
            <div class="p-4">
                <span class="text-xl">Nama Dokter</span>
                <span class="text-xl ml-[40px]">:</span>
                <span class="text-xl" id="nama-dokter">Hasil Dokter</span> <br>
                <span class="text-xl">Tanggal Periksa</span>
                <span class="text-xl ml-[18px]">:</span>
                <span class="text-xl" id="tanggal-periksa">Hasil Tanggal Periksa</span>
            </div>
        </div>
    </div>
</div>

<!-- Menampilkan navigasi paginasi -->
@if ($pasiens->hasPages())
<div class="pagination-container mt-4">
    <ul class="pagination flex justify-center items-center space-x-2">
        {{-- Previous Page Link --}}
        @if ($pasiens->onFirstPage())
        <li class="disabled px-3 py-1">Sebelum</li>
        @else
        <li>
            <a href="{{ $pasiens->previousPageUrl() }}" class="px-3 py-1">Sebelum</a>
        </li>
        @endif

        {{-- Pagination Links --}}
        @foreach ($pasiens->getUrlRange(1, $pasiens->lastPage()) as $page => $url)
        <li>
            <a href="{{ $url }}"
                class="{{ $page == $pasiens->currentPage() ? 'bg-blue-500 text-white px-3 py-1' : 'bg-white text-blue-500 px-3 py-1' }}">
                {{ $page }}
            </a>
        </li>
        @endforeach

        {{-- Next Page Link --}}
        @if ($pasiens->hasMorePages())
        <li>
            <a href="{{ $pasiens->nextPageUrl() }}" class="px-3 py-1">Sesudah</a>
        </li>
        @else
        <li class="disabled px-3 py-1">Sesudah</li>
        @endif
    </ul>
</div>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function() {

    function fetchObat(modalForm, obatIdInput, kategoriId, namaObat, dosis) {
        $.ajax({
            url: '/cari-obat-json/' + kategoriId + '/' + namaObat + '/' + dosis,  // Mengirimkan data ke URL
            type: 'GET',
            success: function(response) {
                console.log(response.obats[0]); // Debug
                if (response.success) {
                    obatIdInput.value = response.obats[0].id;
                    // modalForm.action = '/dashboard/dokter/pasien/diagnosa';
                } else {
                    alert("Error euy: " + response.message);  // Jika tidak ada data, tampilkan pesan
                }
            },
            error: function(xhr, status, error) {
                alert("Terjadi kesalahan: " + error);
            }
        });
    }
        const diagnosaButtons = document.querySelectorAll('button[data-pasien]');
        const modalForm = document.getElementById('modal-diagnosa-form');
        const step1 = document.querySelector('.modal-step-1');
        const step2 = document.querySelector('.modal-step-2');
        const step3 = document.querySelector('.modal-step-3');
        const nextStep1Button = document.getElementById('next-step-1');
        const nextStep2Button = document.getElementById('next-step-2');
        const diagnosaSubmit = document.getElementById('diagnosa-submit');
        const backToStep1Button = document.getElementById('back-to-step-1');
        const backToStep2Button = document.getElementById('back-to-step-2');

        // Mendapatkan elemen select dan input hidden
        const namaObatSelect = document.getElementById('nama_obat');
        const obatIdInput = document.getElementById('obat_id');

        document.getElementById('kategori_obat').addEventListener('change', function() {
            const kategoriId = this.value;
            const namaObat = document.getElementById('nama_obat').value;
            const dosis = document.getElementById('dosis_tersedia').value

            // Panggil fungsi fetchObat
            fetchObat(modalForm, obatIdInput, kategoriId, namaObat, dosis);
        });

        document.getElementById('nama_obat').addEventListener('change', function() {
            const kategoriId = document.getElementById('kategori_obat').value;
            const namaObat = this.value;
            const dosis = document.getElementById('dosis_tersedia').value

            // Panggil fungsi fetchObat
            fetchObat(modalForm, obatIdInput, kategoriId, namaObat, dosis);
        });

        document.getElementById('dosis_tersedia').addEventListener('change', function() {
            const kategoriId = document.getElementById('kategori_obat').value;
            const namaObat = document.getElementById('nama_obat').value;
            const dosis = this.value; // Ambil nilai dosis yang dipilih

            // Panggil fungsi fetchObat
            fetchObat(modalForm, obatIdInput, kategoriId, namaObat, dosis);
        });

        diagnosaButtons.forEach(button => {
        button.addEventListener('click', function() {
            const pasienData = JSON.parse(this.getAttribute('data-pasien'));
            console.log('DATA TERTANGKAP : ' + pasienData);

            document.getElementById('id_pasien').value = pasienData.pasien.id_pasien;
            document.getElementById('nama').value = pasienData.pasien.nama;
            document.getElementById('nik').value = pasienData.pasien.nik;
            document.getElementById('no_telepon').value = pasienData.pasien.no_telepon;
            document.getElementById('alamat').value = pasienData.pasien.alamat;    
            document.getElementById('usia').value = pasienData.pasien.usia;
            document.getElementById('jenis_kelamin').value = pasienData.pasien.jenis_kelamin;
            document.getElementById('keluhan').value = pasienData.keluhan;
            document.getElementById('id_riwayat_penyakit').value = pasienData.id;

            // Reset step visibility
            step1.classList.remove('hidden');
            step2.classList.add('hidden');
            step3.classList.add('hidden');

            // Debug
            console.log(pasienData);
        });
        });

        nextStep1Button.addEventListener('click', function() {
        // Validasi input step1
        if (
            !document.getElementById('saturasi_oksigen').value || 
            !document.getElementById('detak_jantung').value || 
            !document.getElementById('suhu_badan').value || 
            !document.getElementById('berat_badan').value || 
            !document.getElementById('tekanan_darah_sistol').value || 
            !document.getElementById('tekanan_darah_diastol').value
        ) {
            alert('Data tidak boleh ada yang kosong!');
            return;
        }

        // Ubah visibilitas
        step1.classList.add('hidden');
        step2.classList.remove('hidden');
        step3.classList.add('hidden');
        });

        backToStep1Button.addEventListener('click', function() {
        step1.classList.remove('hidden');
        step2.classList.add('hidden');
        step3.classList.add('hidden');
        });

        nextStep2Button.addEventListener('click', function() {
        if (
            !document.getElementById('kode_icd').value ||
            !document.getElementById('catatan').value ||
            !document.getElementById('deskripsi').value ||
            !document.getElementById('rekomendasi').value
        ) {
            alert('Data tidak boleh ada yang kosong!');
            return;
        }

        // Ubah visibilitas
        step1.classList.add('hidden');
        step2.classList.add('hidden');
        step3.classList.remove('hidden');
        });

        backToStep2Button.addEventListener('click', function() {
        step1.classList.add('hidden');
        step2.classList.remove('hidden');
        step3.classList.add('hidden');
        });

        diagnosaSubmit.addEventListener('click', function() {
        if (
            !document.getElementById('nama_obat').value ||
            !document.getElementById('kategori').value ||
            !document.getElementById('dosis_tersedia').value ||
            !document.getElementById('unit').value ||
            !document.getElementById('frekuensi').value ||
            !document.getElementById('cara_penggunaan')
        ) {
            alert('Data tidak boleh ada yang kosong !');
            return;
        }
    });
});

function showPemeriksaan(idPemeriksaan, idPasien, idDokter) {
        // Debugging untuk memastikan parameter diterima dengan benar
        console.log("ID Pemeriksaan:", idPemeriksaan);
        console.log("ID Pasien:", idPasien);
        console.log("ID Dokter:", idDokter);
        $.ajax({
            url: '/dashboard/dokter/pasien/' + idPemeriksaan + '/' + idPasien + '/' + idDokter,  // Mengirimkan data ke URL
            type: 'GET',
            success: function(response) {
                // Debug
                console.log(response);
                if (response.success) {
                    document.getElementById('nama-dokter').innerHTML = response.pemeriksaan.dokter.nama_dokter;
                    document.getElementById('tanggal-periksa').innerHTML = response.pemeriksaan.waktu_pemeriksaan;
                } else {
                    alert("Error euy: " + response.message);  // Jika tidak ada data, tampilkan pesan
                }
            },
            error: function(xhr, status, error) {
                alert("Terjadi kesalahan: " + error);
            }
        });
    }
</script>


@endsection