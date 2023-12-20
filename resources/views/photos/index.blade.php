
    <x-app-layout>
        <x-slot name="header">
            　Photo Motto
        </x-slot>
       
        <h1>Photo Motto</h1>
            
  <h1>Photo Motto</h1>

<div class='photos'>
    @forelse($photos as $photo)
        <div class='photo'>
            <h2 class='title'>{{ $photo->name }}</h2>
            <img src="{{ asset('storage/' . $photo->photo_file) }}" alt="{{ $photo->name }}" style="max-width: 300px">
            <p class='description'>{{ $photo->description }}</p>
            <p class='location'>Location: {{ $photo->location }}</p>
            <p class='tag'>Tag: {{ $photo->tag }}</p>
            <p class='date_taken'>Date Taken: {{ $photo->date_taken }}</p>
               @if ($photo->id)
            <a href="{{ route('photos.show', ['photo' => $photo->id]) }}">View Details</a>
        @else
            <p>Error: Photo ID is missing or null.</p>
        @endif
        </div>
    @empty
        <p>No photos available</p>
    @endforelse
    {{ $photos->links('pagination::bootstrap-4')}}
</div>

<h2 class='title'>
    <a href="/photos/{{ $photo->id }}">{{ $photo->title }}</a>
</h2>

<form method="POST" action="{{ route('photos.store') }}" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="photo">写真投稿:</label>
        <input type="file" name="photo" accept="image/*">
        <button type="submit">Upload</button>
    </div>
</form>

</x-app-layout>