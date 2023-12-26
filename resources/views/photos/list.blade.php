<x-app-layout>
    <x-slot name="header">
            　Photo Motto
    </x-slot>
    
    <div class="container">
        @auth
        <h1>Welcome,{{ Auth::user()->name}}</h1> 
        @else
        <h1>Welcome, Guest</h1>
        @endauth
        <h2>Photo List</h2>
        
        <div class="photos">
            @foreach ($photos as $photo)
               <div class="photo">
                   <a href="{{ route('photos.show', $photo->id)}}">
                       <h3 class='title'>
                           {{ $photo->name}}
                       </h3>
                       <a>
                </div>
                 <button type="button" onclick="deletePost('{{ $photo->id }}')">[消去]</button>
            @endforeach
        </div>
        
        <div class='paginate'>
            {{ $photos->links() }}
        </div>
    </div>
  </x-app-layout>          
        
        
        
        
        
        
        
        
        
        
        
        
