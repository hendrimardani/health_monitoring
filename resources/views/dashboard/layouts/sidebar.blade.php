<sidebar class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl bg-[#183e9f]">
    <div class="mx-9">
        <a href="/dashboard" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
        <button
            class="w-full bg-white cta-btn font-semibold mt-5 rounded-xl shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
            <i class="fas fa-plus ml-[25px]"></i><span class="mr-2">Tambah Riwayat</span>
        </button>
    </div>
    <nav class="text-white text-base font-semibold pt-3">
        <a href="/dashboard"
            class="flex items-center py-4 pl-6 nav-item {{ Request::is('dashboard') ? 'bg-blue-700 active-nav-link text-white' : 'opacity-75 hover:opacity-100' }}">
            <i class="fas fa-tachometer-alt mr-3 "></i>
            Dashboard
        </a>
        <a href="/dashboard/riwayat-saya"
            class="flex items-center py-4 pl-6 nav-item {{ Request::is('dashboard/riwayat-saya') ? 'bg-blue-700 active-nav-link text-white' : 'opacity-75 hover:opacity-100' }}">
            <i class="fas fa-sticky-note mr-3"></i>
            Riwayat Saya
        </a>
    </nav>
    <a href="#"
        class="bg-white absolute w-full upgrade-btn bottom-0 active-nav-link text-red-900 font-bold flex items-center justify-center py-4 hover:bg-gray-300">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left"
            viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z" />
            <path fill-rule="evenodd"
                d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z" />
        </svg>
        <span class="ml-2">Keluar Akun</span>
    </a>
</sidebar>