<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __(isset($foto) ? 'Edit Foto' : 'Tambah Foto') }}
            </h2>
        </div>
    </x-slot>

    <form action="{{ $formAction ?? '' }}" method="POST" class="py-12" enctype="multipart/form-data">
        @csrf
        @method(isset($foto) ? 'PUT' : 'POST')
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-5 rounded-lg shadow">
                <div class="mb-5">
                    <x-label for="judul_foto" :value="__('Judul Foto')" />
                    <x-input id="judul_foto" class="block mt-1 w-full" type="text" name="judul_foto" :value="old('judul_foto', $foto->judul_foto ?? '')" required autofocus />
                </div>
                <div class="mb-5">
                    <x-label for="album_id" :value="__('Pilih Nama Album')" />
                    <select name="album_id" id="album_id" class="block mt-1 w-full bg-slate-50 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">-- Pilih Album --</option>
                        @foreach ($albums as $album)
                            <option value="{{ $album->id }}" {{ $album->id == ($foto->album_id ?? '') ? 'selected' : '' }}>{{$album->nama_album }}</option>
                        @endforeach 
                    </select>
                </div>
                <div class="mb-5">
                    <x-label for="deskripsi_foto" :value="__('Deskripsi Foto')" />
                    <textarea name="deskripsi_foto" id="deskripsi_foto" class="block mt-1 bg-slate-50 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ $foto->deskripsi_foto ?? '' }}</textarea>
                </div>
                <div class="mb-5">
                    <x-label for="image" :value="__('Foto')" />
                    <input type="file" class="block mt-1 w-full" type="file" name="image" {{ isset($foto) ? '' : 'required' }} autofocus />
                </div>
                <div class="mb-5">
                    <x-label for="tgl_unggah" :value="__('Tanggal Unggah')" />
                    <x-input id="tgl_unggah" class="block mt-1 w-full" type="date" name="tgl_unggah" :value="old('tgl_unggah', $foto->tgl_unggah ?? '')" required autofocus />
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
