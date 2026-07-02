{{-- resources/views/author/books/create.blade.php --}}
<x-app-layout title="Publish New Book">
    <x-slot name="header">Publish New Book</x-slot>

    <div style="max-width:580px; margin:0 auto;">
        <div class="card">
            <form method="POST" action="{{ route('author.books.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label class="form-label">Book Title *</label>
                    <input type="text" name="title" value="{{ old('title') }}" class="form-input" required>
                    @error('title')<p style="color:#f87171;font-size:0.8rem;margin-top:4px;">{{ $message }}</p>@enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Cover Image</label>
                    <input type="file" name="cover_image" accept="image/*" class="form-input" style="padding:10px;">
                    @error('cover_image')<p style="color:#f87171;font-size:0.8rem;margin-top:4px;">{{ $message }}</p>@enderror
                </div>

                <div class="form-group">
                    <label class="form-label">📄 Book PDF File</label>
                    <input type="file" name="file_path" accept="application/pdf,.pdf,.PDF" class="form-input" style="padding:10px;">
                    <p style="color:#94a3b8;font-size:0.78rem;margin-top:4px;">Max 20MB · PDF only</p>
                    @error('file_path')<p style="color:#f87171;font-size:0.8rem;margin-top:4px;">{{ $message }}</p>@enderror
                </div>

                <div style="display:grid;grid-template-columns:1fr 1fr;gap:1rem;">
                    <div class="form-group">
                        <label class="form-label">ISBN</label>
                        <input type="text" name="isbn" value="{{ old('isbn') }}" class="form-input" placeholder="e.g. 978-3-16-148410-0">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Publication Date</label>
                        <input type="date" name="published_at" value="{{ old('published_at') }}" class="form-input">
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Description *</label>
                    <textarea name="description" class="form-input" rows="5" required>{{ old('description') }}</textarea>
                </div>

                <div class="form-group">
                    <label class="form-label">Initial Available Copies *</label>
                    <input type="number" name="available_copies" value="{{ old('available_copies', 1) }}" class="form-input" min="0" required>
                </div>

                <div style="display:flex;gap:0.75rem;margin-top:1rem;">
                    <button type="submit" class="btn-primary">
                        🚀 Publish Book
                    </button>
                    <a href="{{ route('author.books') }}" class="btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>