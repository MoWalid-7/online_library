<x-app-layout title="Read {{ $book->title }}">
    <x-slot name="header">Reading: {{ $book->title }}</x-slot>

    <div style="display:flex;flex-direction:column;align-items:center;height:85vh;margin-bottom:2rem;">
        <div style="width:100%;display:flex;justify-content:space-between;align-items:center;margin-bottom:1rem;">
            <a href="{{ route('student.books.show', $book->id) }}" style="color:#cbd5e1;text-decoration:none;font-weight:600;display:flex;align-items:center;gap:5px;">
                <span>⬅</span> Back to Details
            </a>
            <a href="{{ route('student.books.download', $book->id) }}" style="background:#10b981;color:#1e293b;padding:8px 16px;border-radius:6px;text-decoration:none;font-weight:700;font-size:0.9rem;">
                📥 Download PDF
            </a>
        </div>

        <div style="width:100%;height:100%;background:#1e293b;border-radius:12px;overflow:hidden;box-shadow:0 10px 25px rgba(0,0,0,0.5);">
            <iframe src="{{ Storage::url($book->file_path) }}" width="100%" height="100%" style="border:none;"></iframe>
        </div>
    </div>
</x-app-layout>