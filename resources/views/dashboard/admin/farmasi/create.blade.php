@extends('dashboard.layouts.main')

@section('body')

<form action="/dashboard/admin/farmasi" method="post" class="mt-5">
    @csrf
    <div class="mb-5">
        <input type="text" id="nama_perusahaan"
            class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[500px] p-2.5"
            placeholder="Nama Perusahaan" name="nama_perusahaan" value="" autofocus required />
    </div>
    @error('nama_perusahaan')
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
        <input type="text" id="alamat_perusahaan"
            class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[500px] p-2.5"
            placeholder="Alamat Perusahaan" name="alamat_perusahaan" value="" autofocus required />
    </div>
    @error('alamat_perusahaan')
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
        <i class="fas fa-plus mr-[10px]"></i>Tambah Riwayat
    </button>
</form>

@endsection