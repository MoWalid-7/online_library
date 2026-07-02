{{-- resources/views/author/books/edit.blade.php --}}
<x-app-layout title="Edit Book">
    <x-slot name="header">Edit Book Info</x-slot>

    <div style="max-width:580px; margin:0 auto;">
        <div class="card">
            <form method="POST" action="{{ route('author.books.update', $book->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @if($book->cover_image)
                <div style="margin-bottom:1.5rem;">
                    <label class="form-label">Current Cover</label>
                    <img src="{{ asset('storage/' . $book->cover_image) }}" alt="Cover" style="width:100px;height:auto;border-radius:8px;border:1px solid rgba(255,255,255,0.1);">
                </div>
                @endif

                <div class="form-group">
                    <label class="form-label">Book Title *</label>
                    <input type="text" name="title" value="{{ old('title', $book->title) }}" class="form-input" required>
                    @error('title')<p style="color:#f87171;font-size:0.8rem;margin-top:4px;">{{ $message }}</p>@enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Replace Cover Image (Optional)</label>
                    <input type="file" name="cover_image" accept="image/*" class="form-input" style="padding:10px;">
                    @error('cover_image')<p style="color:#f87171;font-size:0.8rem;margin-top:4px;">{{ $message }}</p>@enderror
                </div>

                <div class="form-group">
                    <label class="form-label">📄 Replace PDF File (Optional)</label>
                    @if($book->file_path)
                    <p style="font-size:0.82rem;margin-bottom:6px;color:#94a3b8;">
                        Current: <a href="{{ asset('storage/' . $book->file_path) }}" target="_blank" style="color:#f59e0b;">📥 Download PDF</a>
                    </p>
                    @endif
                    <input type="file" name="file_path" accept="application/pdf,.pdf,.PDF" class="form-input" style="padding:10px;">
                    <p style="color:#94a3b8;font-size:0.78rem;margin-top:4px;">Max 20MB · PDF only</p>
                    @error('file_path')<p style="color:#f87171;font-size:0.8rem;margin-top:4px;">{{ $message }}</p>@enderror
                </div>

                <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;">
                    <div class="form-group">
                        <label class="form-label">ISBN</label>
                        <input type="text" name="isbn" value="{{ old('isbn', $book->isbn) }}" class="form-input">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Publication Date</label>
                        <input type="date" name="published_at" value="{{ old('published_at', optional($book->published_at)->format('Y-m-d')) }}" class="form-input">
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Description *</label>
                    <textarea name="description" class="form-input" rows="5" required>{{ old('description', $book->description) }}</textarea>
                </div>

                <div class="form-group">
                    <label class="form-label">Available Copies *</label>
                    <input type="number" name="available_copies" value="{{ old('available_copies', $book->available_copies) }}" class="form-input" min="0" required>
                </div>

                <div style="display:flex;gap:0.75rem;margin-top:1rem;">
                    <button type="submit" class="btn-primary">
                        💾 Save Changes
                    </button>
                    <a href="{{ route('author.books') }}" class="btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>