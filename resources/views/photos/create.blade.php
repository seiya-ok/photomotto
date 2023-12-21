
<x-app-layout>
        <x-slot name="header">
            　Photo Motto
        </x-slot>
    <div class="container">
        <h1>写真情報アップロード</h1>
        
        <form action="{{ route('photos.store') }}" method="post" enctype="multipart/form-data">
            @csrf
           <div class="name">
               <label for="photo_title">作品名</label>
               <input type="text" id="photo_name" name="photo[name]" placeholder="作品名" required>
           </div>
           
            <div class="location">
               <label for="photo_location">撮影場所</label>
               <input type="text" id="photo_location" name="photo[location]" placeholder="撮影地" required>
           </div>
           <div class="optional-description-label">
         　 <label for="photo_description">説明文[任意]</label>
         　 </div>
            
            <div class="description">
               <textarea id="photo_description" name="photo[description]" maxlength="250" placeholder="こちらに写真の説明をご記入ください."></textarea>
            </div>
           
           <div>
                <label for="photo">写真選択:</label>
                <input type="file" name="photo" accept="image/*">
           </div>
           <button class="rounded-md bg-gray-800 text-white px-2 py-1" onClick="submit();">[投稿する]</button>
         </form>
         <br>
        <button class="rounded-md bg-gray-800 text-white px-1 py-0.5" onClick="history.back();">戻る</button>
          @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</x-app-layout>  
        
                

        