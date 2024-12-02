<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="flex justify-center gap-[200px]">
        <div>
            <!-- Blur Background -->
            <div>
                <div class="rounded-full bg-[#183e9f] w-[700pxs h-[700px] blur-2xl mt-28 opacity-80">
                </div>
            </div>
            <div class="relative">
                <img src="{{ asset('assets/2-2.png') }}" alt="" class="w-[700px] -mt-[450px]">
            </div>
        </div>
        <div class="mt-[20px] border-2 border-[#183e9f] p-9 rounded-2xl w-[500px] h-[900px]">
            <form action="{{ route('register') }}" method="post">
                @csrf
                <h1 class="text-4xl font-bold mb-5 text-center">{{ $title }}</h1>
                <div class="mb-5">
                    <input type="text" id="nama_pasien"
                        class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Nama Anda" name="nama_pasien" value="{{ old('nama_pasien') }}" required />
                </div>
                @error('nama_pasien')
                <div>
                    <div class="relative">
                        <input type="text" id="outlined_error" aria-describedby="outlined_error_help"
                            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 appearance-none dark:text-white dark:border-red-500 border-red-600 dark:focus:border-red-500 focus:outline-none focus:ring-0 focus:border-red-600 peer"
                            placeholder=" " />
                    </div>
                    <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                            class="font-medium">{{ $message }}</span></p>
                </div>
                @enderror
                <div class="mb-5">
                    <input type="email" id="email_pasien"
                        class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Email Anda" name="email_pasien" value="{{ old('email_pasien') }}" autofocus
                        required />
                </div>
                @error('email_pasien')
                <div>
                    <div class="relative">
                        <input type="text" id="outlined_error" aria-describedby="outlined_error_help"
                            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 appearance-none dark:text-white dark:border-red-500 border-red-600 dark:focus:border-red-500 focus:outline-none focus:ring-0 focus:border-red-600 peer"
                            placeholder=" " />
                    </div>
                    <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                            class="font-medium">{{ $message }}</span></p>
                </div>
                @enderror
                <div class="mb-5">
                    <input type="password" id="password"
                        class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder=" Password Anda" name="password" autofocus required />
                </div>
                @error('password')
                <div>
                    <div class="relative">
                        <input type="text" id="outlined_error" aria-describedby="outlined_error_help"
                            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 appearance-none dark:text-white dark:border-red-500 border-red-600 dark:focus:border-red-500 focus:outline-none focus:ring-0 focus:border-red-600 peer"
                            placeholder=" " />
                    </div>
                    <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                            class="font-medium">{{ $message }}</span></p>
                </div>
                @enderror
                <div class="mb-5">
                    <input type="number" id="nik"
                        class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="NIK Anda" name="nik" value="{{ old('nik') }}" autofocus required />
                </div>
                @error('nik')
                <div>
                    <div class="relative">
                        <input type="text" id="outlined_error" aria-describedby="outlined_error_help"
                            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 appearance-none dark:text-white dark:border-red-500 border-red-600 dark:focus:border-red-500 focus:outline-none focus:ring-0 focus:border-red-600 peer"
                            placeholder=" " />
                    </div>
                    <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                            class="font-medium">{{ $message }}</span></p>
                </div>
                @enderror
                <div class="mb-5">
                    <input type="text" id="alamat"
                        class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Alamat Anda" name="alamat" value="{{ old('alamat') }}" autofocus required />
                </div>
                @error('alamat')
                <div>
                    <div class="relative">
                        <input type="text" id="outlined_error" aria-describedby="outlined_error_help"
                            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 appearance-none dark:text-white dark:border-red-500 border-red-600 dark:focus:border-red-500 focus:outline-none focus:ring-0 focus:border-red-600 peer"
                            placeholder=" " />
                    </div>
                    <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                            class="font-medium">{{ $message }}</span></p>
                </div>
                @enderror
                <div class="mb-5">
                    <input type="number" id="no_telepon"
                        class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="No Telepon Anda" name="no_telepon" value="{{ old('no_telepon') }}" autofocus
                        required />
                </div>
                @error('no_telepon')
                <div>
                    <div class="relative">
                        <input type="text" id="outlined_error" aria-describedby="outlined_error_help"
                            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 appearance-none dark:text-white dark:border-red-500 border-red-600 dark:focus:border-red-500 focus:outline-none focus:ring-0 focus:border-red-600 peer"
                            placeholder=" " />
                    </div>
                    <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                            class="font-medium">{{ $message }}</span></p>
                </div>
                @enderror
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Riwayat
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
                            class="font-medium">{{ $message }}</span></p>
                </div>
                @enderror
                <label for="jenis_kelamin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                    Kelamin</label>
                <select id="jenis_kelamin" name="jenis_kelamin"
                    class="bg-gray-50 border border-blue-500 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="laki-laki">Laki-laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>
                @error('jenis_kelamin')
                <div>
                    <div class="relative">
                        <input type="text" id="outlined_error" aria-describedby="outlined_error_help"
                            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 appearance-none dark:text-white dark:border-red-500 border-red-600 dark:focus:border-red-500 focus:outline-none focus:ring-0 focus:border-red-600 peer"
                            placeholder=" " />
                    </div>
                    <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                            class="font-medium">{{ $message }}</span></p>
                </div>
                @enderror
                <div class="mb-5">
                    <h3 class="font-semibold text-gray-900 dark:text-white">Tanggal Lahir</h3>
                    <input type="date" id="tanggal_lahir"
                        class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Tanggal Lahir Anda" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                        autofocus required />
                </div>
                @error('tanggal_lahir')
                <div>
                    <div class="relative">
                        <input type="text" id="outlined_error" aria-describedby="outlined_error_help"
                            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 appearance-none dark:text-white dark:border-red-500 border-red-600 dark:focus:border-red-500 focus:outline-none focus:ring-0 focus:border-red-600 peer"
                            placeholder=" " />
                    </div>
                    <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                            class="font-medium">{{ $message }}</span></p>
                </div>
                @enderror
                <div class="flex items-start mb-5">
                    <span>Sudah memiliki akun ? <a href="/login" class="text-blue-500">
                            login</a></span>
                </div>
                <button type="submit"
                    class="px-[190px] py-2 text-sm font-medium text-gray-900 bg-transparent border border-[#183e9f] rounded-lg hover:bg-[#183e9f] hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">Daftar</button>
            </form>
        </div>
    </div>
</body>

</html>