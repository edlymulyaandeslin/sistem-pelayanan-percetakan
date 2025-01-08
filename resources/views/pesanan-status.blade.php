<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Status Pesanan</title>

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
        <section class="py-16 bg-gray-50">
            <div class="container mx-auto max-w-3xl bg-white p-8 shadow-lg rounded-lg">
                <h1 class="text-2xl font-bold text-gray-800 text-center mb-6">Status Pesanan Anda</h1>

                {{-- Informasi Pesanan --}}
                @if ($order)
                    <div class="space-y-4">
                        <p><strong>Nomor Pesanan:</strong> <span class="text-gray-700">{{ $order->order_number }}</span>
                        </p>
                        <p><strong>Nama Customer:</strong> <span
                                class="text-gray-700">{{ $order->customer_name }}</span></p>
                        <p><strong>Nomor Telepon:</strong> <span
                                class="text-gray-700">{{ $order->customer_phone }}</span></p>
                        <p><strong>Status Pesanan:</strong>
                            <span class="text-blue-500 font-semibold">{{ $order->status }}</span>
                        </p>

                    </div>

                    {{-- Detail Produk --}}
                    <div class="mt-8">
                        <h2 class="text-lg font-bold text-gray-800 mb-4">Detail Produk</h2>
                        <div class="space-y-4">

                            <div class="border rounded-lg p-4 bg-gray-50">
                                <p><strong>Nama Produk:</strong> <span
                                        class="text-gray-700">{{ $order->product->name }}</span>
                                </p>
                                <p><strong>Harga:</strong> <span class="text-gray-700">Rp
                                        {{ number_format($order->product->price, 0) }}</span></p>
                                <p><strong>Jumlah:</strong> <span class="text-gray-700">1</span></p>
                                <p><strong>Subtotal:</strong> <span class="text-gray-700">Rp
                                        {{ number_format($order->product->price, 0) }}</span>
                                </p>
                            </div>

                        </div>
                    </div>
                @else
                    <div class="text-center">
                        <p class="text-red-500 font-semibold">Pesanan tidak ditemukan. Silakan cek kembali nomor pesanan
                            Anda.</p>
                    </div>
                @endif

                {{-- Tombol Kembali --}}
                <div class="mt-8 text-center">
                    <a href="/#cekpesanan"
                        class="inline-block bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-2 px-4 rounded-lg shadow-md">
                        Cek Pesanan Lain
                    </a>
                </div>
            </div>
        </section>

        @include('components.footer')
    </body>

</html>
