<!-- Desktop Header -->
<header class="w-full items-center bg-white py-2 px-6 hidden sm:flex">
    <h1 class="text-5xl text-[#183e9f]">Dashboard</h1>

    <div class="w-1/2"></div>
    <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
        <!-- Profile Picture Button -->
        <button @click="isOpen = !isOpen"
            class="relative z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
            <img src="https://source.unsplash.com/uJ8LNVCBjFQ/400x400" alt="Profile Picture">
        </button>

        <!-- Close Dropdown on Background Click -->
        <div x-show="isOpen" @click.away="isOpen = false"
            class="absolute w-32 bg-white rounded-lg shadow-lg py-2 mt-16 transition ease-out duration-200"
            x-transition:enter="transform transition ease-out duration-200"
            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transform transition ease-in duration-75"
            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">
            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-blue-500 hover:text-white">Akun Saya</a>
        </div>
    </div>
</header>