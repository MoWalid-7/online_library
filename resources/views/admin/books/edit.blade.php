<<<<<<< HEAD
{{-- resources/views/admin/books/edit.blade.php --}}
<x-app-layout title="Edit Book">
    <x-slot name="header">Edit Book</x-slot>

    <div style="max-width:580px; margin:0 auto;">
        <div class="card">
            <form method="POST" action="{{ route('books.update', $book->id) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label class="form-label">Title *</label>
                    <input type="text" name="title" value="{{ old('title', $book->title) }}" class="form-input" required>
                    @error('title')<p style="color:#f87171;font-size:0.8rem;margin-top:4px;">{{ $message }}</p>@enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Author *</label>
                    <input type="text" name="author" value="{{ old('author', $book->author) }}" class="form-input" required>
                    @error('author')<p style="color:#f87171;font-size:0.8rem;margin-top:4px;">{{ $message }}</p>@enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-input" rows="4" style="resize:vertical;">{{ old('description', $book->description) }}</textarea>
                </div>

                <div class="form-group">
                    <label class="form-label">Available Copies</label>
                    <input type="number" name="available_copies" value="{{ old('available_copies', $book->available_copies) }}" class="form-input" min="0">
                </div>

                <div style="display:flex;gap:0.75rem;margin-top:0.5rem;">
                    <button type="submit" class="btn-primary">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Update Book
                    </button>
                    <a href="{{ route('books.index') }}" class="btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
=======
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
>>>>>>> origin/online_library
