<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Buat Pesanan</title>

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
        <div class="container mx-auto py-16 px-6">
            <div class="max-w-lg mx-auto">
                <!-- Judul Halaman -->
                <h1 class="text-4xl font-extrabold text-gray-800 text-center mb-8">Buat Pesanan</h1>

                <!-- Card Form -->
                <div class="bg-white shadow-lg rounded-lg p-8">
                    <form action="/pesan/{{ $product->id }}" method="POST">
                        @csrf

                        <!-- Nama Customer -->
                        <div class="mb-6">
                            <label for="customer_name" class="block text-sm font-medium text-gray-700 mb-2">
                                Nama Customer <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="customer_name" name="customer_name"
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent shadow-sm"
                                placeholder="Masukkan nama customer" required>
                        </div>

                        <!-- Nomor Telepon -->
                        <div class="mb-6">
                            <label for="customer_phone" class="block text-sm font-medium text-gray-700 mb-2">
                                Nomor Telepon <span class="text-red-500">*</span>
                            </label>
                            <input type="tel" id="customer_phone" name="customer_phone"
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent shadow-sm"
                                placeholder="Masukkan nomor telepon" required>
                        </div>

                        <div class="mb-6">
                            <label for="phone_number" class="block text-sm font-medium text-gray-700 mb-2">
                                Pesan Produk<span class="text-red-500">*</span>
                            </label>
                            <div class="flex justify-between">
                                <span>Product name: </span>
                                <span>{{ $product->name }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Quantity: </span>
                                <span>1</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Price: </span>
                                <span>{{ number_format($product->price, 2) }}</span>
                            </div>
                        </div>

                        <!-- Tombol Submit -->
                        <div>
                            <button type="submit"
                                class="w-full bg-blue-500 text-white font-semibold py-3 rounded-lg shadow-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-1 transition">
                                Buat Pesanan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @include('components.footer')
    </body>

</html>
