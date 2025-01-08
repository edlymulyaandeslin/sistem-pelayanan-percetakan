<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Pesanan Dibuat</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>

    <body class="bg-gray-50 font-sans">
        @include('components.header')

        {{-- Content --}}
        <div class="min-h-screen flex items-center justify-center bg-gray-50">
            <div class="max-w-md bg-white rounded-lg shadow-lg p-6 text-center">
                <!-- Ikon Berhasil -->
                <div class="flex justify-center mb-4">
                    <svg class="w-16 h-16 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2l4-4m6 2a9 9 0 11-18 0a9 9 0 0118 0z" />
                    </svg>
                </div>

                <!-- Pesan Berhasil -->
                <h1 class="text-2xl font-semibold text-gray-800 mb-4">Pesanan Berhasil Dibuat!</h1>
                <p class="text-gray-600 mb-6">
                    Terima kasih telah membuat pesanan. Kami akan segera memprosesnya.
                </p>

                <p class="text-gray-600 mb-6">
                    Mohon Simpan Order ID dibawah ini untuk melacak status pesanan anda
                </p>
                <p class="text-gray-600 mb-6 font-bold text-2xl">
                    {{ $order_number }}
                </p>

                <!-- Tombol Aksi -->
                <div class="space-y-3">
                    <a href="/#services"
                        class="inline-block w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md">
                        Buat Pesanan Baru
                    </a>
                    <a href="/"
                        class="inline-block w-full bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-2 px-4 rounded-lg shadow-md">
                        Kembali ke Dashboard
                    </a>
                </div>
            </div>
        </div>

        @include('components.footer')
    </body>

</html>
