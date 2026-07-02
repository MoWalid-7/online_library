{{-- resources/views/student/books.blade.php --}}
<x-app-layout title="Browse Books">
    <x-slot name="header">Available Books</x-slot>

    <div style="margin-bottom: 2rem;">
        <form method="GET" action="{{ route('student.books') }}" style="display:flex; gap:0.5rem; max-width:580px; margin:0 auto;">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by title or author..." class="form-input" style="flex:1;">
            <button type="submit" class="btn-primary">Search</button>
        </form>
    </div>

    <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(280px,1fr));gap:1.5rem;">
        @forelse($books as $book)
        <div class="card" style="display:flex;flex-direction:column;border-top:4px solid #f59e0b;">
            <div style="display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:1rem;">
                <div>
                    <h2 style="font-size:1.15rem;font-weight:700;margin:0 0 0.25rem;">
                        <a href="{{ route('student.books.show', $book->id) }}" style="color:#f59e0b;text-decoration:none;">{{ $book->title }}</a>
                    </h2>
                    <p style="color:#94a3b8;font-size:0.9rem;margin:0;">By {{ $book->author }}</p>
                </div>
            </div>

            @if($book->description)
            <p style="color:#cbd5e1;font-size:0.875rem;line-height:1.6;margin:0 0 1rem;flex:1;">
                {{ Str::limit($book->description, 100) }}
            </p>
            @endif

            <div style="display:flex;align-items:center;justify-content:space-between;margin-top:auto;padding-top:1rem;border-top:1px solid rgba(255,255,255,0.05);">
                <div style="display:flex;align-items:center;gap:6px;">
                    <span style="width:8px;height:8px;border-radius:50%;background:{{ $book->available_copies > 0 ? '#4ade80' : '#f87171' }};box-shadow:0 0 8px {{ $book->available_copies > 0 ? 'rgba(74,222,128,0.5)' : 'rgba(248,113,113,0.5)' }};"></span>
                    <span style="font-size:0.8rem;font-weight:600;color:{{ $book->available_copies > 0 ? '#4ade80' : '#f87171' }};">
                        {{ $book->available_copies }} copies left
                    </span>
                </div>
            </div>
        </div>
        @empty
        <div style="grid-column:1/-1;text-align:center;padding:3rem;background:rgba(30,41,59,0.5);border:1px dashed rgba(245,158,11,0.2);border-radius:20px;color:#475569;">
            <div style="font-size:3rem;margin-bottom:0.75rem;">📚</div>
            <div style="font-weight:600;color:#64748b;font-size:1.1rem;">No books available right now</div>
            <p style="color:#475569;font-size:0.9rem;margin-top:0.5rem;">Check back later for new additions to our digital library.</p>
        </div>
        @endforelse
    </div>
</x-app-layout>