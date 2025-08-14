<!-- resources/views/admin/books/index.blade.php -->
<x-layouts.app title="Manage Books">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Books</h1>
        <a href="{{ route('books.create') }}" class="bg-green-500 text-white px-4 py-2 rounded">Add New Book</a>
    </div>

    <table class="w-full border">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">ID</th>
                <th class="border px-4 py-2">Title</th>
                <th class="border px-4 py-2">Author</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
            <tr>
                <td class="border px-4 py-2">{{ $book->id }}</td>
                <td class="border px-4 py-2">{{ $book->title }}</td>
                <td class="border px-4 py-2">{{ $book->author }}</td>
                <td class="border px-4 py-2 flex gap-2">
                    <a href="{{ route('books.edit', $book->id) }}" class="bg-blue-500 text-white px-2 py-1 rounded">Edit</a>
                    <form method="POST" action="{{ route('books.destroy', $book->id) }}">
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
