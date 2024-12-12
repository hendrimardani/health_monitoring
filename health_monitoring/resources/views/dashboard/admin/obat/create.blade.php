@extends('dashboard.layouts.main')

@section('body')

<form action="/dashboard/admin/obat" method="post" class="mt-5">
    @csrf
    <select id="id_perusahaan" name="id_perusahaan"
        class="mb-5 bg-gray-50 border border-blue-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[500px] p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        autofocus required>
        <option disabled selected>Pilih Perusahaan</option>
        @foreach ($farmasis as $farmasi)
        <option value="{{ $farmasi->id }}">{{ $farmasi->nama_perusahaan }}</option>
        @endforeach
    </select>
    <div class="mb-5">
        <input type="text" id="nama_obat"
            class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[500px] p-2.5"
            placeholder="Nama Obat" name="nama_obat" value="" autofocus required />
    </div>
    <select id="kategori" name="kategori"
        class="mb-5 bg-gray-50 border border-blue-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[500px] p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option disabled selected>Kategori Obat</option>
        <option value="kapsul">kapsul</option>
        <option value="cair">cair</option>
        <option value="tablet">tablet</option>
    </select>
    <select id="dosis_tersedia" name="dosis_tersedia"
        class="mb-5 bg-gray-50 border border-blue-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[500px] p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        autofocus required>
        <option disabled selected>Dosis Tersedia</option>
        <option value="20 mg">20 mg</option>
        <option value="50 mg">50 mg</option>
        <option value="100 mg">100 mg</option>
        <option value="200 mg">200 mg</option>
    </select>
    <div class="mb-5">
        <input type="number" id="unit"
            class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[500px] p-2.5"
            placeholder="Unit" name="unit" value="" autofocus required />
    </div>
    @error('unit')
    <div>
        <div class="relative">
            <input type="text" id="outlined_error" aria-describedby="outlined_error_help"
                class="block px-2.5 pb-2.5 pt-4 w-[500px] text-sm text-gray-900 bg-transparent rounded-lg border-1 appearance-none dark:text-white dark:border-red-500 border-red-600 dark:focus:border-red-500 focus:outline-none focus:ring-0 focus:border-red-600 peer"
                autofocus required placeholder=" " />
        </div>
        <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span class="font-medium">{{
                $message }}</span></p>
    </div>
    @enderror
    <button
        class="w-[200px] ml-[140px] text-blue-500 cta-btn font-semibold mt-5 rounded-xl shadow-lg hover:shadow-xl hover:bg-blue-600 hover:text-white flex items-center justify-center p-[10px] transition ease-in-out duration-500 border border-blue-500 ">
        <i class="fas fa-plus mr-[10px]"></i>Tambah Data
    </button>
</form>

@endsection