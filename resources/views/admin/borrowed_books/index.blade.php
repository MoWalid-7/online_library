<!-- resources/views/admin/borrowed_books/index.blade.php -->
<x-layouts.app title="Borrowed Books">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Borrowed Books</h1>
        <a href="{{ route('borrowed_books.create') }}" class="bg-green-500 text-white px-4 py-2 rounded">Add Borrowed Book</a>
    </div>

    <table class="w-full border">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">ID</th>
                <th class="border px-4 py-2">Student</th>
                <th class="border px-4 py-2">Book</th>
                <th class="border px-4 py-2">Borrowed At</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($borrowedBooks as $borrow)
            <tr>
                <td class="border px-4 py-2">{{ $borrow->id }}</td>
                <td class="border px-4 py-2">{{ $borrow->student->name }}</td>
                <td class="border px-4 py-2">{{ $borrow->book->title }}</td>
                <td class="border px-4 py-2">{{ $borrow->created_at->format('Y-m-d') }}</td>
                <td class="border px-4 py-2 flex gap-2">
                    <a href="{{ route('borrowed_books.edit', $borrow->id) }}" class="bg-blue-500 text-white px-2 py-1 rounded">Edit</a>
                    <form method="POST" action="{{ route('borrowed_books.destroy', $borrow->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-layouts.app>
