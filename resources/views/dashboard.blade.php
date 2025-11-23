<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            {{-- Welcome Section --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-2">Selamat Datang, {{ Auth::user()->name }}!</h3>
                    <p class="text-gray-600">Kelola produk Anda dengan mudah.</p>
                </div>
            </div>

            {{-- Statistics Grid --}}
            <div class="flex flex-row w-full gap-4 mb-2">
                
                {{-- Total Products --}}
                <div class="bg-white overflow-hidden w-full shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <p class="text-sm text-gray-600 mb-1">Total Produk</p>
                        <p class="text-3xl font-bold text-gray-900">{{ $totalProducts }}</p>
                    </div>
                </div>

                {{-- Total Stock --}}
                <div class="bg-white overflow-hidden w-full shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <p class="text-sm text-gray-600 mb-1">Total Stok</p>
                        <p class="text-3xl font-bold text-gray-900">{{ number_format($totalStock) }}</p>
                    </div>
                </div>

                {{-- Low Stock --}}
                <div class="bg-white overflow-hidden w-full shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <p class="text-sm text-gray-600 mb-1">Stok Menipis</p>
                        <p class="text-3xl font-bold text-yellow-600">{{ $lowStock }}</p>
                    </div>
                </div>

                {{-- Out of Stock --}}
                <div class="bg-white overflow-hidden w-full shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <p class="text-sm text-gray-600 mb-1">Habis Stok</p>
                        <p class="text-3xl font-bold text-red-600">{{ $outOfStock }}</p>
                    </div>
                </div>

            </div>

            {{-- Recent Products --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold">Produk Terbaru</h3>
                        <a href="{{ route('products.index') }}" class="text-sm text-amber-700 hover:text-amber-800 font-semibold">
                            Lihat Semua
                        </a>
                    </div>

                    @if($recentProducts->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama Produk</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Harga</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Stok</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($recentProducts as $product)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $product->name }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                Rp {{ number_format($product->price, 0, ',', '.') }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                                <span class="px-2 py-1 text-xs rounded 
                                                    {{ $product->stock > 10 ? 'bg-green-100 text-green-800' : ($product->stock > 0 ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                                    {{ $product->stock }} unit
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                                <a href="{{ route('products.show', $product) }}" class="text-blue-600 hover:underline mr-3">Detail</a>
                                                <a href="{{ route('products.edit', $product) }}" class="text-indigo-600 hover:underline">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-8">
                            <p class="text-gray-500 mb-4">Belum ada produk.</p>
                            <a href="{{ route('products.create') }}" class="inline-flex items-center px-4 py-2 bg-amber-300 border border-amber-300 rounded-md font-semibold text-xs text-gray-900 uppercase hover:bg-amber-400">
                                Tambah Produk
                            </a>
                        </div>
                    @endif

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
