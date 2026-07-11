<!-- resources/views/admin/students/create.blade.php -->
<x-app-layout title="Add New Student">
    <h1 class="text-2xl font-bold mb-4">Add New Student</h1>

    <form method="POST" action="{{ route('students.store') }}">
        @csrf
        <div class="mb-2">
            <label class="block mb-1">Name</label>
            <input type="text" name="name" class="border p-2 rounded w-full" required>
        </div>
        <div class="mb-2">
            <label class="block mb-1">Email</label>
            <input type="email" name="email" class="border p-2 rounded w-full" required>
        </div>
        <div class="mb-2">
            <label class="block mb-1">Password</label>
            <input type="password" name="password" class="border p-2 rounded w-full" required>
        </div>
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Save</button>
    </form>
</x-app-layout>
