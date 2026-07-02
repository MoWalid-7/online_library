<x-app-layout title="{{ $book->title }}">
    <x-slot name="header">{{ $book->title }} Details</x-slot>

    <div style="background:rgba(30,41,59,0.5);border:1px solid rgba(255,255,255,0.05);border-radius:12px;padding:2rem;">
        <h2 style="font-size:2rem;color:#f1f5f9;margin-bottom:0.5rem;">{{ $book->title }}</h2>
        <p style="color:#94a3b8;font-size:1.1rem;margin-bottom:1.5rem;">By {{ $book->author }}</p>

        <div style="color:#cbd5e1;line-height:1.7;margin-bottom:2rem;">
            {{ $book->description }}
        </div>

        {{-- Action Buttons --}}
        <div style="display:flex; gap:10px; margin-bottom: 2rem;">
            @if($book->file_path)
            <a href="{{ route('student.books.read', $book->id) }}" style="background:#f59e0b;color:#1e293b;padding:10px 20px;border-radius:8px;text-decoration:none;font-weight:700;box-shadow:0 4px 6px rgba(245,158,11,0.2);">📖 Read Online</a>
            <a href="{{ route('student.books.download', $book->id) }}" style="background:#10b981;color:#1e293b;padding:10px 20px;border-radius:8px;text-decoration:none;font-weight:700;box-shadow:0 4px 6px rgba(16,185,129,0.2);">📥 Download PDF</a>
            @else
            <span style="color:#f87171;font-weight:600;">❌ No PDF file available for this book.</span>
            @endif
        </div>

        <hr style="border-color:rgba(255,255,255,0.1);margin:2rem 0;">

        {{-- Reviews Section --}}
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1.5rem;">
            <h3 style="color:#f1f5f9;font-size:1.5rem;margin:0;">Reviews & Ratings</h3>
            <div style="background:#1e293b;padding:6px 14px;border-radius:20px;color:#f59e0b;font-weight:bold;">
                ★ {{ number_format($book->averageRating(), 1) }} / 5.0
            </div>
        </div>

        {{-- Add Review Form --}}
        <div style="background:rgba(0,0,0,0.2);padding:1.5rem;border-radius:8px;margin-bottom:2rem;border:1px dashed rgba(255,255,255,0.1);">
            <h4 style="color:#e2e8f0;margin-bottom:1rem;font-size:1.1rem;">Add Your Review</h4>
            <form action="{{ route('student.books.review.store', $book->id) }}" method="POST">
                @csrf
                <div style="margin-bottom:1rem;">
                    <label style="color:#cbd5e1;display:block;margin-bottom:0.5rem;font-size:0.9rem;">Rating (1-5)</label>
                    <input type="number" name="rating" min="1" max="5" placeholder="Optional" style="width:100%;max-width:200px;padding:10px;border-radius:6px;background:#1e293b;border:1px solid #475569;color:#fff;outline:none;">
                </div>
                <div style="margin-bottom:1rem;">
                    <label style="color:#cbd5e1;display:block;margin-bottom:0.5rem;font-size:0.9rem;">Comment (Optional)</label>
                    <textarea name="comment" rows="3" style="width:100%;padding:10px;border-radius:6px;background:#1e293b;border:1px solid #475569;color:#fff;outline:none;resize:vertical;"></textarea>
                </div>
                <button type="submit" style="background:#3b82f6;color:#fff;padding:10px 20px;border-radius:8px;border:none;cursor:pointer;font-weight:600;transition:0.3s;">Submit Review</button>
            </form>
        </div>

        {{-- List Reviews --}}
        <div>
            @forelse($book->reviews as $review)
            <div style="background:rgba(255,255,255,0.02);padding:1.25rem;border-radius:8px;margin-bottom:1rem;border-left:4px solid #3b82f6;">
                <div style="display:flex;justify-content:space-between;margin-bottom:0.75rem;">
                    <strong style="color:#f1f5f9;">{{ $review->user->name }}</strong>
                    <span style="color:#f59e0b;letter-spacing:2px;">
                        @for($i=1; $i<=5; $i++)
                            @if($i <=$review->rating) ★ @else ☆ @endif
                            @endfor
                    </span>
                </div>
                @if($review->comment)
                <p style="color:#94a3b8;margin:0;line-height:1.5;font-size:0.95rem;">{{ $review->comment }}</p>
                @endif
            </div>
            @empty
            <p style="color:#64748b;font-style:italic;">No reviews yet. Be the first to review this book!</p>
            @endforelse
        </div>
    </div>
</x-app-layout>