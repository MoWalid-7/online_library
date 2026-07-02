<<<<<<< HEAD
{{-- resources/views/admin/books/index.blade.php --}}
<x-app-layout title="Manage Books">
    <x-slot name="header">Books</x-slot>
    <x-slot name="headerAction">
        <a href="{{ route('books.create') }}" class="btn-primary">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Add Book
        </a>
    </x-slot>

    @if(session('success'))
    <div style="background:rgba(34,197,94,0.1);border:1px solid rgba(34,197,94,0.2);border-radius:12px;padding:14px 18px;margin-bottom:1.5rem;color:#4ade80;font-size:0.875rem;display:flex;align-items:center;gap:8px;">
        ✅ {{ session('success') }}
    </div>
    @endif

    <div class="card" style="padding:0;overflow:hidden;">
        <table class="data-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Available Copies</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($books as $book)
                <tr>
                    <td style="color:#475569;">{{ $book->id }}</td>
                    <td style="font-weight:600;color:#f1f5f9;">{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>
                        <span class="badge {{ $book->available_copies > 0 ? 'badge-green' : 'badge-red' }}">
                            {{ $book->available_copies }} copies
                        </span>
                    </td>
                    <td>
                        <div style="display:flex;gap:8px;align-items:center;">
                            <a href="{{ route('books.edit', $book->id) }}" class="btn-edit">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                                Edit
                            </a>
                            <form method="POST" action="{{ route('books.destroy', $book->id) }}" onsubmit="return confirm('Delete this book?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-danger">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align:center;padding:3rem;color:#475569;">
                        <div style="font-size:3rem;margin-bottom:0.75rem;">📚</div>
                        <div style="font-weight:600;color:#64748b;">No books yet</div>
                        <div style="font-size:0.875rem;margin-top:0.25rem;">Start by adding your first book</div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
=======
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
>>>>>>> origin/online_library
