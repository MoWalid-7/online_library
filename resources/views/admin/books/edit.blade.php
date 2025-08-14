<!-- resources/views/admin/books/edit.blade.php -->
<x-layouts.app title="Edit Book">
    <h1 class="text-2xl font-bold mb-4">Edit Book</h1>

    <form method="POST" action="{{ route('books.update', $book->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-2">
            <label class="block mb-1">Title</label>
            <input type="text" name="title" class="border p-2 rounded w-full" value="{{ $book->title }}" required>
        </div>
        <div class="mb-2">
            <label class="block mb-1">Author</label>
            <input type="text" name="author" class="border p-2 rounded w-full" value="{{ $book->author }}" required>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
    </form>
</x-layouts.app>
