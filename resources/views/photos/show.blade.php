
<x-app-layout>
        <x-slot name="header">
            　Photo Motto
        </x-slot>
        <title>Name</title>
    <body class="antialiased">
      <h1 class="title">
          {{ $photo->name}}
      </h1>
      <div class="content">
         <div>
                <img src="{{ $photo->photo_file }}" alt="画像が読み込めません。"/>
            </div>
       </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </div>
   </body>
</x-app-layout>
