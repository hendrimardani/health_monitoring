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
        <div class="mt-[200px] border-2 border-[#183e9f] p-9 rounded-2xl w-[500px]">
            <form action=""  method="post">
                @csrf
                <h1 class="text-4xl font-bold mb-5 text-center">Masuk</h1>
                <div class="mb-5">
                    <input type="email" id="email"
                        class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Email Anda" autofocus required />
                </div>
                <div class="mb-5">
                    <input type="password" id="password"
                        class="border border-[#183e9f] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder=" Password Anda" required />
                </div>
                <div class="flex items-start mb-5">
                    <span>Belum memiliki akun ? daftar<a href="/register" class="text-blue-500">
                            disini</a></span>
                </div>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-[190px] py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Masuk</button>
            </form>
        </div>
    </div>
</body>

</html>