@extends('dashboard.layouts.main')

@section('body')

<div
    class="inline-block p-5 rounded rounded-xl mt-5 shadow-[0_35px_60px_-15px_rgba(0,0,0,0.4)] hover:shadow-[0_35px_60px_-15px_rgba(0,0,0,1)] transition-all ease-in-out duration-700">
    <form action="/dashboard/admin/obat" method="post" class="mt-5">
        @csrf
        <select id="farmasi_id" name="farmasi_id"
            class="bg-gray-50 border border-blue-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[500px] p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('farmasi_id') border-red-500 @enderror"
            autofocus required>
            <option disabled selected>Pilih Perusahaan</option>
            @foreach ($farmasis as $farmasi)
            <option value="{{ $farmasi->id }}">{{ $farmasi->nama_perusahaan }}</option>
            @endforeach
        </select>
        @error('farmasi_id')
        <p class="text-xs text-red-600 dark:text-red-400">
            <span class="font-medium">{{
                $message }}</span>
        </p>
        @enderror
        <div class="mt-5">
            <input type="text" id="nama_obat"
                class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[500px] p-2.5"
                placeholder="Nama Obat" name="nama_obat" value="{{ old('nama_obat') }}" autofocus required />
        </div>
        @error('nama_obat')
        <p class="text-xs text-red-600 dark:text-red-400">
            <span class="font-medium">{{
                $message }}</span>
        </p>
        @enderror
        <select id="kategori_id" name="kategori_id" class="mt-5 bg-gray-50 border border-solid border-blue-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[500px] p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
        @error('kategori_id') border-red-500 @enderror">
            <option disabled selected>Kategori Obat</option>
            @foreach ($kategoriObats as $kategori)
            <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
            @endforeach
        </select>
        @error('kategori_id')
        <p class="text-xs text-red-600 dark:text-red-400">
            <span class="font-medium">{{ $message }}</span>
        </p>
        @enderror
        <select id="dosis_tersedia" name="dosis_tersedia"
            class="mt-5 bg-gray-50 border border-blue-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[500px] p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('dosis_tersedia') border-red-500 @enderror"
            autofocus required>
            <option disabled selected>Dosis Tersedia</option>
            <option value="100">100</option>
            <option value="200">200</option>
        </select>
        @error('dosis_tersedia')
        <p class="text-xs text-red-600 dark:text-red-400">
            <span class="font-medium">{{
                $message }}</span>
        </p>
        @enderror
        <div class="mt-5">
            <input type="number" id="unit"
                class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[500px] p-2.5"
                placeholder="Unit" name="unit" value="{{ old('unit') }}" autofocus required />
        </div>
        @error('unit')
        <p class="text-xs text-red-600 dark:text-red-400">
            <span class="font-medium">{{
                $message }}</span>
        </p>
        @enderror
        <button
            class="w-[200px] ml-[140px] text-blue-500 cta-btn font-semibold mt-5 rounded-xl shadow-lg hover:shadow-xl hover:bg-blue-600 hover:text-white flex items-center justify-center p-[10px] transition ease-in-out duration-500 border border-blue-500 ">
            <i class="fas fa-plus mr-[10px]"></i>Tambah Data
        </button>
    </form>
</div>

@endsection