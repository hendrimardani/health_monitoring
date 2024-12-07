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
        @if (auth()->user()->role === 'pasien')
        <a href="/dashboard/pasien" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Pasien</a>
        @elseif (auth()->user()->role === 'dokter')
        <a href="/dashboard/dokter" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Dokter</a>
        @elseif (auth()->user()->role === 'admin')
        <a href="/dashboard/admin" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
        @endif
    </div>

    <nav class="text-white text-base font-semibold pt-3">
        {{-- dashboard pasien --}}
        @if (auth()->user()->role === 'pasien')
        <a href="/dashboard/pasien"
            class="flex items-center py-4 pl-6 nav-item {{ Request::is('dashboard/pasien') ? 'bg-blue-700 active-nav-link text-white' : 'opacity-75 hover:opacity-100' }}">
            <i class="fas fa-tachometer-alt mr-3 "></i>
            Dashboard
        </a>
        <a href="/dashboard/pasien/akun"
            class="flex items-center py-4 pl-6 nav-item {{ Request::is('dashboard/akun-saya') ? 'bg-blue-700 active-nav-link text-white' : 'opacity-75 hover:opacity-100' }}">
            <i class="fas fa-sticky-note mr-3"></i>
            Akun Saya
        </a>
        <a href="/dashboard/pasien/riwayat"
            class="flex items-center py-4 pl-6 nav-item {{ Request::is('dashboard/pasien/riwayat') ? 'bg-blue-700 active-nav-link text-white' : 'opacity-75 hover:opacity-100' }}">
            <i class="fas fa-sticky-note mr-3"></i>
            Riwayat Saya
        </a>
        {{-- dashboard dokter --}}
        @elseif (auth()->user()->role === 'dokter')
        <a href="/dashboard/dokter"
            class="flex items-center py-4 pl-6 nav-item {{ Request::is('dashboard/dokter') ? 'bg-blue-700 active-nav-link text-white' : 'opacity-75 hover:opacity-100' }}">
            <i class="fas fa-tachometer-alt mr-3 "></i>
            Dashboard
        </a>
        <a href="/dashboard/dokter/pasien"
            class="flex items-center py-4 pl-6 nav-item {{ Request::is('dashboard/dokter/pasien') ? 'bg-blue-700 active-nav-link text-white' : 'opacity-75 hover:opacity-100' }}">
            <i class="fas fa-sticky-note mr-3"></i>
            Pasien Anda
        </a>
        {{-- dashboard admin --}}
        @elseif (auth()->user()->role === 'admin')
        <a href="/dashboard/admin"
            class="flex items-center py-4 pl-6 nav-item {{ Request::is('dashboard/admin') ? 'bg-blue-700 active-nav-link text-white' : 'opacity-75 hover:opacity-100' }}">
            <i class="fas fa-tachometer-alt mr-3 "></i>
            Dashboard
        </a>
        <a href="/dashboard/admin/farmasi"
            class="flex items-center py-4 pl-6 nav-item {{ Request::is('dashboard/admin/farmasi*') ? 'bg-blue-700 active-nav-link text-white' : 'opacity-75 hover:opacity-100' }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-building mr-3" viewBox="0 0 16 16">
                <path
                    d="M4 2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zM4 5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zM7.5 5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zM4.5 8a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5z" />
                <path
                    d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1zm11 0H3v14h3v-2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5V15h3z" />
            </svg> Farmasi
        </a>
        <a href="/dashboard/admin/obat"
            class="flex items-center py-4 pl-6 nav-item {{ Request::is('dashboard/admin/obat*') ? 'bg-blue-700 active-nav-link text-white' : 'opacity-75 hover:opacity-100' }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-capsule mr-3" viewBox="0 0 16 16">
                <path
                    d="M1.828 8.9 8.9 1.827a4 4 0 1 1 5.657 5.657l-7.07 7.071A4 4 0 1 1 1.827 8.9Zm9.128.771 2.893-2.893a3 3 0 1 0-4.243-4.242L6.713 5.429z" />
            </svg>
            Obat
        </a>
        <a href="/dashboard/admin/user"
            class="flex items-center py-4 pl-6 nav-item {{ Request::is('dashboard/admin/user*') ? 'bg-blue-700 active-nav-link text-white' : 'opacity-75 hover:opacity-100' }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people mr-3"
                viewBox="0 0 16 16">
                <path
                    d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4" />
            </svg>
            User
        </a>
        @endif
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