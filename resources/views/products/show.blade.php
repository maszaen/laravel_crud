<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Produk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    {{-- Product Details --}}
                    <div class="space-y-6">
                        
                        {{-- Nama Produk --}}
                        <div class="border-b pb-4">
                            <label class="block text-sm font-medium text-gray-500 mb-2">
                                Nama Produk
                            </label>
                            <p class="text-lg font-semibold text-gray-900">
                                {{ $product->name }}
                            </p>
                        </div>

                        {{-- Harga --}}
                        <div class="border-b pb-4">
                            <label class="block text-sm font-medium text-gray-500 mb-2">
                                Harga
                            </label>
                            <p class="text-lg font-semibold text-gray-900">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </p>
                        </div>

                        {{-- Stok --}}
                        <div class="border-b pb-4">
                            <label class="block text-sm font-medium text-gray-500 mb-2">
                                Stok
                            </label>
                            <p class="text-lg font-semibold">
                                <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full 
                                    {{ $product->stock > 10 ? 'bg-green-100 text-green-800' : ($product->stock > 0 ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                    {{ $product->stock }} unit
                                </span>
                            </p>
                        </div>

                        {{-- Timestamps --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <label class="block text-sm font-medium text-gray-500 mb-1">
                                    Dibuat pada
                                </label>
                                <p class="text-sm text-gray-900">
                                    {{ $product->created_at->format('d F Y') }}
                                </p>
                                <p class="text-xs text-gray-500">
                                    {{ $product->created_at->format('H:i') }} WIB
                                </p>
                            </div>

                            <div class="bg-gray-50 p-4 rounded-lg">
                                <label class="block text-sm font-medium text-gray-500 mb-1">
                                    Terakhir diupdate
                                </label>
                                <p class="text-sm text-gray-900">
                                    {{ $product->updated_at->format('d F Y') }}
                                </p>
                                <p class="text-xs text-gray-500">
                                    {{ $product->updated_at->format('H:i') }} WIB
                                </p>
                            </div>
                        </div>

                    </div>

                    {{-- Action Buttons --}}
                    <div class="flex items-center justify-between mt-8 pt-6 border-t">
                        @php
                            $previous = url()->previous();
                            $backUrl = str_contains($previous, route('dashboard')) ? route('dashboard') : route('products.index');
                        @endphp
                        <a href="{{ $backUrl }}" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-gray-300 rounded-md font-semibold text-xs text-gray-900 uppercase tracking-widest hover:bg-gray-300 focus:bg-gray-300 active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 transition ease-in-out duration-150">
                            Kembali
                        </a>
                        
                        <div class="flex space-x-3">
                            <a href="{{ route('products.edit', $product) }}" class="inline-flex items-center px-4 py-2 bg-amber-300 border border-amber-300 rounded-md font-semibold text-xs text-gray-900 uppercase tracking-widest hover:bg-amber-400 focus:bg-amber-400 active:bg-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Edit
                            </a>
                            
                            <form action="{{ route('products.destroy', $product) }}" 
                                  method="POST" 
                                  class="inline-block"
                                  onsubmit="return confirm('Yakin ingin menghapus produk {{ $product->name }}?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="inline-flex items-center px-4 py-2 bg-red-100 border border-red-300 rounded-md font-semibold text-xs text-red-800 uppercase tracking-widest hover:bg-red-200 focus:bg-red-200 active:bg-red-300 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-offset-2 transition ease-in-out duration-150">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
