@extends('dashboard.layouts.main')

@section('body')


<form action="/dashboard/admin/obat/{{ $obat->id }}" method="post" class="mt-5">
    @csrf
    @method('PUT')
    <select id="farmasi_id" name="farmasi_id"
        class="mb-5 bg-gray-50 border border-blue-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[500px] p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        autofocus required>
        <option disabled selected>Pilih Perusahaan</option>
        @foreach ($farmasis as $farmasi)
        <option value="{{ $farmasi->id }}" {{ old('farmasi_id', $obat->farmasi_id) == $farmasi->id ? 'selected' :
            '' }}>
            {{ $farmasi->nama_perusahaan }}
        </option>
        @endforeach
    </select>
    <div class="mb-5">
        <input type="text" id="nama_obat"
            class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[500px] p-2.5"
            placeholder="Nama Perusahaan" name="nama_obat" value="{{ $obat->nama_obat }}" autofocus required />
    </div>
    @error('nama_obat')
    <div>
        <div class="relative">
            <input type="text" id="outlined_error" aria-describedby="outlined_error_help"
                class="block px-2.5 pb-2.5 pt-4 w-[500px] text-sm text-gray-900 bg-transparent rounded-lg border-1 appearance-none dark:text-white dark:border-red-500 border-red-600 dark:focus:border-red-500 focus:outline-none focus:ring-0 focus:border-red-600 peer"
                placeholder=" " />
        </div>
        <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span class="font-medium">{{
                $message }}</span></p>
    </div>
    @enderror
    {{-- Pake Manual karena kategorinya tidak dipisah --}}
    <select id="kategori" name="kategori"
        class="mb-5 bg-gray-50 border border-blue-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[500px] p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option disabled selected>Kategori Obat</option>
        <option value="kapsul">kapsul</option>
        <option value="cair">cair</option>
        <option value="tablet">tablet</option>
    </select>
    {{-- Pake Manual karena kategorinya tidak dipisah --}}
    <select id="kategori" name="kategori"
        class="mb-5 bg-gray-50 border border-blue-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[500px] p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option disabled selected>Dosis tersedia</option>
        <option value="50 mg">50 mg</option>
        <option value="100 mg">100 mg</option>
        <option value="200 mg">200 mg</option>
        <option value="300 mg">300 mg</option>
    </select>
    @error('dosis_tersedia')
    <div>
        <div class="relative">
            <input type="text" id="outlined_error" aria-describedby="outlined_error_help"
                class="block px-2.5 pb-2.5 pt-4 w-[500px] text-sm text-gray-900 bg-transparent rounded-lg border-1 appearance-none dark:text-white dark:border-red-500 border-red-600 dark:focus:border-red-500 focus:outline-none focus:ring-0 focus:border-red-600 peer"
                placeholder=" " />
        </div>
        <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span class="font-medium">{{
                $message }}</span></p>
    </div>
    @enderror
    <div class="mb-5">
        <input type="number" id="unit"
            class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[500px] p-2.5"
            placeholder="Alamat Perusahaan" name="unit" value="{{ $obat->unit }}" autofocus required />
    </div>
    @error('unit')
    <div>
        <div class="relative">
            <input type="text" id="outlined_error" aria-describedby="outlined_error_help"
                class="block px-2.5 pb-2.5 pt-4 w-[500px] text-sm text-gray-900 bg-transparent rounded-lg border-1 appearance-none dark:text-white dark:border-red-500 border-red-600 dark:focus:border-red-500 focus:outline-none focus:ring-0 focus:border-red-600 peer"
                placeholder=" " />
        </div>
        <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span class="font-medium">{{
                $message }}</span></p>
    </div>
    @enderror
    <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
        class="w-[200px] ml-[140px] text-blue-500 cta-btn font-semibold mt-5 rounded-xl shadow-lg hover:shadow-xl hover:bg-blue-600 hover:text-white flex items-center justify-center p-[10px] transition ease-in-out duration-500 border border-blue-500 ">
        Ubah Data
    </button>
</form>

@endsection