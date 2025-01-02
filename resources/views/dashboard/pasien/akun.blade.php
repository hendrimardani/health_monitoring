@extends('dashboard.layouts.main')
{{-- JQuery --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@section('body')

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

@if ($pasien->keluhan === null)
<div id="alert-3"
    class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
    role="alert">
    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
        viewBox="0 0 20 20">
        <path
            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
    </svg>
    <span class="sr-only">Info</span>
    <div class="ms-3 text-sm font-medium">
        <strong>Identitas atau keluhan anda masih ada yang kosong !</strong> Silahkan isi terlebih dahulu identitas
        anda.
    </div>
    <button type="button"
        class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
        data-dismiss-target="#alert-3" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
    </button>
</div>
@endif

<div class="flex flex-wrap justify-center">
    <form action="/dashboard/pasien/akun/{{ $pasien->pasien_id_pasien }}" method="post"
        class="inline-block p-5 mt-5 rounded-xl shadow-[0_35px_60px_-15px_rgba(0,0,0,0.4)] hover:shadow-[0_35px_60px_-15px_rgba(0,0,0,1)] transition-all ease-in-out duration-700">
        @csrf
        @method('PUT')
        <div class="mb-5">
            <input type="text" id="nama"
                class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[500px] p-2.5"
                placeholder="Nama Anda" name="nama" value="{{ $pasien->pasien->nama }}" autofocus required />
        </div>
        @error('nama')
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
            <input type="number" id="nik"
                class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[500px] p-2.5"
                placeholder="NIK Anda" name="nik" value="{{ $pasien->pasien->nik }}" autofocus required />
        </div>
        @error('nik')
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
            <input type="number" id="no_telepon"
                class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[500px] p-2.5"
                placeholder="No Telepon Anda" name="no_telepon" value="{{ $pasien->pasien->no_telepon }}" autofocus
                required />
        </div>
        @error('no_telepon')
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
            <input type="number" id="usia"
                class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[500px] p-2.5"
                placeholder="Usia Anda" name="usia" value="{{ $pasien->pasien->usia }}" autofocus required />
        </div>
        @error('usia')
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
            <select id="jenis_kelamin" name="jenis_kelamin"
                class="mb-5 bg-gray-50 border border-blue-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[500px] p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                autofocus required>
                <option disabled>Jenis Kelamin</option>
                <option value="laki-laki" selected>laki-laki</option>
                <option value="perempuan">perempuan</option>
            </select>
        </div>
        @error('jenis_kelamin')
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
            <textarea type="text" id="alamat"
                class="mb-5 border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[500px] p-2.5"
                placeholder="Alamat Anda" name="alamat" autofocus requred></textarea>
        </div>
        @error('alamat')
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
            <textarea type="text" id="keluhan"
                class="mb-5 border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[500px] p-2.5"
                placeholder="Keluhan Anda" name="keluhan" autofocus></textarea>
        </div>
        @error('keluhan')
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
            class="w-[200px] ml-[140px] group flex flex-wrap justify-center gap-5 text-blue-500 cta-btn font-semibold mt-5 rounded-xl shadow-[0_35px_60px_-15px_rgba(0,0,0,0.4)] hover:shadow-[0_35px_60px_-15px_rgba(0,0,0,1)] hover:bg-blue-600 hover:text-white flex items-center justify-center p-[10px] transition ease-in-out duration-500 border border-blue-500">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-pencil text-blue-500 group-hover:text-white" viewBox="0 0 16 16">
                <path
                    d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
            </svg>
            Ubah Data
        </button>
    </form>
</div>


<script>
    // Fungsi untuk mengambil data dari server
    function dataFromJson(pasienId) {
    fetch(`/dashboard/dokter/pasien/getDataJson/${pasienId}`)
        .then(response => {
            console.log("Response status:", response.status); 
            console.log("Response text:");
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log("Data diterima:", data);
            console.log("Data test:", data.pasien.id);
            if (data.success) {
                document.getElementById('alamat').value = data.pasien.alamat || '';
                document.getElementById('keluhan').value = data.pasien.keluhan || '';
            } else {
                alert("Gagal memuat data: " + data.message);
            }
        })
        .catch(error => {
            console.error("Terjadi kesalahan:", error);
        });
}


// Panggil fungsi saat halaman selesai dimuat
window.onload = function () {
    const pasienId = {{ $pasien->pasien_id }};
    dataFromJson(pasienId);
};

</script>
@endsection