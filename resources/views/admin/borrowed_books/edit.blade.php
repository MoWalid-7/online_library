{{-- resources/views/admin/borrowed_books/edit.blade.php --}}
<x-app-layout title="Edit Borrowed Book">
    <x-slot name="header">Edit Borrowed Record</x-slot>

    <div style="max-width:580px; margin:0 auto;">
        <div class="card">
            <form method="POST" action="{{ route('admin.borrowed_books.update', $borrowedBook->id) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label class="form-label">Student *</label>
                    <select name="user_id" class="form-input" required>
                        @foreach($students as $student)
                        <option value="{{ $student->id }}" @selected($borrowedBook->user_id == $student->id)>
                            {{ $student->name }} ({{ $student->email }})
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label">Book *</label>
                    <select name="book_id" class="form-input" required>
                        @foreach($books as $book)
                        <option value="{{ $book->id }}" @selected($borrowedBook->book_id == $book->id)>
                            {{ $book->title }} — {{ $book->author }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div style="display:flex;gap:0.75rem;margin-top:0.5rem;">
                    <button type="submit" class="btn-primary">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Update Record
                    </button>
                    <a href="{{ route('admin.borrowed_books.index') }}" class="btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
