{{-- resources/views/student/books.blade.php --}}
@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Available Books</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @forelse($books as $book)
            <div class="p-4 bg-white shadow rounded">
                <h2 class="text-lg font-semibold">{{ $book->title }}</h2>
                <p class="text-gray-600">Author: {{ $book->author }}</p>
            </div>
        @empty
            <p>No books available.</p>
        @endforelse
    </div>
@endsection

