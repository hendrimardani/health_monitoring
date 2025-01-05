@extends('dashboard.layouts.main')

@section('body')

<div
    class="inline-block p-5 rounded rounded-xl mt-5 shadow-[0_35px_60px_-15px_rgba(0,0,0,0.4)] hover:shadow-[0_35px_60px_-15px_rgba(0,0,0,1)] transition-all ease-in-out duration-700">
    <form action="/dashboard/admin/farmasi" method="post" class="mt-5">
        @csrf
        <div>
            <input type="text" id="nama_perusahaan"
                class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[500px] p-2.5"
                placeholder="Nama Perusahaan" name="nama_perusahaan" value="{{ old('nama_perusahaan') }}" autofocus
                required />
        </div>
        @error('nama_perusahaan')
        <p class="text-xs text-red-600 dark:text-red-400">
            <span class="font-medium">{{
                $message }}</span>
        </p>
        @enderror
        <div class="mt-5">
            <input type="text" id="alamat_perusahaan"
                class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[500px] p-2.5"
                placeholder="Alamat Perusahaan" name="alamat_perusahaan" value="{{ old('alamat_perusahaan') }}" />
        </div>
        @error('alamat_perusahaan')
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