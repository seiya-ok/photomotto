
<x-app-layout>
        <x-slot name="header">
            　Photo Motto
        </x-slot>
    <div class="container">
        <h1>Create a New Photo</h1>
        
        <form action="{{ route('photos.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>
            <br>
            
            
              <label for="category">Category:</label>
            <select name="category" id="category" required>
                <option value="landscape">Landscape</option>
                <option value="portrait">Portrait</option>
               
            </select>
            <br>
            
           
            <label for="description">Description:</label>
            <textarea name="description" id="description" required></textarea>
            <br>
            
          
            <label for="location">Location:</label>
            <input type="text" name="location" id="location" required>
            <br>
            
           
            <label for="tag">Tag:</label>
            <input type="text" name="tag" id="tag" required>
            <br>
            
            
            <label for="date_taken">Date Taken:</label>
            <input type="date" name="date_taken" id="date_taken" required>
            <br>
            
            
            <label for="photo">Photo:</label>
            <input type="file" name="photo" id="photo" accept="image/*" required>
            <br>
            
            <button type="submit">Create Photo</button>
        </form>
    </div>
</x-app-layout>