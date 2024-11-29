@extends('layouts.main')

@section('container')

<div class="-mt-[200px]">
    <div class="flex justify-between mb-[300px]">
        <!-- Div pertama -->
        <div class="flex items-center justify-center ml-[200px] mt-20">
            <!-- Blur Background and Image -->
            <div class="relative flex items-center justify-center">
                <!-- Blur Background -->
                <div class="absolute rounded-full bg-[#183e9f] w-[700px] h-[700px] blur-2xl"></div>
                <!-- Centered Image -->
                <img src="{{ asset('assets/_(1000-x-1000-piksel)-1.png') }}"
                    class="relative z-10 w-[600px] h-[600px] object-cover rounded-full" />
            </div>
        </div>
        <!-- Div kedua -->
        <div class="mt-[450px] w-[800px]">
            <!-- Blur Background -->
            <div class="absolute rounded-full bg-[#183e9f] w-[700px] h-[700px] blur-2xl"></div>

            <!-- Text Content -->
            <div class="mt-[200px]">
                <p class="relative text-8xl font-black text-left text-black ml-[150px] z-10">WE ARE</p>
                <img src="{{ asset('assets/4-4.png') }}" class="relative z-10" />
                <p class="relative text-6xl font-black text-left text-black whitespace-nowrap z-10 mr-9">
                    READY TO HELP YOU
                </p>
            </div>
        </div>
    </div>
</div>

<div>
    <p class="text-5xl font-bold text-center text-black mb-12">
        TEMUI DOKTER-DOKTER <br>PROFESIONAL KAMI
    </p>
    <div class="flex flex-wrap justify-center gap-12">
        <!-- Card 1 -->
        <div class="flex flex-col items-center shadow-2xl shadow-blue-500/50 p-9 basis-1/8">
            <div class="relative">
                <!-- Shadow -->
                <div class="absolute inset-0 w-[335px] h-[335px] rounded-lg"></div>
                <!-- Gambar -->
                <img src="{{ asset('assets/_(1000-x-1000-piksel)-(1)-1.png') }}"
                    class="relative w-[335px] h-[335px] object-cover z-10" alt="Dr. Emma Williams" />
            </div>
            <p class="text-2xl font-bold text-center text-black mt-4">Dr. Emma Williams</p>
        </div>
        <!-- Card 2 -->
        <div class="flex flex-col items-center shadow-2xl shadow-blue-500/50 p-9 basis-1/8">
            <img src="{{ asset('assets/_(1000-x-1000-piksel)-(1)-2.png') }}" class="w-[335px] h-[335px] object-cover"
                alt="Dr. Alexander King" />
            <p class="text-2xl font-bold text-center text-black mt-4">Dr. Alexander King</p>
        </div>
        <!-- Card 3 -->
        <div class="flex flex-col items-center shadow-2xl shadow-blue-500/50 p-9 basis-1/8">
            <img src="{{ asset('assets/_(1000-x-1000-piksel)-(1)-3.png') }}" class="w-[335px] h-[335px] object-cover"
                alt="Dr. Mia Parker" />
            <p class="text-2xl font-bold text-center text-black mt-4">Dr. Mia Parker</p>
        </div>
        <!-- Card 4 -->
        <div class="flex flex-col items-center shadow-2xl shadow-blue-500/50 p-9 basis-1/8">
            <img src="{{ asset('assets/_(1000-x-1000-piksel)-(1)-4.png') }}" class="w-[335px] h-[335px] object-cover"
                alt="Dr. Liam Foste" />
            <p class="text-2xl font-bold text-center text-black mt-4">Dr. Amanda Davis</p>
        </div>
        <!-- Card 5 -->
        <div class="flex flex-col items-center shadow-2xl shadow-blue-500/50 p-9 basis-1/8">
            <img src="{{ asset('assets/_(1000-x-1000-piksel)-(1)-5.png') }}" class="w-[335px] h-[335px] object-cover"
                alt="Dr. Benjamin Reed" />
            <p class="text-2xl font-bold text-center text-black mt-4">Dr. Benjamin Reed</p>
        </div>
        <!-- Card 6 -->
        <div class="flex flex-col items-center shadow-2xl shadow-blue-500/50 p-9 basis-1/8">
            <img src="{{ asset('assets/_(1000-x-1000-piksel)-(1)-6.png') }}" class="w-[335px] h-[335px] object-cover"
                alt="Dr. Emily Smith" />
            <p class="text-2xl font-bold text-center text-black mt-4">Dr. Emily Smith</p>
        </div>
        <!-- Card 7 -->
        <div class="flex flex-col items-center shadow-2xl shadow-blue-500/50 p-9 basis-1/8">
            <img src="{{ asset('assets/_(1000-x-1000-piksel)-(1)-7.png') }}" class="w-[335px] h-[335px] object-cover"
                alt="Dr. Alexander King" />
            <p class="text-2xl font-bold text-center text-black mt-4">Dr. Alexander King</p>
        </div>
        <!-- Card 8 -->
        <div class="flex flex-col items-center shadow-2xl shadow-blue-500/50 p-9 basis-1/8">
            <img src="{{ asset('assets/_(1000-x-1000-piksel)-(1)-8.png') }}" class="w-[335px] h-[335px] object-cover"
                alt="Dr. Natalie Anderson" />
            <p class="text-2xl font-bold text-center text-black mt-4">Dr. Natalie Anderson</p>
        </div>
        <!-- Card 9 -->
        <div class="flex flex-col items-center shadow-2xl shadow-blue-500/50 p-9 basis-1/8">
            <img src="{{ asset('assets/_(1000-x-1000-piksel)-(1)-9.png') }}" class="w-[335px] h-[335px] object-cover"
                alt="Dr. John Wilson" />
            <p class="text-2xl font-bold text-center text-black mt-4">Dr. John Wilson</p>
        </div>
        <!-- Card 10 -->
        <div class="flex flex-col items-center shadow-lg shadow-blue-500/50 p-9 basis-1/8">
            <img src="{{ asset('assets/_(1000-x-1000-piksel)-(1)-10.png') }}" class="w-[335px] h-[335px] object-cover"
                alt="Dr. Anthony Hill" />
            <p class="text-2xl font-bold text-center text-black mt-4">Dr. Anthony Hill</p>
        </div>
        <!-- Card 11 -->
        <div class="flex flex-col items-center shadow-lg shadow-blue-500/50 p-9 basis-1/8">
            <img src="{{ asset('assets/_(1000-x-1000-piksel)-(1)-11.png') }}" class="w-[335px] h-[335px] object-cover"
                alt="Dr. Emma Williams" />
            <p class="text-2xl font-bold text-center text-black mt-4">Dr. Emma Williams</p>
        </div>
        <!-- Card 12 -->
        <div class="flex flex-col items-center shadow-lg shadow-blue-500/50 p-9 basis-1/8">
            <img src="{{ asset('assets/_(1000-x-1000-piksel)-(1)-12.png') }}" class="w-[335px] h-[335px] object-cover"
                alt="Dr. Liam Foste" />
            <p class="text-2xl font-bold text-center text-black mt-4">Dr. Liam Foste</p>
        </div>
    </div>
</div>

<div class="bg-[#183e9f] py-16 mt-[200px]">
    <!-- Text Content -->
    <div class="text-center text-white mb-10">
        <h1 class="text-4xl font-bold">TERBUKTI DENGAN ADANYA KAMI</h1>
        <h2 class="text-8xl font-bold mt-4">100.000 ORANG</h2>
        <p class="text-2xl font-bold mt-4">MENJADI SEHAT KEMBALI DENGAN BANTUAN DOKTER KAMI</p>
    </div>
    <!-- Carousel Container -->
    <div class="container mx-auto">
        <!-- Swiper -->
        <div class="swiper">
            <div class="swiper-wrapper">
                <!-- Slide 1 -->
                <div class="swiper-slide flex justify-center">
                    <img src="{{ asset('assets/tanya-(6)-2.png') }}" class="w-[368px] h-[97px]" alt="Image 1" />
                </div>
                <!-- Slide 2 -->
                <div class="swiper-slide flex justify-center">
                    <img src="{{ asset('assets/tanya-(6)-3.png') }}" class="w-[411px] h-[127px]" alt="Image 2" />
                </div>
                <!-- Slide 3 -->
                <div class="swiper-slide flex justify-center">
                    <img src="{{ asset('assets/tanya-(6)-4.png') }}" class="w-[411px] h-[127px]" alt="Image 3" />
                </div>
                <!-- Slide 4 -->
                <div class="swiper-slide flex justify-center">
                    <img src="{{ asset('assets/tanya-(6)-5.png') }}" class="w-[411px] h-[127px]" alt="Image 4" />
                </div>
                <!-- Slide 5 -->
                <div class="swiper-slide flex justify-center">
                    <img src="{{ asset('assets/tanya-(6)-6.png') }}" class="w-[411px] h-[127px]" alt="Image 5" />
                </div>
            </div>
        </div>
    </div>
</div>

<div>
    <h1 class="text-6xl font-bold text-center mt-[200px]">VISI & MISI KITA</h1>
    <div class="flex flex-wrap justify-around items-center">
        <div class="flex justify-center items-center">
            <h1 class="text-4xl font-bold">VISI</h1>
        </div>
        <div class="flex justify-center items-center">
            <h1 class="text-4xl font-bold">MISI</h1>
        </div>
    </div>
    <div class="flex flex-wrap justify-around items-center">
        <div class="flex justify-center items-center gap-8">
            <div class="bg-[#183e9f] p-9 -mt-[240px] rounded-lg w-[700px]">
                <h1 class="text-3xl text-white">
                    Menjadi platform kesehatan terdepan yang memberikan akses mudah dan cepat untuk
                    layanan kesehatan berkualitas, memberdayakan masyarakat untuk hidup lebih sehat dan lebih baik.
                </h1>
            </div>
            <div class="flex justify-center items-center">
                <div class="bg-[#183e9f] p-9 rounded-lg w-[700px]">
                    <h1 class="text-3xl text-white">
                        1. Memberikan Akses Kesehatan yang Mudah: Menyediakan layanan kesehatanyang
                        dapat diakses kapan saja dan di mana saja melalui teknologi digital. <br>
                        2. Meningkatkan Kesadaran Kesehatan: Mengedukasi masyarakat tentang pentingnya kesehatan dan
                        pencegahan melalui informasi yang terpercaya dan mudah dipahami. <br>
                        3. Menjamin Kualitas Layanan: Bekerja sama dengan dokter dan profesional medis berpengalaman
                        untuk memastikan setiap pengguna mendapatkan layanan terbaik.
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-wrap justify-center mt-[200px]">
        <div class="flex justify-center items-center">
            <img src="{{ asset('assets/2-2.png') }}" alt="">
        </div>
        <div class="flex justify-center items-center">
            <h1 class="text-4xl font-bold">Partnermu menuju kesembuhan</h1>
        </div>

    </div>
</div>

<script>
    // Initialize Swiper
        const swiper = new Swiper('.swiper', {
        loop: true,
        slidesPerView: 1,
        spaceBetween: 20,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        });
</script>
@endsection