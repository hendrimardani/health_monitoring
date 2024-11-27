<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Selamat Datang</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <div class="w-full">
    <p class="w-[333px] h-44 absolute left-[1500px] top-[340px] text-4xl font-bold text-left text-black">
      Selamat datang, Dok! Mari bersama jaga kesehatan pasien.
    </p>
    <div class="w-[709px] h-[822px]">
      <p class="w-[365px] h-44 absolute left-[35px] top-[334px] text-4xl font-bold text-right text-black">
        Halo, Dok! Terima kasih telah bergabung dengan iHealth.
      </p>
    </div>
    <img src="{{ asset('assets/Ellipse-3.png') }}" alt="" class="absolute z-4 top-10">
    <img src="{{ asset('assets/2-1.png') }}" class="w-[341px] h-24 absolute left-[800px] top-[30px] object-none">
    <img src="{{ asset('assets/tanya-1.png') }}" class="w-[600px] h-[600px] absolute left-[700px] top-[155px] object-cover">
    <img src="{{ asset('assets/Ellipse-3.png') }}" alt="" class="absolute z-4 top-10 left-[1000px]" style="transform: scaleX(-1);">
    <div class="aboslute left-0 top-0">
    <a href="/home" 
      class="relative ml-[830px] text-[40px] inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-blue-500 to-blue-900 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
      <span class="relative text-4xl text-blue-500 px-14 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0    hover:text-white">
        Get Started
      </span>
    </a>      
    </div>
  </div>
</body>
</html>