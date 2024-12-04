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
        @else
        <a href="/dashboard/admin" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
        @endif
    </div>

    <nav class="text-white text-base font-semibold pt-3">
        @if (auth()->user()->role === 'pasien')
        <a href="/dashboard/pasien"
            class="flex items-center py-4 pl-6 nav-item {{ Request::is('dashboard/pasien') ? 'bg-blue-700 active-nav-link text-white' : 'opacity-75 hover:opacity-100' }}">
            <i class="fas fa-tachometer-alt mr-3 "></i>
            Dashboard
        </a>
        <a href="#"
            class="flex items-center py-4 pl-6 nav-item {{ Request::is('dashboard/akun-saya') ? 'bg-blue-700 active-nav-link text-white' : 'opacity-75 hover:opacity-100' }}">
            <i class="fas fa-sticky-note mr-3"></i>
            Akun Saya
        </a>
        <a href="/dashboard/riwayat"
            class="flex items-center py-4 pl-6 nav-item {{ Request::is('dashboard/riwayat') ? 'bg-blue-700 active-nav-link text-white' : 'opacity-75 hover:opacity-100' }}">
            <i class="fas fa-sticky-note mr-3"></i>
            Riwayat Saya
        </a>
        @elseif (auth()->user()->role === 'dokter')
        <a href="/dashboard/dokter"
            class="flex items-center py-4 pl-6 nav-item {{ Request::is('dashboard/dokter') ? 'bg-blue-700 active-nav-link text-white' : 'opacity-75 hover:opacity-100' }}">
            <i class="fas fa-tachometer-alt mr-3 "></i>
            Dashboard
        </a>
        <a href="#"
            class="flex items-center py-4 pl-6 nav-item {{ Request::is('dashboard/riwayat') ? 'bg-blue-700 active-nav-link text-white' : 'opacity-75 hover:opacity-100' }}">
            <i class="fas fa-sticky-note mr-3"></i>
            Pasien Anda
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