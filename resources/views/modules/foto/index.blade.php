<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Foto') }}
            </h2>
            <div>
                <a href="{{ route('foto.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">
                    Tambah Foto
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach ($fotos as $foto)
                            <a href="{{ route('foto.show', ['foto' => $foto]) }}">
                                <div class="bg-gray-200 p-4 rounded-lg">
                                    <img src="{{ Storage::url($foto->image) }}" alt="Image 1" class="w-full h-40 object-cover rounded">
                                    <small>{{ $foto->judul_foto}}</small>
                                    <p>{{ $foto->deskripsi_foto }}</p>
                                    <small>{{ $foto->tgl_unggah }}</small>
                                </div>
                            </a>
                        @endforeach 
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
