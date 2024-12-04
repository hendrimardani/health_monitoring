<sidebar class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl bg-[#183e9f]">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ $title }}</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.js"></script>
    </head>
    <div class="mx-9">
        <a href="/dashboard" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
        {{-- Modal Toggled --}}
        <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
            class="w-full bg-white cta-btn font-semibold mt-5 rounded-xl shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center px-5">
            <i class="fas fa-plus mr-[10px]"></i>Tambah Riwayat
        </button>
    </div>

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
                                placeholder="Email Anda" name="email_pasien" value="{{ $pasien->user->email }}"
                                autofocus required />
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
                                placeholder=" Password Anda" name="password" value="{{ $pasien->user->password }}"
                                autofocus required />
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
                                placeholder="No Telepon Anda" name="no_telepon" value="{{ $pasien->no_telepon }}"
                                autofocus required />
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
                                placeholder="Alamat Anda" name="alamat" value="{{ $pasien->alamat }}" autofocus
                                required />
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

    <nav class="text-white text-base font-semibold pt-3">
        <a href="/dashboard"
            class="flex items-center py-4 pl-6 nav-item {{ Request::is('dashboard') ? 'bg-blue-700 active-nav-link text-white' : 'opacity-75 hover:opacity-100' }}">
            <i class="fas fa-tachometer-alt mr-3 "></i>
            Dashboard
        </a>
        <a href="#"
            class="flex items-center py-4 pl-6 nav-item {{ Request::is('dashboard/akun-saya') ? 'bg-blue-700 active-nav-link text-white' : 'opacity-75 hover:opacity-100' }}">
            <i class="fas fa-sticky-note mr-3"></i>
            Akun Saya
        </a>
        <a href="/dashboard/riwayat-saya"
            class="flex items-center py-4 pl-6 nav-item {{ Request::is('dashboard/riwayat-saya') ? 'bg-blue-700 active-nav-link text-white' : 'opacity-75 hover:opacity-100' }}">
            <i class="fas fa-sticky-note mr-3"></i>
            Riwayat Saya
        </a>
    </nav>
    <form action="/logout" method="post">
        @csrf
        <button type="submit"
            class="bg-white absolute w-full upgrade-btn bottom-0 active-nav-link text-red-900 font-bold flex items-center justify-center py-4 hover:bg-gray-300">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z" />
                <path fill-rule="evenodd"
                    d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z" />
            </svg>Keluar Akun
        </button>
    </form>
</sidebar>