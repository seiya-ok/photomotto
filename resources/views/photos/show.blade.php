
<x-app-layout>
        <x-slot name="header">
            　Photo Motto
        </x-slot>
        <title>{{ $photo ->name}}</title>
    <body class="antialiased"style="text-align: center;">
         <h1 class="title" style="font-weight: bold; font-size: 24px;">
          {{ $photo->name}}
      </h1>
     <div class="content">
        <div>
                <img src="{{ $photo->photo_file }}" alt="画像が読み込めません。"width="400" height="aout" style="margin: auto; display: block;"/>
        </div>
        <br>
        <div style="text-align: left; margin-left: 20px;">
                <p><strong>ID:</strong> {{ $photo->id }}</p>
                <p><strong>撮影場所:</strong> {{ $photo->location }}</p>
                <p><strong>説明文:</strong> {{ $photo->description }}</p>
                <p><strong>カメラ:</strong> {{ $photo->camerabody }}</p>
                <p><strong>レンズ:</strong> {{ $photo->cameralens }}</p>
                <p><strong>ソフト:</strong> {{ $photo->camerasoft }}</p>
        </div>
     </div>
     <div style="text-align: left; margin-left: 20px;">
          <button class="rounded-md bg-gray-800 text-white px-1 py-0.5" onClick="history.back();">戻る</button>
     </div>
     <form action="/photos/{{ $photo->id }}" id="form_{{ $photo->id }}" method="post">
                    @csrf 
   　　　　　　　  　　　　　 @method('DELETE')
                    <button type="submit" class="rounded-md bg-gray-800 text-white px-1 py-0.5"  onclick="deletePost('{{ $photo->id }}')">[消去]</button>
    
    </form>
     <script>
            function deletePost(id) {
                'use strict'
                
                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
   </body>
</x-app-layout>
