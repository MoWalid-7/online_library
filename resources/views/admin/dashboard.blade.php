<!-- resources/views/admin/dashboard.blade.php -->
<x-layouts.app title="Admin Dashboard">
    <h1 class="text-2xl font-bold mb-4">Welcome Admin!</h1>

    <div class="grid grid-cols-2 gap-4">
        <a href="{{ route('books.index') }}" class="p-4 bg-white shadow rounded">Manage Books</a>
        <a href="{{ route('admin.searchStudent') }}" class="p-4 bg-white shadow rounded">Search Students</a>
        <a href="{{ route('admin.profile') }}" class="p-4 bg-white shadow rounded">Edit Profile</a>
    </div>
</x-layouts.app>
