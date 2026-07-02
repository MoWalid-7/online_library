<<<<<<< HEAD
{{-- resources/views/admin/profile.blade.php --}}
<x-app-layout title="My Profile">
    <x-slot name="header">My Profile</x-slot>

    <div style="max-width:580px; margin:0 auto;">
        {{-- Profile header card --}}
        <div style="background:linear-gradient(135deg,rgba(245,158,11,0.1),rgba(217,119,6,0.05));border:1px solid rgba(245,158,11,0.15);border-radius:20px;padding:2rem;margin-bottom:1.5rem;display:flex;align-items:center;gap:1.5rem;">
            <div style="width:70px;height:70px;background:linear-gradient(135deg,#f59e0b,#d97706);border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:1.75rem;font-weight:800;color:#0f172a;flex-shrink:0;box-shadow:0 8px 20px rgba(245,158,11,0.3);">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>
            <div>
                <div style="font-size:1.25rem;font-weight:700;color:#f1f5f9;">{{ auth()->user()->name }}</div>
                <div style="color:#64748b;font-size:0.9rem;margin-top:2px;">{{ auth()->user()->email }}</div>
                <span class="badge badge-amber" style="margin-top:8px;">{{ ucfirst(auth()->user()->role) }}</span>
            </div>
        </div>

        <div class="card">
            <h3 style="font-size:1rem;font-weight:600;color:#f1f5f9;margin:0 0 1.25rem;">Update Information</h3>
            <form method="POST" action="{{ route('admin.profile.update') }}">
                @csrf

                <div class="form-group">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="name" value="{{ auth()->user()->name }}" class="form-input" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Email Address</label>
                    <input type="email" name="email" value="{{ auth()->user()->email }}" class="form-input" required>
                </div>

                <div style="margin-top:0.5rem;">
                    <button type="submit" class="btn-primary">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
=======
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
>>>>>>> origin/online_library
