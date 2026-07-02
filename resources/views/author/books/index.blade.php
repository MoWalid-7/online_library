{{-- resources/views/author/books/index.blade.php --}}
<x-app-layout title="My Books">
    <x-slot name="header">My Authored Books</x-slot>
    <x-slot name="headerAction">
        <a href="{{ route('author.books.create') }}" class="btn-primary">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Publish Book
        </a>
    </x-slot>

    @if(session('success'))
    <div style="background:rgba(34,197,94,0.1);border:1px solid rgba(34,197,94,0.2);border-radius:12px;padding:14px 18px;margin-bottom:1.5rem;color:#4ade80;font-size:0.875rem;">
        ✅ {{ session('success') }}
    </div>
    @endif

    <div style="margin-bottom: 2rem;">
        <form method="GET" action="{{ route('author.books') }}" style="display:flex; gap:0.5rem; max-width:580px; margin:0 auto;">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search your books by title..." class="form-input" style="flex:1;">
            <button type="submit" class="btn-primary">Search</button>
        </form>
    </div>

    <div class="card" style="padding:0;overflow:hidden;">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Cover</th>
                    <th>Title</th>
                    <th>ISBN</th>
                    <th>Copies</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($books as $book)
                <tr>
                    <td>
                        @if($book->cover_image)
                        <img src="{{ asset('storage/' . $book->cover_image) }}" alt="Cover" style="width:40px;height:50px;object-fit:cover;border-radius:4px;">
                        @else
                        <div style="width:40px;height:50px;background:#1e293b;border-radius:4px;display:flex;align-items:center;justify-content:center;color:#475569;font-size:0.75rem;">No Img</div>
                        @endif
                    </td>
                    <td style="font-weight:600;color:#f1f5f9;">{{ $book->title }}</td>
                    <td style="color:#94a3b8;font-family:monospace;">{{ $book->isbn ?: 'N/A' }}</td>
                    <td>
                        <span class="badge {{ $book->available_copies > 0 ? 'badge-green' : 'badge-red' }}">
                            {{ $book->available_copies }} copies
                        </span>
                    </td>
                    <td>
                        <div style="display:flex;gap:8px;align-items:center;">
                            <a href="{{ route('author.books.edit', $book->id) }}" class="btn-edit">
                                Edit
                            </a>
                            <form method="POST" action="{{ route('author.books.destroy', $book->id) }}" onsubmit="return confirm('WARNING: This will permanently delete your book. Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-danger">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align:center;padding:3rem;color:#475569;">
                        <div style="font-size:3rem;margin-bottom:0.75rem;">📓</div>
                        <div style="font-weight:600;color:#64748b;">You haven't added any books yet</div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>