<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __(isset($album) ? 'Edit Album' : 'Tambah Album') }}
            </h2>
        </div>
    </x-slot>

    <form action="{{ $formAction ?? '' }}" method="POST" class="py-12">
        @csrf
        @method(isset($album) ? 'PUT' : 'POST')
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-5 rounded-lg shadow">
                <div class="mb-3">
                    <x-label for="nama_album" :value="__('Nama Album')" />
                    <x-input id="nama_album" class="block mt-1 w-full" type="text" name="nama_album" :value="old('nama_album', $album->nama_album ?? '')" required autofocus />
                </div>
                <div class="mb-3"> 
                    <x-label for="deskripsi" :value="__('Deskripsi')" />
                    <x-input id="deskripsi" class="block mt-1 w-full" type="text" name="deskripsi" :value="old('deskripsi', $album->deskripsi ?? '')" required autofocus />
                </div>
                <div class="mb-3">
                    <x-label for="tgl_dibuat" :value="__('Tanggal Dibuat')" />
                    <x-input id="tgl_dibuat" class="block mt-1 w-full" type="date" name="tgl_dibuat" :value="old('tgl_dibuat', $album->tgl_dibuat ?? '')" required autofocus />
                </div>
                <div class="pt-3">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Simpan
                    </button>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>
