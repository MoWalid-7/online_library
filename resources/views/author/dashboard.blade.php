{{-- resources/views/author/dashboard.blade.php --}}
<x-app-layout title="Author Dashboard">
    <x-slot name="header">Author Dashboard</x-slot>

    {{-- Welcome Banner --}}
    <div style="background:linear-gradient(135deg,rgba(245,158,11,0.12),rgba(217,119,6,0.05));border:1px solid rgba(245,158,11,0.15);border-radius:20px;padding:2rem;margin-bottom:2rem;display:flex;align-items:center;gap:1.5rem;">
        <div style="width:60px;height:60px;background:linear-gradient(135deg,#f59e0b,#d97706);border-radius:18px;display:flex;align-items:center;justify-content:center;font-size:1.75rem;flex-shrink:0;box-shadow:0 8px 20px rgba(245,158,11,0.3);">✍️</div>
        <div>
            <h2 style="font-size:1.4rem;font-weight:700;color:#f1f5f9;margin:0 0 0.25rem;">Welcome, Author {{ auth()->user()->name }}!</h2>
            <p style="color:#64748b;margin:0;font-size:0.9rem;">Manage your published books and track your readers.</p>
        </div>
    </div>

    {{-- Stats Cards --}}
    <h3 style="font-size:0.8rem;font-weight:600;color:#64748b;text-transform:uppercase;letter-spacing:0.1em;margin-bottom:1rem;">Your Library Stats</h3>
    <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(220px,1fr));gap:1rem;margin-bottom:2rem;">
        <div class="stat-card">
            <div class="stat-icon" style="background:rgba(245,158,11,0.15);color:#f59e0b;">📚</div>
            <div>
                <div style="font-size:0.75rem;color:#64748b;text-transform:uppercase;letter-spacing:0.05em;font-weight:600;">Total Titles</div>
                <div style="font-size:1.5rem;font-weight:800;color:#f1f5f9;margin-top:2px;">{{ $totalBooks }}</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon" style="background:rgba(74,222,128,0.15);color:#4ade80;">📦</div>
            <div>
                <div style="font-size:0.75rem;color:#64748b;text-transform:uppercase;letter-spacing:0.05em;font-weight:600;">Available Copies</div>
                <div style="font-size:1.5rem;font-weight:800;color:#f1f5f9;margin-top:2px;">{{ $totalCopies }}</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon" style="background:rgba(59,130,246,0.15);color:#3b82f6;">📖</div>
            <div>
                <div style="font-size:0.75rem;color:#64748b;text-transform:uppercase;letter-spacing:0.05em;font-weight:600;">Currently Read</div>
                <div style="font-size:1.5rem;font-weight:800;color:#f1f5f9;margin-top:2px;">{{ $totalBorrowed }}</div>
            </div>
        </div>
    </div>

    {{-- Quick Access --}}
    <h3 style="font-size:0.8rem;font-weight:600;color:#64748b;text-transform:uppercase;letter-spacing:0.1em;margin-bottom:1rem;">Quick Actions</h3>
    <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(220px,1fr));gap:1rem;">
        <a href="{{ route('author.books.create') }}" class="stat-card">
            <div class="stat-icon" style="background:rgba(217,119,6,1);color:#0f172a;">+</div>
            <div>
                <div style="font-size:0.75rem;color:#64748b;text-transform:uppercase;letter-spacing:0.05em;font-weight:600;">Publish</div>
                <div style="font-size:1.05rem;font-weight:700;color:#f1f5f9;margin-top:2px;">New Book</div>
            </div>
        </a>
        <a href="{{ route('author.books') }}" class="stat-card">
            <div class="stat-icon">📄</div>
            <div>
                <div style="font-size:0.75rem;color:#64748b;text-transform:uppercase;letter-spacing:0.05em;font-weight:600;">Manage</div>
                <div style="font-size:1.05rem;font-weight:700;color:#f1f5f9;margin-top:2px;">My Books</div>
            </div>
        </a>
    </div>
</x-app-layout>