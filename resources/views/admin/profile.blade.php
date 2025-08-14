<!-- resources/views/admin/profile.blade.php -->
<x-layouts.app title="Admin Profile">
    <h1 class="text-2xl font-bold mb-4">Edit Profile</h1>

    <form method="POST" action="{{ route('admin.profile.update') }}">
        @csrf
        <input type="text" name="name" value="{{ auth()->user()->name }}" class="border p-2 rounded mb-2">
        <input type="email" name="email" value="{{ auth()->user()->email }}" class="border p-2 rounded mb-2">
        <button type="submit" class="bg-blue-500 text-white p-2 rounded">Update</button>
    </form>
</x-layouts.app>
