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