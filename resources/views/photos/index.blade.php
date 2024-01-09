<x-app-layout>
    <x-slot name="header">
        Photo Motto
    </x-slot>
    <div class="search-form">
    <form action="{{ route('photos.search') }}" method="get">
        @csrf
        <input type="text" name="query" placeholder="写真を検索">
        <button class="rounded-md bg-gray-800 text-white px-2 py-1" type="submit">検索</button>
    </form>
　　</div>

    <h1>Photo Upload </h1>
    <a href='/photos/create'>
        <button class="rounded-md bg-gray-800 text-white px-2 py-1" onclick="submit();">[写真投稿⇧]</button>
    </a>

    @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <body class="antialiased">
        <h1>Photo list</h1>
        <a href='/photos/list'>
            <button class="rounded-md bg-gray-800 text-white px-2 py-1" onclick="submit();">写真一覧</button>
        </a>

        <div class='paginate'>{{ $photos->links() }} </div>
        
        @foreach ($photos as $photo)
        <div class="photo">
            <a href="{{ route('photos.show' ,  $photo->id)}}">
                <img src="{{ $photo->photo_file }}" alt="{{ $photo->name }}" width="400" height="auto">
            </a>
             @if(auth()->check() && $photo->user_id == auth()->id())
                    <!-- Only show delete button if the authenticated user is the owner of the photo -->
                    <form action="{{ route('photos.destroy', $photo->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePost('{{ $photo->id }}')">削除</button>
                    </form>
                @endif
            </div>
        @endforeach
    </body>

    <script>
        function deletePost(id) {
            'use strict'

            if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                document.getElementById(`form_${id}`).submit();
            }
        }
    </script>

    <h2 class='title'>
        {{ Auth::user()->name }}
    </h2>
</x-app-layout>