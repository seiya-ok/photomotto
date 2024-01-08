<x-app-layout>
    <x-slot name="header">
        
            Photo Motto
        </h2>
    </x-slot>
     <style>
          .photos{
              display: flex;
              flex-wrap: wrap;
              justify-content: space-between;
         }
         
         .photo {
            width: calc(33.33% - 10px); 
            margin-bottom: 20px;
            box-sizing: border-box;
            text-align: center;
         }
         
         .photo img {
             max-width: 50%;
             height: auto;
         }
    </style>

    <div>
        <h1>Search Results for "{{ $query }}"</h1>

        @if($photos->isEmpty())
            <p>No results found.</p>
        @else
            <div class="photos">
                @foreach ($photos as $photo)
                    <div class="photo">
                        <a href="{{ route('photos.show', $photo->id) }}">
                            <img src="{{ $photo->photo_file }}" alt="{{ $photo->name }}" width="400" height="auto">
                        </a>
                    </div>
                @endforeach
            </div>

            <div class='paginate'>
                {{ $photos->links() }}
            </div>
        @endif
    </div>
</x-app-layout>