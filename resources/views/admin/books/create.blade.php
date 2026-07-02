<<<<<<< HEAD
{{-- resources/views/admin/books/create.blade.php --}}
<x-app-layout title="Add New Book">
    <x-slot name="header">Add New Book</x-slot>

    <div style="max-width:580px; margin:0 auto;">
        <div class="card">
            <form method="POST" action="{{ route('books.store') }}">
                @csrf

                <div class="form-group">
                    <label class="form-label">Title *</label>
                    <input type="text" name="title" value="{{ old('title') }}" class="form-input" placeholder="Enter book title" required>
                    @error('title')<p style="color:#f87171;font-size:0.8rem;margin-top:4px;">{{ $message }}</p>@enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Author *</label>
                    <input type="text" name="author" value="{{ old('author') }}" class="form-input" placeholder="Enter author name" required>
                    @error('author')<p style="color:#f87171;font-size:0.8rem;margin-top:4px;">{{ $message }}</p>@enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-input" placeholder="Brief description of the book..." rows="4" style="resize:vertical;">{{ old('description') }}</textarea>
                </div>

                <div class="form-group">
                    <label class="form-label">Available Copies</label>
                    <input type="number" name="available_copies" value="{{ old('available_copies', 1) }}" class="form-input" min="0" placeholder="0">
                </div>

                <div style="display:flex;gap:0.75rem;margin-top:0.5rem;">
                    <button type="submit" class="btn-primary">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Save Book
                    </button>
                    <a href="{{ route('books.index') }}" class="btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
=======
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
>>>>>>> origin/online_library
