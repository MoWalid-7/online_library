{{-- resources/views/admin/borrowed_books/index.blade.php --}}
<x-app-layout title="Borrowed Books">
    <x-slot name="header">Borrowed Books</x-slot>
    <x-slot name="headerAction">
        <a href="{{ route('admin.borrowed_books.create') }}" class="btn-primary">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Add Record
        </a>
    </x-slot>

    @if(session('success'))
    <div style="background:rgba(34,197,94,0.1);border:1px solid rgba(34,197,94,0.2);border-radius:12px;padding:14px 18px;margin-bottom:1.5rem;color:#4ade80;font-size:0.875rem;">
        ✅ {{ session('success') }}
    </div>
    @endif

    <div class="card" style="padding:0;overflow:hidden;">
        <table class="data-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Student</th>
                    <th>Book</th>
                    <th>Borrowed At</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($borrowedBooks as $borrow)
                <tr>
                    <td style="color:#475569;">{{ $borrow->id }}</td>
                    <td>
                        <div style="display:flex;align-items:center;gap:8px;">
                            <div style="width:30px;height:30px;background:linear-gradient(135deg,rgba(245,158,11,0.2),rgba(217,119,6,0.1));border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:0.75rem;font-weight:700;color:#f59e0b;">
                                {{ strtoupper(substr($borrow->student->name, 0, 1)) }}
                            </div>
                            <span style="font-weight:500;color:#f1f5f9;">{{ $borrow->student->name }}</span>
                        </div>
                    </td>
                    <td style="font-weight:500;color:#e2e8f0;">{{ $borrow->book->title }}</td>
                    <td style="color:#94a3b8;">{{ $borrow->created_at->format('M d, Y') }}</td>
                    <td>
                        @if($borrow->return_at)
                        <span class="badge badge-green">Returned</span>
                        @else
                        <span class="badge badge-amber">Borrowed</span>
                        @endif
                    </td>
                    <td>
                        <div style="display:flex;gap:8px;align-items:center;">
                            <a href="{{ route('admin.borrowed_books.edit', $borrow->id) }}" class="btn-edit">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                                Edit
                            </a>
                            <form method="POST" action="{{ route('admin.borrowed_books.destroy', $borrow->id) }}" onsubmit="return confirm('Delete this record?')">
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
                    <td colspan="6" style="text-align:center;padding:3rem;color:#475569;">
                        <div style="font-size:3rem;margin-bottom:0.75rem;">🔄</div>
                        <div style="font-weight:600;color:#64748b;">No borrowed books yet</div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
