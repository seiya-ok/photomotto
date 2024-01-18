<x-app-layout>
    <x-slot name="header">
            　Photo Motto
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
    
    <div class="container">
        @auth
        <h1>[{{ Auth::user()->name}}]</h1> 
        @else
        <h1>Welcome, Guest</h1>
        @endauth
        
        <div class="photos">
            @foreach ($photos as $photo)
            
            @if ($photo)
               <div class="photo">
                   <a href="{{ route('photos.show', $photo->id)}}">
                       <img src="{{ $photo->photo_file}}" alt="{{ $photo->name }}" width="400" height="auto">
                       </a>
                        <a href="/chat/{{ $photo->user->id }}">{{ $photo->user->name }}とチャットする</a>
                @auth
                <!-- Post.phpに作ったisLikedByメソッドをここで使用 -->
                @if (!$photo->isLikedBy(Auth::user()))
                    <span class="likes">
                        <i class="fas fa-heart like-toggle" data-photo-id="{{ $photo->id }}"></i>
                    <span class="like-counter">{{$photo->likes_count}}</span>
                    </span><!-- /.likes -->
                @else
                    <span class="likes">
                        <i class="fas fa-heart heart like-toggle liked" data-photo-id="{{ $photo->id }}"></i>
                    <span class="like-counter">{{$photo->likes_count}}</span>
                    </span><!-- /.likes -->
                @endif
                @endauth
                </div>
               
           <script>
            function deletePost(id) {
              'use strict'
              
              
              if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
            document.getElementById(`form_${id}`).submit();
               }
              }
           </script>
           @endif
          @endforeach
        </div>
        
        <div class='paginate'>
            {{ $photos->links() }}
        </div>
    </div>
  </x-app-layout>          
        
        
        
        
        
        
        
        
        
        
        
        
