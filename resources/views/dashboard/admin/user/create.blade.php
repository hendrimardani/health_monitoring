@extends('dashboard.layouts.main')

@section('body')

<div
    class="inline-block p-5 rounded rounded-xl mt-5 shadow-[0_35px_60px_-15px_rgba(0,0,0,0.4)] hover:shadow-[0_35px_60px_-15px_rgba(0,0,0,1)] transition-all ease-in-out duration-700">
    <form action="/dashboard/admin/user" method="post" class="mt-5">
        @csrf
        <div>
            <input type="text" id="nama"
                class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[500px] p-2.5"
                placeholder="Nama User" name="nama" value="{{ old('nama') }}" autofocus required />
        </div>
        @error('nama')
        <p class="text-xs text-red-600 dark:text-red-400">
            <span class="font-medium">{{
                $message }}</span>
        </p>
        @enderror
        <div class="mt-5">
            <input type="text" id="email"
                class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[500px] p-2.5"
                placeholder="Email User" name="email" value="{{ old('email') }}" autofocus required />
        </div>
        @error('email')
        <p class="text-xs text-red-600 dark:text-red-400">
            <span class="font-medium">{{
                $message }}</span>
        </p>
        @enderror
        <div class="mt-5">
            <input type="password" id="password"
                class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[500px] p-2.5"
                placeholder="Password User" name="password" value="{{ old('password') }}" autofocus required />
        </div>
        @error('password')
        <p class="text-xs text-red-600 dark:text-red-400">
            <span class="font-medium">{{
                $message }}</span>
        </p>
        @enderror
        <div class="mt-5">
            <select id="role" name="role"
                class="bg-gray-50 border border-blue-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[500px] p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 form-control @error('role') border-red-500 @enderror"
                required onchange="toggleInputs()">
                <option disabled selected>Role</option>
                <option value="pasien">pasien</option>
                <option value="dokter">dokter</option>
            </select>
        </div>
        @error('role')
        <p class="text-xs text-red-600 dark:text-red-400">
            <span class="font-medium">{{
                $message }}</span>
        </p>
        @enderror
        {{-- Input khusus untuk dokter --}}
        <div id="dokter-input" class="hidden">
            <div class="mt-5">
                <input type="number" id="no_telepon_dokter"
                    class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[500px] p-2.5"
                    placeholder="No Telepon Dokter" name="no_telepon_dokter" value="" autofocus />
            </div>
            <div class="mt-5">
                <select id="spesialisasi" name="spesialisasi"
                    class="bg-gray-50 border border-blue-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[500px] p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 form-control">
                    <option disabled selected>Spesialisasi</option>
                    <option value="Penyakit Dalam (Internist)">Penyakit Dalam (Internist)</option>
                    <option value="Bedah (Surgeon)">Bedah (Surgeon)</option>
                    <option value="Saraf (Neurolog)">Saraf (Neurolog)</option>
                    <option value="Jantung dan Pembuluh Darah (Kardiolog)">Jantung dan Pembuluh Darah (Kardiolog)
                    </option>
                </select>
            </div>
        </div>
        {{-- Input khusus untuk pasien --}}
        <div id="pasien-input" class="hidden">
            <div class="mt-5">
                <input type="number" id="nik"
                    class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[500px] p-2.5"
                    placeholder="NIK Pasien" name="nik" value="" autofocus />
            </div>
            <div class="mt-5">
                <input type="number" id="no_telepon"
                    class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[500px] p-2.5"
                    placeholder="No Telepon Pasien" name="no_telepon" value="" autofocus />
            </div>
            <div class="mt-5">
                <input type="number" id="usia"
                    class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[500px] p-2.5"
                    placeholder="Usia Pasien" name="usia" value="" autofocus />
            </div>
            <select id="jenis_kelamin" name="jenis_kelamin"
                class="mt-5 bg-gray-50 border border-blue-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[500px] p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 form-control">
                <option disabled selected>Jenis Kelamin</option>
                <option value="laki-laki">Laki-laki</option>
                <option value="perempuan">Perempuan</option>
            </select>
            <div class="mt-5">
                <textarea type="text" id="alamat"
                    class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[500px] p-2.5"
                    placeholder="Alamat Pasien" name="alamat" autofocus></textarea>
            </div>
            <div class="mt-5">
                <textarea type="text" id="keluhan"
                    class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[500px] p-2.5"
                    placeholder="Keluhan Pasien" name="keluhan" autofocus></textarea>
            </div>
        </div>
        <button type="submit"
            class="w-[200px] ml-[140px] text-blue-500 cta-btn font-semibold mt-5 rounded-xl shadow-lg hover:shadow-xl hover:bg-blue-600 hover:text-white flex items-center justify-center p-[10px] transition ease-in-out duration-500 border border-blue-500 ">
            <i class="fas fa-plus mr-[10px]"></i>Tambah Data
        </button>
    </form>
</div>

<script>
    document.querySelector('form').addEventListener('submit', function(e) {
    console.log('Form Submitted!');
});

    function toggleInputs() {
        const role = document.getElementById('role').value;
        const pasienInput = document.getElementById('pasien-input');
        const dokterInput = document.getElementById('dokter-input');

        console.log("Role:", role); // Log peran yang dipilih
        console.log("Pasien Input:", pasienInput);
        console.log("Dokter Input:", dokterInput);

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