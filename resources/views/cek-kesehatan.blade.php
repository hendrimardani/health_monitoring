@extends('layouts.main')

@section('container')
<style>
    .translate-x-full {
        transform: translate(-100%, 100%);
    }

    .-translate-x-full {
        transform: translateY(0);
    }

    .translate-x-0 {
        transform: translateY(0);
    }

    .transition-transform {
        transition: transform 0.5s ease-in-out;
    }
</style>

<!-- Inactive Image -->
<img id="inactiveImage" src="https://i.ibb.co/J2xj9zb/ispa2.png" alt="Inactive Image"
    class="w-60 h-60 object-cover rounded-lg inactive ml-[1400px] mt-12" />
<div class="w-[1500px] border border-blue-400">
    <div class="flex justify-around">
        <h1 class="mt-[-130px] ml-[-80px] text-4xl">Apa gejala yang kamu alami ?</h1>

        <div class="mr-[200px]">
            <div class="text-center mb-4 mt-[-230px]">
                <h1 class="text-lg font-bold text-blue-700">INFEKSI SALURAN PERNAPASAN AKUT (ISPA)</h1>
            </div>
            <!-- Active Image -->
            <img id="activeImage" src="{{ asset('assets/ispa.png') }}" alt="Active Image" width="430" height="430"
                class="object-cover rounded-lg fade-active" />
            <!-- Navigation Arrows Below -->
            <div class="flex justify-center gap-8 mt-6">
                <button id="prev" class="bg-blue-600 text-white p-3 rounded-full shadow-lg">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 12h14M5 12l4-4m-4 4 4 4" />
                    </svg>
                </button>
                <button id="next" class="bg-blue-600 text-white p-3 rounded-full shadow-lg">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 12H5m14 0-4 4m4-4-4-4" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

</div>

<script>
    const images = [
    "{{ asset('assets/ispa.png') }}",
    "{{ asset('assets/demam-tifoid.png') }}",
    "{{ asset('assets/diare.png') }}",
    "{{ asset('assets/cacingan.png') }}",
    "{{ asset('assets/dbd.png') }}"
];

let currentIndex = 0;
const activeImage = document.getElementById("activeImage");
const inactiveImage = document.getElementById("inactiveImage");
const prev = document.getElementById("prev");
const next = document.getElementById("next");
let autoplayInterval;

// Update images with drag-and-drop animation
const updateImages = (direction) => {
    const inactiveIndex =
        direction === "next"
            ? (currentIndex + 1) % images.length
            : (currentIndex - 1 + images.length) % images.length;

    // Apply drag-and-drop animation
    inactiveImage.src = images[inactiveIndex];
    inactiveImage.classList.remove("translate-x-0");
    inactiveImage.classList.add(direction === "next" ? "translate-x-full" : "-translate-x-full", "transition-transform");

    // Move active image out of view
    activeImage.classList.add(direction === "next" ? "-translate-x-full" : "translate-x-full", "transition-transform");

    setTimeout(() => {
        // Swap images
        activeImage.src = images[currentIndex];
        activeImage.classList.remove("-translate-x-full", "translate-x-full");
        activeImage.classList.add("translate-x-0", "transition-transform");

        inactiveImage.classList.remove("translate-x-full", "-translate-x-full");
        inactiveImage.classList.add("translate-x-0");
    }, 500); // Match animation duration
};

// Next button functionality
next.addEventListener("click", () => {
    currentIndex = (currentIndex + 1) % images.length;
    updateImages("next");
    restartAutoplay();
});

// Previous button functionality
prev.addEventListener("click", () => {
    currentIndex = (currentIndex - 1 + images.length) % images.length;
    updateImages("prev");
    restartAutoplay();
});

// Autoplay functionality
const startAutoplay = () => {
    autoplayInterval = setInterval(() => {
        currentIndex = (currentIndex + 1) % images.length;
        updateImages("next");
    }, 3000); // Change image every 3 seconds
};

const stopAutoplay = () => {
    clearInterval(autoplayInterval);
};

const restartAutoplay = () => {
    stopAutoplay();
    startAutoplay();
};

// Start autoplay on page load
window.addEventListener("DOMContentLoaded", startAutoplay);

</script>

@endsection