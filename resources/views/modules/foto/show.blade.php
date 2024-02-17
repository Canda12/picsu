<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Detail Foto') }}
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
                <div>
                    <img src="{{ Storage::url($foto->image) }}" class="mw-full" alt="">
                </div>
                <div>
                    <table class="min-w-full bg-white border border-gray-300 w-full">
                        <tr>
                            <td class="py-2 px-4 border">Judul Foto</td>
                            <td class="py-2 px-4 border">{{ $foto->judul_foto }}</td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border">Deskripsi Foto</td>
                            <td class="py-2 px-4 border">{{ $foto->deskripsi_foto }}</td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border">Album</td>
                            <td class="py-2 px-4 border">{{ $foto->album->nama_album }}</td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border">Tanggal Unggah</td>
                            <td class="py-2 px-4 border">{{ $foto->tgl_unggah }}</td>
                        </tr>
                    </table>
                </div>
                @if (Auth::check())
                <div class="px-3 py-3">
                    <a href="{{ route('foto.edit', ['foto' => $foto]) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded">Edit</a>
                    <a href="{{ route('foto.delete', ['foto' => $foto]) }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Hapus</a>
                </div>
                @endif

                <hr>
                <form action="{{ route('foto.comment', ['foto' => $foto]) }}" method="POST" class="p-3">
                    @csrf
                    <h1 class="text-3xl mb-3 font-bold">Komentar</h1>
                    <div class="mb-3">
                        <textarea name="isi_komentar" id="isi_komentar" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full" rows="5" placeholder="Masukan komentar kamu"></textarea>
                    </div>
                    <div class="mb-3">
                        <x-input id="nama" class="block mt-1 w-full" type="text" name="nama" placeholder="Masukan nama anda" :value="old('nama')" required />
                    </div>
                    <div class="pt-3">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Kirim Komentar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
