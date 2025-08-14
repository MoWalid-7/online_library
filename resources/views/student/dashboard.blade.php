@extends('layouts.app')

@section('title', 'Student Dashboard')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Welcome Student!</h1>

    <div class="grid grid-cols-2 gap-4">
        <a href="{{ route('student.books') }}" class="p-4 bg-white shadow rounded">View Books</a>
        <a href="{{ route('student.profile') }}" class="p-4 bg-white shadow rounded">Edit Profile</a>
    </div>
@endsection

