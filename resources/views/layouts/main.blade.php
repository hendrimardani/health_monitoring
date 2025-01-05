<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    {{-- Tailwindcss --}}
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- Swipper --}}
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- AOS JavaScript -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <style>
        // Animasi kata
        .fade-in {
            animation: fadeIn 1s ease-in-out forwards;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        // Animasi cek-kesehatan
        .fade-enter {
            opacity: 0;
            transform: scale(0.9);
        }

        .fade-active {
            transition: all 0.3s ease-in-out;
            opacity: 1;
            transform: scale(1);
        }

        .inactive {
            filter: grayscale(100%);
            opacity: 0.5;
        }

        /* Animasi Transisi */
        .fade-enter {
            opacity: 0;
            transform: scale(0.9);
        }

        .fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }

        .fade-out {
            animation: fadeOut 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes fadeOut {
            from {
                opacity: 1;
                transform: scale(1);
            }

            to {
                opacity: 0;
                transform: scale(0.9);
            }
        }
    </style>
</head>

<body>

    {{-- Navbar --}}
    @include('partials.navbar')

    <div class="max-w-screen-full">
        @yield('container')
    </div>

    {{-- Footer --}}
    @include('partials.footer')

</body>

</html>