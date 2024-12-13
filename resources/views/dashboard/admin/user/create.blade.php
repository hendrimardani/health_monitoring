@extends('dashboard.layouts.main')

@section('body')

<form action="/dashboard/admin/user" method="post" class="mt-5">
    @csrf
    <div class="mb-5">
        <input type="text" id="nama"
            class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[500px] p-2.5"
            placeholder="Nama User" name="nama" value="" autofocus required />
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
        <input type="text" id="email"
            class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[500px] p-2.5"
            placeholder="Email User" name="email" value="" autofocus required />
    </div>
    @error('email')
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
        <input type="password" id="password"
            class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[500px] p-2.5"
            placeholder="Password User" name="password" value="" autofocus required />
    </div>
    @error('password')
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
    <div class="relative">
        <select id="role" name="role"
            class="mb-5 bg-gray-50 border border-blue-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[500px] p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 form-control"
            onchange="toggleInputs()">
            <option disabled selected>Role</option>
            <option value="pasien">pasien</option>
            <option value="dokter">dokter</option>
        </select>
    </div>
    @error('role')
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
    {{-- Input khusus untuk dokter --}}
    <div id="dokter-input" class="hidden">
        <div>
            <input type="number" id="no_telepon_dokter"
                class="mb-5 border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[500px] p-2.5"
                placeholder="No Telepon Dokter" name="no_telepon_dokter" value="" autofocus />
        </div>
        <div>
            <select id="spesialisasi" name="spesialisasi"
                class="mb-5 bg-gray-50 border border-blue-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[500px] p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 form-control">
                <option disabled selected>Spesialisasi</option>
                <option value="Penyakit Dalam (Internist)">Penyakit Dalam (Internist)</option>
                <option value="Bedah (Surgeon)">Bedah (Surgeon)</option>
                <option value="Saraf (Neurolog)">Saraf (Neurolog)</option>
                <option value="Jantung dan Pembuluh Darah (Kardiolog)">Jantung dan Pembuluh Darah (Kardiolog)</option>
            </select>
        </div>
    </div>
    {{-- Input khusus untuk pasien --}}
    <div id="pasien-input" class="hidden">
        <div>
            <input type="number" id="nik"
                class="mb-5 border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[500px] p-2.5"
                placeholder="NIK Pasien" name="nik" value="" autofocus />
        </div>
        <div>
            <input type="number" id="no_telepon"
                class="mb-5 border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[500px] p-2.5"
                placeholder="No Telepon Pasien" name="no_telepon" value="" autofocus />
        </div>
        <div>
            <input type="number" id="usia"
                class="mb-5 border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[500px] p-2.5"
                placeholder="Usia Pasien" name="usia" value="" autofocus />
        </div>
        <select id="jenis_kelamin" name="jenis_kelamin"
            class="mb-5 bg-gray-50 border border-blue-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[500px] p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 form-control">
            <option disabled selected>Jenis Kelamin</option>
            <option value="laki-laki">Laki-laki</option>
            <option value="perempuan">Perempuan</option>
        </select>
        <div>
            <input type="text" id="alamat"
                class="mb-5 border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[500px] p-2.5"
                placeholder="Alamat Pasien" name="alamat" value="" autofocus />
        </div>
        <div>
            <input type="text" id="riwayat_penyakit"
                class="mb-5 border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[500px] p-2.5"
                placeholder="Riwayat Penyakit Pasien" name="riwayat_penyakit" value="" autofocus />
        </div>
    </div>
    <button type="submit"
        class="w-[200px] ml-[140px] text-blue-500 cta-btn font-semibold mt-5 rounded-xl shadow-lg hover:shadow-xl hover:bg-blue-600 hover:text-white flex items-center justify-center p-[10px] transition ease-in-out duration-500 border border-blue-500 ">
        <i class="fas fa-plus mr-[10px]"></i>Tambah Data
    </button>
</form>

<script>
    document.querySelector('form').addEventListener('submit', function(e) {
    console.log('Form Submitted!');
});

    function toggleInputs() {
        const role = document.getElementById('role').value;
        const pasienInput = document.getElementById('pasien-input');
        const dokterInput = document.getElementById('dokter-input');

        console.log("Role", role); // debug

        if (role === 'pasien') {
            pasienInput.classList.remove('hidden');
            dokterInput.classList.add('hidden');
        } else if (role === 'dokter') {
            dokterInput.classList.remove('hidden');
            pasienInput.classList.add('hidden');
        } else {
            dokterInput.classList.add('hidden');
            pasienInput.classList.add('hidden');
        }
    }
</script>

@endsection