<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Selamat Datang di Aplikasi Galeri Foto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-bold mb-3">DAFTAR ALBUM ({{ $albums->count() }} Album)</h1>
                    <div class="mb-5">
                        @if (request()->album_id)
                            <a href="{{ route('dashboard') }}" class="bg-green-700 font-bold p-1 rounded-lg text-sm shadow text-white">SEMUA FOTO</a>
                        @endif    
                        @foreach ($albums as $album)
                            <a href="{{ route('dashboard', ['album_id' => $album->id]) }}" class="bg-red-700 font-bold p-1 rounded-lg text-sm shadow text-white"># {{ $album->nama_album }} ({{ $album->fotos()->count() }} Foto)</a>
                        @endforeach
                    </div>
                    <h1 class="text-2xl font-bold mb-3">SEMUA UNGGAHAN FOTO ({{ $fotos->count() }} Foto)</h1>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach ($fotos as $foto)
                            <a href="{{ route('foto.show', ['foto' => $foto]) }}">
                                <div class="bg-white border p-4 rounded-lg">
                                    <img src="{{ Storage::url($foto->image) }}" alt="Image 1" class="w-full h-40 object-cover rounded">
                                    <div class="mx-1 mt-2 font-bold text-lg text-green-700">{{ $foto->judul_foto }}</div>
                                    <div class="mx-1 text-gray-400 text-sm">Ditambahkan oleh <span class="font-bold">{{ $foto->user->name }}</span> <br/> pada {{ $foto->created_at }}</div>
                                    <span class="bg-gray-600 p-1 text-white rounded text-sm inline-block my-2">{{ $foto->album->name }}</span>
                                    <div class="mx-1 mt-2 text-gray-600">{{ $foto->deskripsi_foto }}</div>
                                </div>
                            </a>
                        @endforeach 
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
