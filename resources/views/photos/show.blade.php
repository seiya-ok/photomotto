
<x-app-layout>
        <x-slot name="header">
            　Photo Motto
        </x-slot>
    <div class="container">
        <h1>{{ $photo->name }}</h1>

        <p class="description">{{ $photo->description }}</p>

        <p class="category">Category: {{ $photo->category->name }}</p>

        <p class="location">Location: {{ $photo->location }}</p>

        <p class="tag">Tag: {{ $photo->tag }}</p>

        <p class="date-taken">Date Taken: {{ $photo->date_taken }}</p>

        <img src="{{ asset('storage/' . $photo->photo_file) }}" alt="{{ $photo->name }}" style="max-width: 300px">
         
         <h3>写真詳細</h3>
         <p>{{ $photo->description}}</p>p
         
         <h3>コメント</h3>
         <ul>
              @foreach($photo->comments as $comment)
                <li>{{ $comment->text }}</li>
              @endforeach
        </ul>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </div>
</x-app-layout>
