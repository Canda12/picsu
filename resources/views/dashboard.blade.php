<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Selamat Datang di Aplikasi Galeri Foto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach ($fotos as $foto)
                            <div class="bg-white border p-4 rounded-lg">
                                <img src="{{ Storage::url($foto->image) }}" alt="Image 1" class="w-full h-40 object-cover rounded">
                                <div class="mx-1 font-bold">{{ $foto->judul_foto }}</div>
                                <div class="mx-1">{{ $foto->deskripsi_foto }}</div>
                            </div>
                        @endforeach 
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>