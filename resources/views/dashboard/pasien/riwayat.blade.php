@extends('dashboard.layouts.main')

@section('body')

{{-- Modal Toggled --}}
<button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
    class="w-[200px] bg-blue-500 text-white cta-btn font-semibold mt-5 rounded-xl shadow-lg hover:shadow-xl hover:bg-blue-600 flex items-center justify-center p-[10px]">
    <i class="fas fa-plus mr-[10px]"></i>Tambah Riwayat
</button>

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
                <form action="/dashboard/riwayat" method="post">
                    @csrf
                    <div class="mb-5">
                        <input type="text" id="nama_pasien"
                            class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Nama Anda" name="nama_pasien" value="{{ $pasien->user->nama }}" autofocus
                            required />
                    </div>
                    @error('nama_pasien')
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
                    <div class="mb-5">
                        <input type="email" id="email_pasien"
                            class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Email Anda" name="email_pasien" value="{{ $pasien->user->email }}" autofocus
                            required />
                    </div>
                    @error('email_pasien')
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
                    <div class="mb-5">
                        <input type="password" id="password"
                            class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder=" Password Anda" name="password" value="{{ $pasien->user->password }}" autofocus
                            required />
                    </div>
                    @error('password')
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
                    <div class="mb-5">
                        <input type="number" id="nik"
                            class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="NIK Anda" name="nik" value="{{ $pasien->nik }}" autofocus required />
                    </div>
                    @error('nik')
                    <div>
                        <div>
                            <input type="text" id="outlined_error" aria-describedby="outlined_error_help"
                                class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 appearance-none dark:text-white dark:border-red-500 border-red-600 dark:focus:border-red-500 focus:outline-none focus:ring-0 focus:border-red-600 peer"
                                placeholder=" " />
                        </div>
                        <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                class="font-medium">{{
                                $message }}</span></p>
                    </div>
                    @enderror
                    <div class="mb-5">
                        <input type="number" id="no_telepon"
                            class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="No Telepon Anda" name="no_telepon" value="{{ $pasien->no_telepon }}" autofocus
                            required />
                    </div>
                    @error('no_telepon')
                    <div>
                        <div>
                            <input type="text" id="outlined_error" aria-describedby="outlined_error_help"
                                class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 appearance-none dark:text-white dark:border-red-500 border-red-600 dark:focus:border-red-500 focus:outline-none focus:ring-0 focus:border-red-600 peer"
                                placeholder=" " />
                        </div>
                        <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                class="font-medium">{{
                                $message }}</span></p>
                    </div>
                    @enderror
                    <div class="mb-5">
                        <h3 class="font-semibold text-gray-900 dark:text-white">Usia</h3>
                        <input type="text" id="usia"
                            class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Usia Anda" name="usia" value="{{ $pasien->usia }}" autofocus required />
                    </div>
                    @error('usia')
                    <div>
                        <div>
                            <input type="text" id="outlined_error" aria-describedby="outlined_error_help"
                                class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 appearance-none dark:text-white dark:border-red-500 border-red-600 dark:focus:border-red-500 focus:outline-none focus:ring-0 focus:border-red-600 peer"
                                placeholder=" " />
                        </div>
                        <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                class="font-medium">{{
                                $message }}</span></p>
                    </div>
                    @enderror
                    <label for="jenis_kelamin"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                        Kelamin</label>
                    <select id="jenis_kelamin" name="jenis_kelamin"
                        class="mb-5 bg-gray-50 border border-blue-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="laki-laki" {{ old('jenis_kelamin')=='laki-laki' ? 'selected' : '' }}>
                            laki-laki</option>
                        <option value="perempuan" {{ old('jenis_kelamin')=='perempuan' ? 'selected' : '' }}>
                            perempuan</option>
                    </select>
                    @error('jenis_kelamin')
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
                    <div class="mb-5">
                        <input type="text" id="alamat"
                            class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Alamat Anda" name="alamat" value="{{ $pasien->alamat }}" autofocus required />
                    </div>
                    @error('alamat')
                    <div>
                        <div>
                            <input type="text" id="outlined_error" aria-describedby="outlined_error_help"
                                class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 appearance-none dark:text-white dark:border-red-500 border-red-600 dark:focus:border-red-500 focus:outline-none focus:ring-0 focus:border-red-600 peer"
                                placeholder=" " />
                        </div>
                        <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                class="font-medium">{{
                                $message }}</span></p>
                    </div>
                    @enderror
                    <label for="riwayat_penyakit"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Riwayat
                        Penyakit</label>
                    <textarea id="riwayat_penyakit" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-blue-500 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Tulis Riwayat Penyakit Anda Misalnya: Pernah mengalami sesak nafas dalam jangka berapa hari, atau panas yang tidak sembuh-sembuh"
                        name="riwayat_penyakit" value="{{ old('riwayat_penyakit') }}">
            </textarea>
                    @error('riwayat_Penyakit')
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
                        class="mt-9 px-[162px] py-2 text-sm font-medium text-gray-900 bg-transparent border border-[#183e9f] rounded-lg hover:bg-[#183e9f] hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">Tambah</button>
                </form>

            </div>
        </div>
    </div>
</div>

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

<div class="mt-12">
    <p class="text-xl pb-3 flex items-center">
        <i class="fas fa-list mr-3"></i> Riwayat Saya Terakhir
    </p>
    <div>
        <table class="w-full bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Nama Pasien</th>
                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Keluhan</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach ($pasiens as $pasien)
                <tr>
                    <td class="w-1/3 text-left py-3 px-4">{{ $pasien->nama_pasien }}</td>
                    <td class="w-1/3 text-left py-3 px-4">{{ $pasien->riwayat_penyakit }}</td>
                    {{-- <td class="text-left py-3 px-4"><a class="hover:text-blue-500"
                            href="tel:622322662">622322662</a>
                    </td>
                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500"
                            href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td> --}}
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection