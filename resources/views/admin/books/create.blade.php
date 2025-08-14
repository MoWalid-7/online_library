<!-- resources/views/admin/books/create.blade.php -->
<x-layouts.app title="Add New Book">
    <h1 class="text-2xl font-bold mb-4">Add New Book</h1>

    <form method="POST" action="{{ route('books.store') }}">
        @csrf
        <div class="mb-2">
            <label class="block mb-1">Title</label>
            <input type="text" name="title" class="border p-2 rounded w-full" required>
        </div>
        <div class="mb-2">
            <label class="block mb-1">Author</label>
            <input type="text" name="author" class="border p-2 rounded w-full" required>
        </div>
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Save</button>
    </form>
</x-layouts.app>
