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
               <div class="photo">
                   <a href="{{ route('photos.show', $photo->id)}}">
                       <img src="{{ $photo->photo_file}}" alt="{{ $photo->name }}" width="400" height="auto">
                       </a>
                </div>
               
           <script>
            function deletePost(id) {
              'use strict'
              
              
              if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
            document.getElementById(`form_${id}`).submit();
               }
              }
           </script>
          @endforeach
        </div>
        
        <div class='paginate'>
            {{ $photos->links() }}
        </div>
    </div>
  </x-app-layout>          
        
        
        
        
        
        
        
        
        
        
        
        
