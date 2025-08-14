<!-- resources/views/student/profile.blade.php -->
@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Edit Profile</h1>

    <form method="POST" action="{{ route('student.profile.update') }}">
        @csrf
        <div class="mb-4">
            <label for="name" class="block">Name</label>
            <input type="text" name="name" id="name"
                   value="{{ old('name', auth()->user()->name) }}"
                   class="border p-2 w-full rounded">
        </div>

        <div class="mb-4">
            <label for="email" class="block">Email</label>
            <input type="email" name="email" id="email"
                   value="{{ old('email', auth()->user()->email) }}"
                   class="border p-2 w-full rounded">
        </div>

        <button class="bg-blue-700 hover:bg-blue-800 text-white font-bold px-4 py-2 rounded"  style="background-color: #016dd9ff;">
            Update
        </button>
    </form>
@endsection
