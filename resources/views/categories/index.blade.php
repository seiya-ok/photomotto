
<x-app-layout>
        <x-slot name="header">
            　Photo Motto
        </x-slot>
    <h1>Category Index</h1>

    <ul>
        @foreach($categories as $category)
            <li>{{ $category->name }}</li>
        @endforeach
    </ul>
</x-app-layout>
