<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Album') }}
            </h2>
            <div>
                <a href="{{ route('album.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">
                    Tambah Album
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <table class="min-w-full bg-white border border-gray-300 w-full">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border">Nama Album</th>
                            <th class="py-2 px-4 border">Deskripsi</th>
                            <th class="py-2 px-4 border">Tanggal Dibuat</th>
                            <th class="py-2 px-4 border">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($albums as $album)
                            <tr>
                                <td class="py-2 px-4 border">{{ $album->nama_album }}</td>
                                <td class="py-2 px-4 border">{{ $album->deskripsi }}</td>
                                <td class="py-2 px-4 border">{{ $album->tgl_dibuat }}</td>
                                <td class="py-2 px-4 border text-center">
                                    <a href="{{ route('album.edit', ['album' => $album]) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded">Edit</a>
                                    <a href="{{ route('album.delete', ['album' => $album]) }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Hapus</a>
                                </td>
                            </tr>
                        @endforeach 
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
