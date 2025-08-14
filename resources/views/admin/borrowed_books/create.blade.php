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
