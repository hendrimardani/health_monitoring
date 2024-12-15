@extends('dashboard.layouts.main')

@section('body')

{{-- @if ($pasien->status === 'selesai') --}}
{{-- Modal Toggled --}}
<div class="flex flex-wrap justify-start gap-4">
    <div>
        <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
            class="w-[200px] text-blue-500 cta-btn font-semibold mt-5 rounded-xl shadow-lg hover:shadow-xl hover:bg-blue-600 hover:text-white flex items-center justify-center p-[10px] transition ease-in-out duration-500">
            <i class="fas fa-plus mr-[10px]"></i>Tambah Keluhan
        </button>
    </div>
    <div>
        <a href="{{ route('export-riwayat-pdf') }}"
            class="group w-[200px] text-blue-500 cta-btn font-semibold mt-5 rounded-xl shadow-lg hover:shadow-xl hover:bg-blue-600 hover:text-white flex items-center justify-center p-[10px] transition ease-in-out duration-500">
            <svg class="w-6 h-6 text-blue-500 group-hover:text-white mr-2" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                    d="M16.444 18H19a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h2.556M17 11V5a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1v6h10ZM7 15h10v4a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1v-4Z" />
            </svg>
            Cetak Riwayat
        </a>
    </div>
</div>
{{-- @endif --}}

<!-- Main modal -->
<div id="authentication-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Tambah Riwayat
                </h3>
                <button type="button"
                    class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="authentication-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <form action="/dashboard/pasien/riwayat" method="post">
                    @csrf
                    <div class="mb-5">
                        <input type="hidden" id="nama"
                            class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Nama Anda" name="nama" value="{{ $pasien->pasien->user->nama }}" autofocus
                            required />
                    </div>
                    @error('nama')
                    <div>
                        <div class="relative">
                            <input type="hidden" id="outlined_error" aria-describedby="outlined_error_help"
                                class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 appearance-none dark:text-white dark:border-red-500 border-red-600 dark:focus:border-red-500 focus:outline-none focus:ring-0 focus:border-red-600 peer"
                                placeholder=" " />
                        </div>
                        <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                class="font-medium">{{
                                $message }}</span></p>
                    </div>
                    @enderror
                    <div class="mb-5">
                        <input type="hidden" id="email_pasien"
                            class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Email Anda" name="email_pasien" value="{{ $pasien->pasien->user->email }}"
                            autofocus required />
                    </div>
                    @error('email_pasien')
                    <div>
                        <div class="relative">
                            <input type="hidden" id="outlined_error" aria-describedby="outlined_error_help"
                                class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 appearance-none dark:text-white dark:border-red-500 border-red-600 dark:focus:border-red-500 focus:outline-none focus:ring-0 focus:border-red-600 peer"
                                placeholder=" " />
                        </div>
                        <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                class="font-medium">{{
                                $message }}</span></p>
                    </div>
                    @enderror
                    <div class="mb-5">
                        <input type="hidden" id="password"
                            class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder=" Password Anda" name="password" value="{{ $pasien->pasien->user->password }}"
                            autofocus required />
                    </div>
                    @error('password')
                    <div>
                        <div class="relative">
                            <input type="hidden" id="outlined_error" aria-describedby="outlined_error_help"
                                class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 appearance-none dark:text-white dark:border-red-500 border-red-600 dark:focus:border-red-500 focus:outline-none focus:ring-0 focus:border-red-600 peer"
                                placeholder=" " />
                        </div>
                        <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                class="font-medium">{{
                                $message }}</span></p>
                    </div>
                    @enderror
                    <div class="mb-5">
                        <input type="hidden" id="nik"
                            class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="NIK Anda" name="nik" value="{{ $pasien->pasien->nik }}" autofocus required />
                    </div>
                    @error('nik')
                    <div>
                        <div>
                            <input type="hidden" id="outlined_error" aria-describedby="outlined_error_help"
                                class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 appearance-none dark:text-white dark:border-red-500 border-red-600 dark:focus:border-red-500 focus:outline-none focus:ring-0 focus:border-red-600 peer"
                                placeholder=" " />
                        </div>
                        <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                class="font-medium">{{
                                $message }}</span></p>
                    </div>
                    @enderror
                    <div class="mb-5">
                        <input type="hidden" id="no_telepon"
                            class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="No Telepon Anda" name="no_telepon" value="{{ $pasien->pasien->no_telepon }}"
                            autofocus required />
                    </div>
                    @error('no_telepon')
                    <div>
                        <div>
                            <input type="hidden" id="outlined_error" aria-describedby="outlined_error_help"
                                class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 appearance-none dark:text-white dark:border-red-500 border-red-600 dark:focus:border-red-500 focus:outline-none focus:ring-0 focus:border-red-600 peer"
                                placeholder=" " />
                        </div>
                        <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                class="font-medium">{{
                                $message }}</span></p>
                    </div>
                    @enderror
                    <div class="mb-5">
                        <input type="hidden" id="usia"
                            class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Usia Anda" name="usia" value="{{ $pasien->pasien->usia }}" autofocus
                            required />
                    </div>
                    @error('usia')
                    <div>
                        <div>
                            <input type="hidden" id="outlined_error" aria-describedby="outlined_error_help"
                                class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 appearance-none dark:text-white dark:border-red-500 border-red-600 dark:focus:border-red-500 focus:outline-none focus:ring-0 focus:border-red-600 peer"
                                placeholder=" " />
                        </div>
                        <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                class="font-medium">{{
                                $message }}</span></p>
                    </div>
                    @enderror
                    <select id="jenis_kelamin" name="jenis_kelamin" type="hidden"
                        class="mb-5 bg-gray-50 border border-blue-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        style="display: none;">
                        <option value="laki-laki" {{ old('jenis_kelamin')=='laki-laki' ? 'selected' : '' }}>
                            laki-laki</option>
                        <option value="perempuan" {{ old('jenis_kelamin')=='perempuan' ? 'selected' : '' }}>
                            perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                    <div>
                        <div class="relative">
                            <input type="hidden" id="outlined_error" aria-describedby="outlined_error_help"
                                class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 appearance-none dark:text-white dark:border-red-500 border-red-600 dark:focus:border-red-500 focus:outline-none focus:ring-0 focus:border-red-600 peer"
                                placeholder=" " />
                        </div>
                        <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                class="font-medium">{{
                                $message }}</span></p>
                    </div>
                    @enderror
                    <div class="mb-5">
                        <input type="hidden" id="alamat"
                            class="mb-5 border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[500px] p-2.5"
                            placeholder="Alamat Anda" name="alamat" value="{{ $pasien->pasien->alamat }}" autofocus>
                        </input>
                    </div>
                    @error('alamat')
                    <div>
                        <div>
                            <input type="hidden" id="outlined_error" aria-describedby="outlined_error_help"
                                class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 appearance-none dark:text-white dark:border-red-500 border-red-600 dark:focus:border-red-500 focus:outline-none focus:ring-0 focus:border-red-600 peer"
                                placeholder=" " />
                        </div>
                        <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                class="font-medium">{{
                                $message }}</span></p>
                    </div>
                    @enderror
                    <div class="-mt-2">

                    </div>
                    <label for="keluhan"
                        class="block mb-2 -mt-[30px] text-sm font-medium text-gray-900 dark:text-white">Keluhan
                        Anda</label>
                    <textarea id="keluhan" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-blue-500 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Tulis Riwayat Penyakit Anda Misalnya: Pernah mengalami sesak nafas dalam jangka berapa hari, atau panas yang tidak sembuh-sembuh"
                        name="keluhan"></textarea>
                    </textarea>
                    @error('keluhan')
                    <div>
                        <div class="relative">
                            <input type="text" id="outlined_error" aria-describedby="outlined_error_help"
                                class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 appearance-none dark:text-white dark:border-red-500 border-red-600 dark:focus:border-red-500 focus:outline-none focus:ring-0 focus:border-red-600 peer"
                                placeholder=" " />
                        </div>
                        <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                class="font-medium">{{
                                $message }}</span></p>
                    </div>
                    @enderror
                    <button type="submit"
                        class="mt-9 px-[132px] py-2 text-sm font-medium text-gray-900 bg-transparent border border-[#183e9f] rounded-lg hover:bg-[#183e9f] hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700 transition ease-in-out duration-500">Tambah
                        Keluhan</button>
                </form>

            </div>
        </div>
    </div>
</div>

@if (session()->has('success'))
<div id="alert-3"
    class="flex items-center p-4 mb-2 mt-2 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
    role="alert">
    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
        viewBox="0 0 20 20">
        <path
            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
    </svg>
    <span class="sr-only">Info</span>
    <div class="ms-3 text-sm font-medium">
        <strong>Data Berhasil Ditambahkan</strong> Cek di Riwayat Saya !
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

<div class="mt-5">
    <p class="text-xl pb-3 flex items-center">
        <i class="fas fa-list mr-3"></i> Riwayat Saya Terakhir
    </p>
    <div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Nama Pasien</th>
                    <th scope="col" class="px-6 py-3">Keluhan</th>
                    <th scope="col" class="px-6 py-3">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pasiens as $pasien)
                <tr class="border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $pasien->pasien->nama }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $pasien->keluhan }}
                    </td>
                    <td class="px-6 py-4">
                        @if ($pasien->pasien->status === 'selesai')
                        {{-- Selesai --}}
                        <div class="flex flex-wrap justify-start gap-4">
                            <div>
                                <div class="inline-flex items-center gap-1 border-green-500 border-2 p-2 rounded-lg">
                                    <svg class="w-6 h-6 text-green-500 group-hover:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                    <span class="text-green-500">{{ $pasien->pasien->status }}</span>
                                </div>
                            </div>
                            <div>
                                <a href="{{ route('export-diagnosa-pdf') }}"
                                    class="group w-[190px] text-blue-500 cta-btn font-semibold rounded-xl shadow-lg hover:shadow-xl hover:bg-blue-600 hover:text-white flex items-center border border-blue-500 rounded-md justify-center p-[10px] transition ease-in-out duration-500">
                                    <svg class="w-6 h-6 text-blue-500 group-hover:text-white mr-2" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                                            d="M16.444 18H19a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h2.556M17 11V5a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1v6h10ZM7 15h10v4a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1v-4Z" />
                                    </svg>
                                    Cetak Diagnosa
                                </a>
                            </div>
                            <div>
                            </div>
                        </div>

                        @else
                        {{-- Menunggu --}}
                        <div class="inline-flex items-center gap-1 border-orange-500 border-2 p-2 rounded-lg">
                            <svg class="w-6 h-6 text-orange-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 9a3 3 0 0 1 3-3m-2 15h4m0-3c0-4.1 4-4.9 4-9A6 6 0 1 0 6 9c0 4 4 5 4 9h4Z" />
                            </svg>
                            <span class="text-orange-500">{{ $pasien->pasien->status }}</span>
                        </div>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
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
@endsection