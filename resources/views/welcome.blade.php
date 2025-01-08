<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sistem Layanan Percetakan</title>

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

        <!-- Hero Section -->
        <section class="bg-gradient-to-r from-blue-500 to-green-400 text-white">
            <div class="container mx-auto text-center py-20 px-6">
                <h1 class="text-4xl font-bold mb-4">Solusi Cetak Mudah dan Cepat</h1>
                <p class="text-lg mb-6">Kami menyediakan layanan percetakan berkualitas untuk kebutuhan Anda.</p>
                <a href="#services" class="bg-white text-blue-500 px-6 py-3 rounded-full shadow-md hover:bg-gray-100">
                    Pesan Sekarang
                </a>
            </div>
        </section>

        <!-- Layanan -->
        <section id="services" class="py-16 bg-gray-50">
            <div class="container mx-auto text-center">
                <h2 class="text-3xl font-bold text-gray-800 mb-8">Layanan Kami</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach ($products as $product)
                        <div class="bg-white p-6 shadow-md rounded-md flex flex-col justify-between">
                            <div>
                                <h3 class="text-xl font-bold text-blue-600 mb-4">{{ $product->name }}</h3>
                                <p class="text-gray-600">{{ $product->deskripsi }}</p>
                                <span class="text-lg font-bold">Rp{{ number_format($product->price, 2) }}</span>
                            </div>
                            <div class="mt-10">
                                <a href="/pesan/{{ $product->id }}" class="px-4 py-2 bg-yellow-400 rounded-lg">Pesan
                                    Sekarang</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Cek Pesanan -->
        <section id="cekpesanan" class="py-16 bg-gray-50">
            <div class="container mx-auto text-center">
                <h2 class="text-3xl font-bold text-gray-800 mb-8">Cek Status Pesanan</h2>

                <!-- Form Cek Pesanan -->
                <div class="max-w-md mx-auto bg-white p-8 shadow-lg rounded-lg">
                    <form action="{{ route('pesanan.status') }}" method="POST">
                        @csrf

                        <!-- Input Kode Pesanan -->
                        <div class="mb-6">
                            <label for="order_number" class="block text-sm font-medium text-gray-700 mb-2">
                                Masukkan Kode Pesanan
                            </label>
                            <input type="text" id="order_number" name="order_number"
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent shadow-sm"
                                placeholder="Contoh: ORD-12345" required>
                        </div>

                        <!-- Tombol Cek -->
                        <div>
                            <button type="submit"
                                class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 rounded-lg shadow-lg transition">
                                Cek Pesanan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <!-- Testimoni -->
        <section id="testimonials" class="py-16 bg-gray-100">
            <div class="container mx-auto text-center">
                <h2 class="text-3xl font-bold text-gray-800 mb-8">Apa Kata Pelanggan Kami</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-white p-6 shadow-md rounded-md">
                        <p class="text-gray-600 italic">"Layanan sangat cepat dan hasil cetaknya berkualitas tinggi!"
                        </p>
                        <h4 class="mt-4 font-bold text-blue-600">- Andi</h4>
                    </div>
                    <div class="bg-white p-6 shadow-md rounded-md">
                        <p class="text-gray-600 italic">"Pesan banner untuk acara, hasilnya sangat memuaskan."</p>
                        <h4 class="mt-4 font-bold text-blue-600">- Rina</h4>
                    </div>
                    <div class="bg-white p-6 shadow-md rounded-md">
                        <p class="text-gray-600 italic">"Pelayanan ramah dan prosesnya sangat mudah."</p>
                        <h4 class="mt-4 font-bold text-blue-600">- Budi</h4>
                    </div>
                </div>
            </div>
        </section>

        @include('components.footer')
    </body>

</html>
