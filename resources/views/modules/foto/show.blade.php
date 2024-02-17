<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow mt-3 rounded">
            <div class="p-7">
                <div class="flex">
                    <div class="w-3/5">
                        <img src="{{ Storage::url($foto->image) }}" alt="" class="mw-full rounded-xl">
                    </div>
                    <div class="w-2/5">
                        <div class="px-4">
                            <div class="meta mb-3">
                                <div class="text-2xl font-bold">{{ $foto->judul_foto }}</div>
                                <div class="text-sm text-slate-400 mb-2">Ditambahkan oleh <span class="font-bold">{{ $foto->user->name }}</span> pada {{ $foto->created_at }}</div>
                                <a href="{{ route('dashboard', ['album_id' => $foto->album_id]) }}" class="bg-red-700 font-bold p-1 rounded-lg text-sm shadow text-white"># {{ $foto->album->nama_album }}</a>
                                <div class="text-sm text-slate-600 leading-6">{{ $foto->deskripsi_foto }}</div>
                            </div>
                            <div class="border-y">
                                <div class="flex gap-2">
                                    <a href="{{ route('foto.like', ['foto' => $foto]) }}" class="p-2 block text-blue-700">
                                        @if ($foto->likes()->count())
                                            <span class="p-2 rounded-full bg-indigo-500 text-white mr-2">
                                                {{ $foto->likes()->count() }}
                                            </span>
                                        @endif 
                                        
                                        @if (Auth::check())
                                            {{ $foto->likes()->where('user_id', Auth::user()->id)->exists() ? 'Batal' : 'Suka' }}
                                        @endif
                                    </a>
                                </div>
                            </div> 
                            @if (Auth::check())
                            <div class="comment">
                                <form action="{{ route('comment.store', ['foto' => $foto]) }}" method="POST" class="mt-2">
                                    @csrf
                                    <textarea name="comment" id="comment" rows="3" class="w-full rounded-md shadow-sm border-gray-300 bg-slate-100 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Masukan komentar anda.........">{{ old('comment') }}</textarea>
                                    @if ($errors->has('comment'))
                                        <div class="p-2 bg-red-100 text-red-800 rounded mb-2">{{ $errors->first('comment') }}</div>
                                    @endif
                                    <div>
                                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 text-sm rounded">
                                            Kirim Komentar
                                        </button>
                                    </div>
                                </form>
                            </div> 
                            @endif 
                            @if (Auth::check())
                                <div class="comment-list mt-3 border-t pt-3">
                                    <div class="text-xl font-bold mb-3">Daftar Komentar</div>
                                    @foreach ($foto->comments()->latest()->get() as $comment)
                                        <div class="mb-2">
                                            <div class="text-sm p-3 bg-slate-200 rounded-lg">
                                                <div class="text font-bold">{{ $comment->user->name }}</div>
                                                <div class="text-slate-500">{{ $comment->comment }}</div>
                                                @if ($comment->user_id == Auth::user()->id)
                                                    <a href="{{ route('comment.delete', ['comment' => $comment]) }}" class="bg-red-500 text-white px-1 inline-block mt-2 rounded-lg">Hapus</a>
                                                @endif    
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>    
                    </div>
                </div>
                @if (Auth::check() && $foto->user_id == Auth::user()->id)
                    <div class="mt-6">
                        <div class="flex">
                            <a href="{{ route('foto.edit', ['foto' => $foto]) }}" class="text-center block bg-green-500 text-white p-2 px-4 text-sm font-bold rounded-lg">Edit Foto</a>
                            <a href="{{ route('foto.delete', ['foto' => $foto]) }}" class="text-center block bg-red-500 text-white p-2 px-4 text-sm font-bold rounded-lg ml-2">Hapus</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
