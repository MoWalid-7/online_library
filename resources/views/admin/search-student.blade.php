<!-- resources/views/admin/search-student.blade.php -->
<x-layouts.app title="Search Students">
    <h1 class="text-2xl font-bold mb-4">Search Students</h1>

    <form method="GET" action="{{ route('admin.searchStudent') }}">
        <input type="text" name="query" placeholder="Search by name or email" class="border p-2 rounded">
        <button type="submit" class="bg-blue-500 text-white p-2 rounded">Search</button>
    </form>

    @if(isset($students))
        <ul class="mt-4">
            @foreach($students as $student)
                <li>
                    <a href="{{ route('admin.viewStudent', $student->id) }}">{{ $student->name }}</a>
                </li>
            @endforeach
        </ul>
    @endif
</x-layouts.app>
