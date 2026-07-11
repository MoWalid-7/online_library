{{-- resources/views/welcome.blade.php --}}
<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Library — Welcome</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css'])
    <style>
        html,
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            font-family: 'Inter', sans-serif;
            background: #0f172a;
            color: #f1f5f9;
            scroll-behavior: smooth;
        }

        /* ── Navbar ── */
        .topnav {
            position: sticky;
            top: 0;
            z-index: 100;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0.85rem 2rem;
            background: rgba(15, 23, 42, 0.85);
            backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(245, 158, 11, 0.1);
        }

        .topnav-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }

        .topnav-logo-icon {
            width: 38px;
            height: 38px;
            background: linear-gradient(135deg, #f59e0b, #d97706);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            box-shadow: 0 4px 12px rgba(245, 158, 11, 0.3);
        }

        .topnav-logo-text {
            font-size: 1rem;
            font-weight: 800;
            color: #f1f5f9;
        }

        .topnav-logo-sub {
            font-size: 0.7rem;
            color: #64748b;
        }

        .topnav-btns {
            display: flex;
            gap: 0.6rem;
            align-items: center;
        }

        .topnav-btn-outline {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(255, 255, 255, 0.05);
            color: #f1f5f9;
            font-weight: 600;
            font-size: 0.875rem;
            padding: 8px 18px;
            border-radius: 10px;
            text-decoration: none;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.2s;
        }

        .topnav-btn-outline:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: rgba(245, 158, 11, 0.3);
        }

        .topnav-btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: linear-gradient(135deg, #f59e0b, #d97706);
            color: #0f172a;
            font-weight: 700;
            font-size: 0.875rem;
            padding: 8px 18px;
            border-radius: 10px;
            text-decoration: none;
            box-shadow: 0 4px 14px rgba(245, 158, 11, 0.3);
            transition: all 0.2s;
        }

        .topnav-btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(245, 158, 11, 0.4);
        }

        .topnav-dashboard {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(245, 158, 11, 0.1);
            color: #f59e0b;
            font-weight: 600;
            font-size: 0.875rem;
            padding: 8px 18px;
            border-radius: 10px;
            text-decoration: none;
            border: 1px solid rgba(245, 158, 11, 0.25);
            transition: all 0.2s;
        }

        .topnav-dashboard:hover {
            background: rgba(245, 158, 11, 0.18);
        }

        /* ── Hero ── */
        .hero {
            min-height: 60vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 3rem 2rem 2rem;
            position: relative;
            overflow: hidden;
        }

        .glow-1 {
            position: absolute;
            top: -100px;
            left: -100px;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(245, 158, 11, 0.12) 0%, transparent 70%);
            border-radius: 50%;
            animation: pulse 6s ease-in-out infinite;
        }

        .glow-2 {
            position: absolute;
            bottom: -100px;
            right: -100px;
            width: 700px;
            height: 700px;
            background: radial-gradient(circle, rgba(59, 130, 246, 0.07) 0%, transparent 70%);
            border-radius: 50%;
            animation: pulse 8s ease-in-out infinite reverse;
        }

        .grid-pattern {
            position: absolute;
            inset: 0;
            background-image: linear-gradient(rgba(245, 158, 11, 0.04) 1px, transparent 1px), linear-gradient(90deg, rgba(245, 158, 11, 0.04) 1px, transparent 1px);
            background-size: 60px 60px;
            pointer-events: none;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(245, 158, 11, 0.1);
            border: 1px solid rgba(245, 158, 11, 0.25);
            border-radius: 50px;
            padding: 6px 16px;
            font-size: 0.8rem;
            font-weight: 600;
            color: #fbbf24;
            margin-bottom: 1.5rem;
            animation: fadeInUp 0.5s ease 0.1s both;
        }

        .hero-title {
            font-size: clamp(2.5rem, 6vw, 4.5rem);
            font-weight: 900;
            line-height: 1.1;
            margin: 0 0 1.5rem;
            letter-spacing: -0.03em;
            animation: fadeInUp 0.5s ease 0.2s both;
        }

        .hero-title .gold {
            background: linear-gradient(135deg, #f59e0b, #fbbf24);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-desc {
            font-size: 1.15rem;
            color: #94a3b8;
            max-width: 520px;
            line-height: 1.7;
            margin: 0 auto 2.5rem;
            text-align: center;
            animation: fadeInUp 0.5s ease 0.3s both;
        }

        .hero-btns {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            justify-content: center;
            animation: fadeInUp 0.5s ease 0.4s both;
        }

        .btn-hero-primary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(135deg, #f59e0b, #d97706);
            color: #0f172a;
            font-weight: 700;
            font-size: 1rem;
            padding: 14px 32px;
            border-radius: 14px;
            text-decoration: none;
            box-shadow: 0 8px 25px rgba(245, 158, 11, 0.35);
            transition: all 0.2s;
        }

        .btn-hero-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(245, 158, 11, 0.45);
        }

        .btn-hero-secondary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.06);
            color: #f1f5f9;
            font-weight: 600;
            font-size: 1rem;
            padding: 14px 32px;
            border-radius: 14px;
            text-decoration: none;
            border: 1px solid rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(10px);
            transition: all 0.2s;
        }

        .btn-hero-secondary:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: rgba(245, 158, 11, 0.3);
            transform: translateY(-3px);
        }

        /* ── Catalog Section ── */
        .catalog-section {
            padding: 3rem 2rem 5rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .catalog-header {
            text-align: center;
            margin-bottom: 2.5rem;
        }

        .catalog-header h2 {
            font-size: 2rem;
            font-weight: 800;
            margin: 0 0 0.5rem;
        }

        .catalog-header h2 .gold {
            background: linear-gradient(135deg, #f59e0b, #fbbf24);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .catalog-header p {
            color: #64748b;
            font-size: 0.95rem;
            margin: 0;
        }

        .search-bar {
            display: flex;
            gap: 0.5rem;
            max-width: 500px;
            margin: 1.5rem auto 0;
        }

        .search-bar input {
            flex: 1;
            background: rgba(30, 41, 59, 0.8);
            border: 1px solid rgba(245, 158, 11, 0.15);
            border-radius: 12px;
            padding: 12px 18px;
            color: #f1f5f9;
            font-size: 0.95rem;
            font-family: inherit;
            outline: none;
            transition: border-color 0.2s;
        }

        .search-bar input::placeholder {
            color: #475569;
        }

        .search-bar input:focus {
            border-color: #f59e0b;
        }

        .search-bar button {
            background: linear-gradient(135deg, #f59e0b, #d97706);
            color: #0f172a;
            font-weight: 700;
            padding: 12px 24px;
            border-radius: 12px;
            border: none;
            cursor: pointer;
            font-family: inherit;
            font-size: 0.95rem;
            transition: all 0.2s;
        }

        .search-bar button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(245, 158, 11, 0.35);
        }

        .books-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }

        .book-card {
            background: rgba(30, 41, 59, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.3s;
            display: flex;
            flex-direction: column;
        }

        .book-card:hover {
            transform: translateY(-6px);
            border-color: rgba(245, 158, 11, 0.25);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .book-cover {
            width: 100%;
            height: 200px;
            object-fit: cover;
            background: #1e293b;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .book-cover img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .book-cover-placeholder {
            width: 100%;
            height: 200px;
            background: linear-gradient(135deg, #1e293b, #0f172a);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
            opacity: 0.3;
        }

        .book-info {
            padding: 1.25rem;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .book-title {
            font-size: 1.05rem;
            font-weight: 700;
            color: #f1f5f9;
            margin: 0 0 0.35rem;
            line-height: 1.3;
        }

        .book-author {
            font-size: 0.85rem;
            color: #94a3b8;
            margin: 0 0 0.75rem;
        }

        .book-desc {
            font-size: 0.8rem;
            color: #64748b;
            line-height: 1.6;
            margin: 0 0 1rem;
            flex: 1;
        }

        .book-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-top: 0.75rem;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
        }

        .book-copies {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .book-copies .dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
        }

        .book-login-btn {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            background: rgba(245, 158, 11, 0.1);
            color: #f59e0b;
            font-weight: 600;
            font-size: 0.8rem;
            padding: 6px 14px;
            border-radius: 10px;
            text-decoration: none;
            transition: all 0.2s;
            border: 1px solid rgba(245, 158, 11, 0.2);
        }

        .book-login-btn:hover {
            background: rgba(245, 158, 11, 0.2);
        }

        .empty-catalog {
            text-align: center;
            padding: 4rem 2rem;
            background: rgba(30, 41, 59, 0.4);
            border: 1px dashed rgba(245, 158, 11, 0.15);
            border-radius: 20px;
        }

        .empty-catalog .icon {
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }

        .empty-catalog p {
            color: #64748b;
            font-size: 1rem;
            margin: 0;
        }

        .scroll-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: #94a3b8;
            font-size: 0.85rem;
            font-weight: 500;
            text-decoration: none;
            margin-top: 2.5rem;
            animation: fadeInUp 0.5s ease 0.5s both;
            transition: color 0.2s;
        }

        .scroll-link:hover {
            color: #f59e0b;
        }

        .scroll-link svg {
            animation: bounce-down 2s infinite;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }
        }

        @keyframes bounce-down {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(6px);
            }
        }
    </style>
</head>

<body>

    {{-- ── Navbar ── --}}
    <nav class="topnav">
        <a href="{{ route('home') }}" class="topnav-logo">
            <div class="topnav-logo-icon">📚</div>
            <div>
                <div class="topnav-logo-text">Online Library</div>
                <div class="topnav-logo-sub">Management System</div>
            </div>
        </a>
        <div class="topnav-btns">
            @auth
            <a href="{{ route('dashboard') }}" class="topnav-dashboard">🏠 Dashboard</a>
            @else
            <a href="{{ route('login') }}" class="topnav-btn-outline">🔑 Sign In</a>
            <a href="{{ route('register') }}" class="topnav-btn-primary">✨ Create Account</a>
            @endauth
        </div>
    </nav>

    {{-- ── Hero Section ── --}}
    <div class="hero">
        <div class="glow-1"></div>
        <div class="glow-2"></div>
        <div class="grid-pattern"></div>

        <div style="position:relative;z-index:1;max-width:700px;width:100%;">
            <div class="hero-badge">
                <span>📚</span> Online Library System
            </div>

            <h1 class="hero-title">
                Your Digital<br><span class="gold">Library Hub</span>
            </h1>

            <p class="hero-desc">
                Manage books, track borrowing records, and empower students — all in one elegant, easy-to-use platform.
            </p>

            <a href="#catalog" class="scroll-link">
                <span>Browse Our Collection</span>
                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                </svg>
            </a>
        </div>
    </div>

    {{-- ── Books Catalog Section ── --}}
    <section class="catalog-section" id="catalog">
        <div class="catalog-header">
            <h2>Explore Our <span class="gold">Book Collection</span></h2>
            <p>Browse through all available books — sign in to read or download.</p>
        </div>

        {{-- Search Bar --}}
        <form method="GET" action="{{ route('home') }}#catalog" class="search-bar">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by book title or author name...">
            <button type="submit">🔍 Search</button>
        </form>

        {{-- Books Grid --}}
        <div class="books-grid">
            @forelse($books as $book)
            <div class="book-card">
                @if($book->cover_image)
                <div class="book-cover">
                    <img src="{{ asset('storage/' . $book->cover_image) }}" alt="{{ $book->title }}">
                </div>
                @else
                <div class="book-cover-placeholder">📖</div>
                @endif

                <div class="book-info">
                    <h3 class="book-title">{{ $book->title }}</h3>
                    <p class="book-author">By {{ $book->author }}</p>

                    @if($book->description)
                    <p class="book-desc">{{ Str::limit($book->description, 100) }}</p>
                    @endif

                    <div class="book-footer">
                        <div class="book-copies">
                            <span class="dot" style="background:{{ $book->available_copies > 0 ? '#4ade80' : '#f87171' }};box-shadow:0 0 8px {{ $book->available_copies > 0 ? 'rgba(74,222,128,0.5)' : 'rgba(248,113,113,0.5)' }};"></span>
                            <span style="color:{{ $book->available_copies > 0 ? '#4ade80' : '#f87171' }};">
                                {{ $book->available_copies }} {{ $book->available_copies == 1 ? 'copy' : 'copies' }}
                            </span>
                        </div>

                        @auth
                        <a href="{{ route('student.books.show', $book->id) }}" class="book-login-btn">
                            📖 View
                        </a>
                        @else
                        <a href="{{ route('login') }}" class="book-login-btn">
                            🔒 Sign in to read
                        </a>
                        @endauth
                    </div>
                </div>
            </div>
            @empty
            <div class="empty-catalog" style="grid-column:1/-1;">
                <div class="icon">📚</div>
                <p>No books available yet. Check back soon!</p>
            </div>
            @endforelse
        </div>
    </section>

</body>

</html>
