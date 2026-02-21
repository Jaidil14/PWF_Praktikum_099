<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tugas Praktikum 1</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <script src="https://cdn.tailwindcss.com"></script>
        @endif
    </head>
    <body class="bg-[#0a0a0a] text-white flex items-center justify-center min-h-screen">
        
        <div class="bg-[#161615] p-10 rounded-xl shadow-2xl border border-[#3E3E3A] w-full max-w-md">
            <div class="space-y-2">
                <h1 class="text-xl font-semibold text-[#EDEDEC]">Jaidil Rachmad Ladam</h1>
                <p class="text-[#A1A09A] text-sm">2023014009</p>
                
                <div class="pt-4">
                    <button class="bg-white text-black px-4 py-2 rounded-md font-medium hover:bg-gray-200 transition-colors">
                        Modul Pertemuan 1
                    </button>
                </div>
            </div>
        </div>

    </body>
</html>