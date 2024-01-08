
<x-app-layout>
        <x-slot name="header">
            　Photo Motto
        </x-slot>
    <h1>Create a New Category</h1>

    <form action="{{ route('categories.store') }}" method="post">
        @csrf

        <!-- Category Name -->
        <label for="name">Category Name:</label>
        <input type="text" name="name" id="name" required>

        <button type="submit">Create Category</button>
    </form>
</x-app-layout>
