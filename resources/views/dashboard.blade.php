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
                            <a href="{{ route('foto.show', ['foto' => $foto]) }}">
                                <div class="bg-white border p-4 rounded-lg">
                                    <img src="{{ Storage::url($foto->image) }}" alt="Image 1" class="w-full h-40 object-cover rounded">
                                    <div class="mx-1 font-bold">{{ $foto->judul_foto }}</div>
                                    <div class="mx-1">{{ $foto->deskripsi_foto }}</div>
                                    <div class="mx-1">{{ $foto->tgl_unggah }}</div>
                                    
                                    <div class="flex justify-content-md-end mt-3">
                                        <div>
                                            <a href="{{ route('foto.like', ['foto' => $foto]) }}" class="btn bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" type="submit">
                                                <div class="flex items-center">
                                                    <div>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                                            <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                                                        </svg>
                                                    </div>
                                                    <div class="ml-2">
                                                        <span id="likeCount">{{ $foto->likes()->count() }}</span> 
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="ml-2">
                                            <button class="btn bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="button">
                                                <div class="flex items-center">
                                                    <div>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-heart" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd" d="M2.965 12.695a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6-3.004 6-7 6a8 8 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a11 11 0 0 0 .398-2m-.8 3.108.02-.004c1.83-.363 2.948-.842 3.468-1.105A9 9 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.4 10.4 0 0 1-.524 2.318l-.003.011a11 11 0 0 1-.244.637c-.079.186.074.394.273.362a22 22 0 0 0 .693-.125M8 5.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132"/>
                                                        </svg>
                                                    </div>
                                                    <div class="ml-2">
                                                        <span id="likeCount">10</span> 
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach 
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
