<!-- resources/views/admin/students/edit.blade.php -->
<x-app-layout title="Edit Student">
    <h1 class="text-2xl font-bold mb-4">Edit Student</h1>

    <form method="POST" action="{{ route('students.update', $student->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-2">
            <label class="block mb-1">Name</label>
            <input type="text" name="name" class="border p-2 rounded w-full" value="{{ $student->name }}" required>
        </div>
        <div class="mb-2">
            <label class="block mb-1">Email</label>
            <input type="email" name="email" class="border p-2 rounded w-full" value="{{ $student->email }}" required>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
    </form>
</x-app-layout>
