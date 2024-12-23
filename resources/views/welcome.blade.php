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

<body class="overflow-clip">
  <div>
    <img src="{{ asset('assets/2-2.png') }}" alt="" class="w-[300px] mx-auto mb-20">
  </div>
  <!-- Blur Background -->
  <div class="overflow-x-clip">
    <div class="rounded-full bg-[#183e9f] w-[700px] h-[700px] blur-2xl -mt-[200px] -ml-[200px] opacity-80">
    </div>
  </div>
  <!-- Blur Background -->
  <div class="overflow-x-clip">
    <div class="rounded-full bg-[#183e9f] w-[700px] h-[700px] blur-2xl -mt-[200px] ml-[80px] opacity-80">
    </div>
  </div>
  <!-- Blur Background -->
  <div class="overflow-x-clip">
    <div class="rounded-full bg-[#183e9f] w-[700px] h-[700px] blur-2xl -mt-[800px] ml-[1400px] opacity-80">
    </div>
  </div>
  <!-- Blur Background -->
  <div class="overflow-x-clip">
    <div class="rounded-full bg-[#183e9f] w-[700px] h-[700px] blur-2xl -mt-[800px] ml-[1000px] opacity-80">
    </div>
  </div>
  <div class="relative">
    <img src="{{ asset('assets/tanya-1.png') }}" alt="" class="w-[650px] -mt-[850px] mx-auto">
  </div>
  <div class="relative ml-[100px] -mt-[700px]">
    <h1 class="text-6xl text-white w-[400px] font-bold">Kesehatan Anda adalah prioritas kami.</h1>
  </div>

  <div class="relative ml-[1300px] mt-[120px]">
    <h1 class="text-6xl text-white w-[600px] font-bold">Bersiaplah untuk memonitor kesehatan Anda dengan cara yang lebih
      mudah, cepat, dan terpercaya. iHealth hadir untuk Anda.</h1>
  </div>
  <div class="relative -mt-[50px] text-center">
    <a href="/login"
      class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-blue-500 to-blue-800 group-hover:from-blue-100 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
      <span
        class="relative px-[150px] py-2.5 transition-all ease-in duration500 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0 text-4xl">
        Mari Mulai
      </span>
    </a>
  </div>
</body>

</html>