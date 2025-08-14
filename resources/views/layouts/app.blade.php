<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Online Library' }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <x-navbar />  <!-- Navbar Component -->

    <main class="container mx-auto mt-6">
        @yield('content')
    </main>

</body>
</html>

