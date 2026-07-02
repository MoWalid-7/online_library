<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Online Library') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body style="background:#0f172a; min-height:100vh; display:flex; align-items:center; justify-content:center; font-family:'Inter',sans-serif; position:relative; overflow:hidden;">

    {{-- Background decoration --}}
    <div style="position:absolute;inset:0;overflow:hidden;pointer-events:none;">
        <div style="position:absolute;top:-20%;left:-10%;width:500px;height:500px;background:radial-gradient(circle,rgba(245,158,11,0.08) 0%,transparent 70%);border-radius:50%;"></div>
        <div style="position:absolute;bottom:-20%;right:-10%;width:600px;height:600px;background:radial-gradient(circle,rgba(59,130,246,0.05) 0%,transparent 70%);border-radius:50%;"></div>
        <div style="position:absolute;top:30%;right:5%;opacity:0.03;font-size:18rem;pointer-events:none;">📚</div>
    </div>

    <div style="width:100%;max-width:440px;padding:1.5rem;position:relative;z-index:1;">

        {{-- Logo --}}
        <div style="text-align:center;margin-bottom:2rem;">
            <div style="width:64px;height:64px;background:linear-gradient(135deg,#f59e0b,#d97706);border-radius:18px;display:flex;align-items:center;justify-content:center;font-size:2rem;margin:0 auto 1rem;box-shadow:0 8px 25px rgba(245,158,11,0.3);">📚</div>
            <h1 style="font-size:1.5rem;font-weight:800;color:#f1f5f9;margin:0 0 0.25rem;">Online Library</h1>
            <p style="color:#64748b;font-size:0.875rem;margin:0;">Management System</p>
        </div>

        {{-- Glass card --}}
        <div class="glass-card animate-fade-in-up">
            {{ $slot }}
        </div>

    </div>
</body>

</html>