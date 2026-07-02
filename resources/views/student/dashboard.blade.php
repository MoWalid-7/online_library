<<<<<<< HEAD
{{-- resources/views/student/dashboard.blade.php --}}
<x-app-layout title="Student Dashboard">
    <x-slot name="header">Dashboard</x-slot>

    {{-- Welcome Banner --}}
    <div style="background:linear-gradient(135deg,rgba(245,158,11,0.12),rgba(217,119,6,0.05));border:1px solid rgba(245,158,11,0.15);border-radius:20px;padding:2rem;margin-bottom:2rem;display:flex;align-items:center;gap:1.5rem;">
        <div style="width:60px;height:60px;background:linear-gradient(135deg,#f59e0b,#d97706);border-radius:18px;display:flex;align-items:center;justify-content:center;font-size:1.75rem;flex-shrink:0;box-shadow:0 8px 20px rgba(245,158,11,0.3);">👋</div>
        <div>
            <h2 style="font-size:1.4rem;font-weight:700;color:#f1f5f9;margin:0 0 0.25rem;">Welcome, {{ auth()->user()->name }}!</h2>
            <p style="color:#64748b;margin:0;font-size:0.9rem;">Explore the library and manage your borrowed books.</p>
        </div>
    </div>

    <h3 style="font-size:0.8rem;font-weight:600;color:#64748b;text-transform:uppercase;letter-spacing:0.1em;margin-bottom:1rem;">Quick Access</h3>
    <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(220px,1fr));gap:1rem;">
        <a href="{{ route('student.books') }}" class="stat-card">
            <div class="stat-icon">📚</div>
            <div>
                <div style="font-size:0.75rem;color:#64748b;text-transform:uppercase;letter-spacing:0.05em;font-weight:600;">Browse</div>
                <div style="font-size:1.05rem;font-weight:700;color:#f1f5f9;margin-top:2px;">All Books</div>
            </div>
        </a>
        <a href="{{ route('student.profile') }}" class="stat-card">
            <div class="stat-icon">👤</div>
            <div>
                <div style="font-size:0.75rem;color:#64748b;text-transform:uppercase;letter-spacing:0.05em;font-weight:600;">Edit</div>
                <div style="font-size:1.05rem;font-weight:700;color:#f1f5f9;margin-top:2px;">My Profile</div>
            </div>
        </a>
    </div>
</x-app-layout>
=======
@extends('layouts.app')

@section('title', 'Student Dashboard')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Welcome Student!</h1>

    <div class="grid grid-cols-2 gap-4">
        <a href="{{ route('student.books') }}" class="p-4 bg-white shadow rounded">View Books</a>
        <a href="{{ route('student.profile') }}" class="p-4 bg-white shadow rounded">Edit Profile</a>
    </div>
@endsection

>>>>>>> origin/online_library
