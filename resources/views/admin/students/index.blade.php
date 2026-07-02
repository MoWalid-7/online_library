<!-- resources/views/admin/students/index.blade.php -->
<<<<<<< HEAD
<x-app-layout title="Manage Students">
=======
<x-layouts.app title="Manage Students">
>>>>>>> origin/online_library
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Students</h1>
        <a href="{{ route('students.create') }}" class="bg-green-500 text-white px-4 py-2 rounded">Add New Student</a>
    </div>

    <table class="w-full border">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">ID</th>
                <th class="border px-4 py-2">Name</th>
                <th class="border px-4 py-2">Email</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <td class="border px-4 py-2">{{ $student->id }}</td>
                <td class="border px-4 py-2">{{ $student->name }}</td>
                <td class="border px-4 py-2">{{ $student->email }}</td>
                <td class="border px-4 py-2 flex gap-2">
                    <a href="{{ route('students.edit', $student->id) }}" class="bg-blue-500 text-white px-2 py-1 rounded">Edit</a>
                    <form method="POST" action="{{ route('students.destroy', $student->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
<<<<<<< HEAD
</x-app-layout>
=======
</x-layouts.app>
>>>>>>> origin/online_library
