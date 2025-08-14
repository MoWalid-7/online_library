<!-- resources/views/admin/borrowed_books/edit.blade.php -->
<x-layouts.app title="Edit Borrowed Book">
    <h1 class="text-2xl font-bold mb-4">Edit Borrowed Book</h1>

    <form method="POST" action="{{ route('borrowed_books.update', $borrowedBook->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-2">
            <label class="block mb-1">Student</label>
            <select name="student_id" class="border p-2 rounded w-full" required>
                @foreach($students as $student)
                    <option value="{{ $student->id }}" @if($borrowedBook->student_id==$student->id) selected @endif>{{ $student->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-2">
            <label class="block mb-1">Book</label>
            <select name="book_id" class="border p-2 rounded w-full" required>
                @foreach($books as $book)
                    <option value="{{ $book->id }}" @if($borrowedBook->book_id==$book->id) selected @endif>{{ $book->title }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
    </form>
</x-layouts.app>
