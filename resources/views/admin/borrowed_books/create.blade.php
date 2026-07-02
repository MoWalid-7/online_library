<<<<<<< HEAD
{{-- resources/views/admin/borrowed_books/create.blade.php --}}
<x-app-layout title="Add Borrowed Book">
    <x-slot name="header">Add Borrowed Record</x-slot>

    <div style="max-width:580px; margin:0 auto;">
        <div class="card">
            <form method="POST" action="{{ route('admin.borrowed_books.store') }}">
                @csrf

                <div class="form-group">
                    <label class="form-label">Student *</label>
                    <select name="user_id" class="form-input" required>
                        <option value="" disabled selected>— Select a student —</option>
                        @foreach($students as $student)
                        <option value="{{ $student->id }}">{{ $student->name }} ({{ $student->email }})</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label">Book *</label>
                    <select name="book_id" class="form-input" required>
                        <option value="" disabled selected>— Select a book —</option>
                        @foreach($books as $book)
                        <option value="{{ $book->id }}">{{ $book->title }} — {{ $book->author }}</option>
                        @endforeach
                    </select>
                </div>

                <div style="display:flex;gap:0.75rem;margin-top:0.5rem;">
                    <button type="submit" class="btn-primary">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Save Record
                    </button>
                    <a href="{{ route('admin.borrowed_books.index') }}" class="btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
=======
<!-- resources/views/admin/borrowed_books/create.blade.php -->
<x-layouts.app title="Add Borrowed Book">
    <h1 class="text-2xl font-bold mb-4">Add Borrowed Book</h1>

    <form method="POST" action="{{ route('borrowed_books.store') }}">
        @csrf
        <div class="mb-2">
            <label class="block mb-1">Student</label>
            <select name="student_id" class="border p-2 rounded w-full" required>
                @foreach($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-2">
            <label class="block mb-1">Book</label>
            <select name="book_id" class="border p-2 rounded w-full" required>
                @foreach($books as $book)
                    <option value="{{ $book->id }}">{{ $book->title }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Save</button>
    </form>
</x-layouts.app>
>>>>>>> origin/online_library
