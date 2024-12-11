@extends('dashboard.layouts.main')

@section('body')

<h1 class="text-3xl text-black mt-2">Pasien Anda</h1>



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

<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">
                No
            </th>
            <th scope="col" class="px-6 py-3">
                Nama Pasien
            </th>
            <th scope="col" class="px-6 py-3">
                NIK Pasien
            </th>
            <th scope="col" class="px-6 py-3">
                Usia Pasien
            </th>
            <th scope="col" class="px-6 py-3">
                Jenis Kelamin
            </th>
            <th scope="col" class="px-6 py-3">
                Riwayat Penyakit
            </th>
            <th scope="col" class="px-6 py-3">
                Status
            </th>
            <th scope="col" class="px-6 py-3">
                Periksa
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pasiens as $pasien)
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $loop->iteration }}
            </th>
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $pasien->nama_pasien }}
            </th>
            <td class="px-6 py-4">
                {{ $pasien->nik }}
            </td>
            <td class="px-6 py-4">
                {{ $pasien->usia }}
            </td>
            <td class="px-6 py-4">
                {{ $pasien->jenis_kelamin }}
            </td>
            <td class="px-6 py-4">
                {{ $pasien->riwayat_penyakit }}
            </td>
            <td class="px-6 py-4">
                {{ $pasien->status }}
            </td>
            <td class="px-6 py-4">
                <div
                    class="group inline-flex items-center gap-1 border-orange-500 border-2 p-2 rounded-lg hover:bg-orange-500 hover:text-white transition duration-500">
                    {{-- Fungsi dari '@json($pasien)' untuk mengirimkan data ke modal --}}
                    <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                        data-pasien='@json($pasien)' class="flex items-center gap-1">
                        <svg class="w-6 h-6 text-orange-500 group-hover:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <span class="text-orange-500 group-hover:text-white">Diagnosa</span>
                    </button>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Main modal -->
<div id="authentication-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal Header -->
            <div class="flex items-center justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Diagnosa Pasien
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto"
                    data-modal-hide="authentication-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
            <!-- Modal Body -->
            <div class="p-4">
                <form action="/dashboard/dokter/pasien/diagnosa" method="post" id="modal-diagnosa-form"
                    class="modal-diagnosa-form mt-5">
                    @csrf
                    <!-- Step 1 -->
                    <div class="modal-step modal-step-1">
                        <!-- Hidden Inputs -->
                        <input type="hidden" name="id_pasien" id="id_pasien">
                        <input type="hidden" id="nama_pasien" name="nama_pasien" value="" required readonly />
                        <input type="hidden" id="nik" name="nik" value="" required readonly />
                        <input type="hidden" id="no_telepon" name="no_telepon" value="" required readonly />
                        <input type="hidden" id="usia" name="usia" value="" required readonly />
                        <input type="hidden" id="alamat" name="alamat" value="" required readonly />

                        <!-- Jenis Kelamin -->
                        <div>
                            <select id="jenis_kelamin" name="jenis_kelamin"
                                class="mb-5 bg-gray-50 border border-blue-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                style="display: none;">
                                <option disabled selected>Jenis Kelamin</option>
                                <option value="laki-laki">laki-laki</option>
                                <option value="perempuan">perempuan</option>
                            </select>
                        </div>

                        <!-- Riwayat Penyakit & Status -->
                        <input type="hidden" id="riwayat_penyakit" name="riwayat_penyakit" value="" required readonly />
                        <input type="hidden" id="status" name="status" value="selesai" required readonly />

                        <!-- Vital Signs -->
                        <div>
                            <label for="saturasi_oksigen"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Saturasi
                                Oksigen</label>
                            <input type="number" step="0.01" id="saturasi_oksigen"
                                class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Cnth: 70.5" name="saturasi_oksigen" required />
                        </div>
                        <div>
                            <label for="detak_jantung"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Detak
                                Jantung</label>
                            <input type="number" step="0.01" id="detak_jantung"
                                class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Cnth: 120" name="detak_jantung" required />
                        </div>
                        <div>
                            <label for="suhu_badan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Suhu
                                Badan</label>
                            <input type="number" step="0.01" id="suhu_badan"
                                class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Cnth: 37.5" name="suhu_badan" required />
                        </div>
                        <div>
                            <label for="berat_badan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Berat
                                Badan</label>
                            <input type="number" step="0.01" id="berat_badan"
                                class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Cnth: 160" name="berat_badan" required />
                        </div>
                        <div>
                            <label for="tekanan_darah_sistol"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tekanan Darah
                                Sistol</label>
                            <input type="number" step="0.01" id="tekanan_darah_sistol"
                                class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Cnth: 120" name="tekanan_darah_sistol" required />
                        </div>
                        <div>
                            <label for="tekanan_darah_diastol"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tekanan Darah
                                Diastol</label>
                            <input type="number" step="0.01" id="tekanan_darah_diastol"
                                class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                placeholder="Cnth: 120" name="tekanan_darah_diastol" required />
                        </div>
                        <div class="mt-2">
                            <label for="waktu_pengukuran"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Waktu
                                Pengukuran</label>
                            <input type="date" id="waktu_pengukuran"
                                class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                name="waktu_pengukuran" value="{{ now()->toDateString() }}" required readonly />
                        </div>

                        <!-- Tombol Lanjut -->
                        <div class="col-span-2 text-center">
                            <button type="button" id="next-step-1"
                                class="w-[200px] text-blue-500 cta-btn font-semibold mt-5 rounded-xl shadow-lg hover:shadow-xl hover:bg-blue-600 hover:text-white flex items-center justify-center p-[10px] transition ease-in-out duration-500 border border-blue-500">
                                Lanjut
                            </button>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="modal-step modal-step-2 hidden">
                        <div>
                            <label for="kode_icd"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode
                                ICD</label>
                            <input type="text" id="kode_icd"
                                class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                name="kode_icd" placeholder="Cnth: A001" required />
                        </div>
                        <div>
                            <label for="keluhan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keluhan</label>
                            <input type="text" id="keluhan"
                                class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                name="keluhan" placeholder="Keluhan" required />
                        </div>
                        <div>
                            <label for="catatan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Catatan</label>
                            <input type="text" id="catatan"
                                class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                name="catatan" placeholder="Catatan" required />
                        </div>
                        <!-- Tombol Kirim -->
                        <div class="col-span-2 text-center">
                            <button type="button" id="next-step-2"
                                class="w-[200px] text-blue-500 cta-btn font-semibold mt-5 rounded-xl shadow-lg hover:shadow-xl hover:bg-blue-600 hover:text-white flex items-center justify-center p-[10px] transition ease-in-out duration-500 border border-blue-500">
                                Lanjut
                            </button>
                        </div>
                        <!-- Tombol Kembali -->
                        <div class="col-span-2 text-center mt-4">
                            <button type="button" id="back-to-step-1"
                                class="w-[200px] text-blue-500 cta-btn font-semibold mt-5 rounded-xl shadow-lg hover:shadow-xl hover:bg-blue-600 hover:text-white flex items-center justify-center p-[10px] transition ease-in-out duration-500 border border-blue-500">
                                Kembali
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const diagnosaButtons = document.querySelectorAll('button[data-pasien]');
        const modalForm = document.getElementById('modal-diagnosa-form');
        const errorsMessages = document.getElementById('errors-messages');
        const step1 = document.querySelector('.modal-step-1');
        const step2 = document.querySelector('.modal-step-2');
        const nextStep1Button = document.getElementById('next-step-1');
        const backToStep1Button = document.getElementById('back-to-step-1');

        diagnosaButtons.forEach(button => {
            button.addEventListener('click', function() {
                const pasienData = JSON.parse(this.getAttribute('data-pasien'));

                document.getElementById('id_pasien').value = pasienData.id_pasien;
                document.getElementById('nama_pasien').value = pasienData.nama_pasien;
                document.getElementById('nik').value = pasienData.nik;
                document.getElementById('no_telepon').value = pasienData.no_telepon;
                document.getElementById('alamat').value = pasienData.alamat;    
                document.getElementById('usia').value = pasienData.usia;
                document.getElementById('jenis_kelamin').value = pasienData.jenis_kelamin;
                document.getElementById('riwayat_penyakit').value = pasienData.riwayat_penyakit;

                // Reset step1 and step2 visibility
                step1.classList.remove('hidden');
                step2.classList.add('hidden');

                // Debug
                console.log(pasienData);
            });
        });

        nextStep1Button.addEventListener('click', function() {
            // Ambil data riwayat_penyakit dan tampilkan di input keluhan
            document.getElementById('keluhan').value = document.getElementById('riwayat_penyakit').value;
            // Validasi input step1 jika diperlukan
            if (
                (document.getElementById('saturasi_oksigen').value === '') || 
                (document.getElementById('detak_jantung').value === '') || 
                (document.getElementById('suhu_badan').value === '') || 
                (document.getElementById('berat_badan').value === '') || 
                (document.getElementById('tekanan_darah_sistol').value === '') || 
                (document.getElementById('tekanan_darah_diastol').value === '')
            ) {
                alert('Data tidak boleh ada yang kosong!');
                return;
            }
            // Hide step1, show step2
            step1.classList.add('hidden');
            step2.classList.remove('hidden');
        });

            // Logika tombol Kembali
            backToStep1Button.addEventListener('click', function() {
            // Hide step2, show step1
            step2.classList.add('hidden');
            step1.classList.remove('hidden');
        });
    });
</script>

@endsection