<!-- resources/views/components/navbar.blade.php -->
<nav class="bg-white shadow p-4">
    <div class="container mx-auto flex justify-between">
        <a href="/" class="font-bold text-lg">Online Library</a>
        <div>
            @auth
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="mr-4">Dashboard</a>
                @else
                    <a href="{{ route('student.dashboard') }}" class="mr-4">Dashboard</a>
                @endif
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="text-red-500">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="mr-4">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth
        </div>
    </div>
</nav>

