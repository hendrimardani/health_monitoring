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
<img id="inactiveImage" src="{{ asset('assets/demam-tifoid.png') }}" alt="Inactive Image"
    class="w-60 h-60 object-cover rounded-lg inactive ml-[1400px] mt-12" />
<div class="w-[1500px]">
    <div class="flex justify-around">
        <div class="ml-[-80px]">
            <h1 class="mt-[-130px] text-4xl text-white font-bold">Apa gejala yang kamu alami ?</h1>
            <h1 id="text1" class="text-lg mt-5">Infeksi Saluran Pernapasan Akut (ISPA)</h1>
            <h1 id="text2" class="text-lg">Demam Tifoid</h1>
            <h1 id="text3" class="text-lg">Diare</h1>
            <h1 id="text4" class="text-lg">Cacingan</h1>
            <h1 id="text5" class="text-lg">DBD</h1>
        </div>
        <div class="mr-[200px]">
            <div class="text-center mb-4 mt-[-230px]">
                <h1 id="textTitle" class="text-2xl font-bold text-blue-700">INFEKSI SALURAN PERNAPASAN AKUT (ISPA)</h1>
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

<!-- Blur Background -->
<div class="relative rounded-full bg-blue-400 w-[680px] h-[500px] blur-2xl opacity-80 mt-[-550px] ml-[-90px] -z-10">
</div>

<!-- Blur Background -->
<div class="relative rounded-full bg-blue-400 w-[680px] h-[500px] blur-2xl opacity-80 mt-[-400px] ml-[1600px] -z-10">
</div>

<!-- Blur Background -->
<div id="bg-blur-1"
    class="hidden relative rounded-full bg-red-500 w-[680px] h-[500px] blur-2xl opacity-80 mt-[-500px] ml-[-90px] -z-10">
</div>

<!-- Blur Background -->
<div id="bg-blur-2"
    class="hidden relative rounded-full bg-red-500 w-[680px] h-[500px] blur-2xl opacity-80 mt-[-500px] ml-[1200px] -z-10">
</div>

<script>
    const images = [
    "{{ asset('assets/ispa.png') }}",
    "{{ asset('assets/demam-tifoid.png') }}",
    "{{ asset('assets/diare.png') }}",
    "{{ asset('assets/cacingan.png') }}",
    "{{ asset('assets/dbd.png') }}"
];

const texts = [
    "text1", // ID for "Infeksi Saluran Pernapasan Akut (ISPA)"
    "text2", // ID for "Demam Tifoid"
    "text3", // ID for "Diare"
    "text4", // ID for "Cacingan" 
    "text5"  // ID for "DBD"
];

let currentIndex = 0;
const activeImage = document.getElementById("activeImage");
const inactiveImage = document.getElementById("inactiveImage");
const prev = document.getElementById("prev");
const next = document.getElementById("next");
const textTitle = document.getElementById("textTitle");
let autoplayInterval;

// Update images and texts
const updateContent = (direction) => {
    const inactiveIndex =
        direction === "next"
            ? (currentIndex + 1) % images.length
            : (currentIndex - 1 + images.length) % images.length;

    // Update inactive image animation
    inactiveImage.src = images[inactiveIndex];
    inactiveImage.classList.remove("translate-x-0");
    inactiveImage.classList.add(
        direction === "next" ? "translate-x-full" : "-translate-x-full",
        "transition-transform"
    );

    // Move active image out of view
    activeImage.classList.add(
        direction === "next" ? "-translate-x-full" : "translate-x-full",
        "transition-transform"
    );

    setTimeout(() => {
        // Update active image
        activeImage.src = images[currentIndex];
        activeImage.classList.remove("-translate-x-full", "translate-x-full");
        activeImage.classList.add("translate-x-0", "transition-transform");

        // Update inactive image position
        inactiveImage.classList.remove("translate-x-full", "-translate-x-full");
        inactiveImage.classList.add("translate-x-0");

        // Update text colors and title
        updateTextColors();
        updateTextTitle();
    }, 500); // Match animation duration
};

// Update text colors based on the current index
const updateTextColors = () => {
    texts.forEach((textId, index) => {
        const textElement = document.getElementById(textId);
        if (index === currentIndex) {
            textElement.style.color = "white"; // Active text
        } else {
            textElement.style.color = "black"; // Inactive text
        }
    });
};

// Update text title based on the current index
const updateTextTitle = () => {
    const activeTextId = texts[currentIndex];
    const activeTextElement = document.getElementById(activeTextId);
    if (activeTextElement) {
        textTitle.innerHTML = activeTextElement.innerHTML; // Copy content of active text
    }
    if (activeTextElement.innerHTML === "Demam Tifoid") {
        document.getElementById('bg-blur-1').classList.remove('hidden');
        document.getElementById('bg-blur-2').classList.remove('hidden');
    } else {
        document.getElementById('bg-blur-1').classList.add('hidden');
        document.getElementById('bg-blur-2').classList.add('hidden');
    }
};

// Next button functionality
next.addEventListener("click", () => {
    currentIndex = (currentIndex + 1) % images.length;
    updateContent("next");
    restartAutoplay();
});

// Previous button functionality
prev.addEventListener("click", () => {
    currentIndex = (currentIndex - 1 + images.length) % images.length;
    updateContent("prev");
    restartAutoplay();
});

// Autoplay functionality
const startAutoplay = () => {
    autoplayInterval = setInterval(() => {
        currentIndex = (currentIndex + 1) % images.length;
        updateContent("next");
    }, 3000); // Change every 3 seconds
};

const stopAutoplay = () => {
    clearInterval(autoplayInterval);
};

const restartAutoplay = () => {
    stopAutoplay();
    startAutoplay();
};

// Initialize on page load
window.addEventListener("DOMContentLoaded", () => {
    updateTextColors(); // Set initial text colors
    updateTextTitle(); // Set initial title
    startAutoplay();
});

</script>
@endsection