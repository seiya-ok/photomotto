<x-app-layout>
    <x-slot name="header">
            　Photo Motto
    </x-slot>
    @foreach($users as $user)
     <a href="/chat/{{ $user->id }}">{{ $user->name }}とチャットする</a>
    @endforeach
</x-app-layout>