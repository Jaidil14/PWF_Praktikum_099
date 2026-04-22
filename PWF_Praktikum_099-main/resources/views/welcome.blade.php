<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Selamat Datang - Tugas Praktikum</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-[#0a0a0a] text-white flex items-center justify-center min-h-screen">
        
        <div class="bg-[#161615] p-10 rounded-xl shadow-2xl border border-[#3E3E3A] w-full max-w-md text-center">
            <div class="space-y-6">
                </div>

                <div class="space-y-2">
                    <h1 class="text-2xl font-bold text-[#EDEDEC]"></h1>
                    <p class="text-[#A1A09A] text-sm">Silakan masuk atau daftar terlebih dahulu</p>
                </div>
                
                <div class="grid grid-cols-2 gap-4 pt-8">
    @if (Route::has('login'))
        @auth
            <a href="{{ url('/dashboard') }}" class="col-span-2 bg-white text-black px-4 py-2 rounded-md font-medium hover:bg-gray-200 transition-colors text-center">
                Masuk ke Dashboard
            </a>
        @else
            <a href="{{ route('login') }}" class="bg-white text-black px-4 py-2 rounded-md font-medium hover:bg-gray-200 transition-colors text-center">
                Login
            </a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="border border-[#3E3E3A] text-white px-4 py-2 rounded-md font-medium hover:bg-[#262624] transition-colors text-center">
                    Register
                </a>
            @endif
        @endauth
    @endif
</div>

                <div class="pt-10 border-t border-[#3E3E3A]">
                    <p class="text-xs text-[#6B6B67]">Tugas Praktikum PWF - 2026</p>
                </div>
            </div>
        </div>

    </body>
</html>