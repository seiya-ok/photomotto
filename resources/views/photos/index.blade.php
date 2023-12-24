<x-app-layout>
    <x-slot name="header">
        Photo Motto
    </x-slot>

    <h1>Photo Motto</h1>
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
        <h1>Blog Name</h1>
        <a href='/photos/show'>
            <button class="rounded-md bg-gray-800 text-white px-2 py-1" onclick="lsubmit();">写真一覧</button>
        </a>

        <div class='photos'>
            @foreach ($photos as $photo)
                <div class='photo'>
                    <a href="/photos/{{ $photo->id }}">
                        <h2 class='title'>
                            @if ($photo->name)
                                {{ $photo->name }}
                            @elseif ($photo->title)
                                {{ $photo->title }}
                            @endif
                        </h2>
                    </a>
                    <p class='body'>{{ $photo->body }}</p>

                    <form action="/photos/{{ $photo->id }}" id="form_{{ $photo->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                    </form>

                    <button type="button" onclick="deletePost('{{ $photo->id }}')">[消去]</button>
                </div>
            @endforeach
        </div>

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