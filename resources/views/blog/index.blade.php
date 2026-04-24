<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Go-Blog — Beranda</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        *{box-sizing:border-box;margin:0;padding:0}
        body{font-family:'Inter',sans-serif;background:#F8FAFC;color:#1E293B}
        .navbar{background:#fff;border-bottom:1px solid #E2E8F0;padding:0 32px;height:64px;display:flex;align-items:center;justify-content:space-between;position:sticky;top:0;z-index:50;box-shadow:0 1px 8px rgba(0,0,0,.06)}
        .brand{display:flex;align-items:center;gap:8px;font-weight:800;font-size:1.2rem;color:#2563EB;text-decoration:none}
        .brand svg{width:24px;height:24px;fill:#2563EB}
        .nav-links{display:flex;align-items:center;gap:16px}
        .btn-nav{padding:8px 20px;border-radius:50px;font-size:.85rem;font-weight:600;text-decoration:none;transition:all .2s}
        .btn-outline{border:1.5px solid #E2E8F0;color:#64748B}
        .btn-outline:hover{border-color:#2563EB;color:#2563EB}
        .btn-primary{background:#2563EB;color:#fff;box-shadow:0 4px 12px rgba(37,99,235,.3)}
        .btn-primary:hover{background:#1D4ED8}
        .hero{background:linear-gradient(135deg,#1E3A8A 0%,#2563EB 50%,#3B82F6 100%);color:#fff;padding:80px 32px;text-align:center}
        .hero h1{font-size:2.8rem;font-weight:800;margin-bottom:12px;letter-spacing:-1px}
        .hero p{font-size:1.05rem;opacity:.85;max-width:480px;margin:0 auto 28px}
        .hero-btn{display:inline-block;padding:13px 32px;background:#fff;color:#2563EB;border-radius:50px;font-weight:700;font-size:.95rem;text-decoration:none;box-shadow:0 8px 24px rgba(0,0,0,.15);transition:transform .2s}
        .hero-btn:hover{transform:translateY(-2px)}
        .container{max-width:1100px;margin:0 auto;padding:48px 24px}
        .section-title{font-size:1.4rem;font-weight:700;margin-bottom:28px;color:#1E293B}
        .posts-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(300px,1fr));gap:24px}
        .post-card{background:#fff;border-radius:16px;overflow:hidden;box-shadow:0 2px 12px rgba(0,0,0,.07);transition:transform .2s,box-shadow .2s;text-decoration:none;display:block}
        .post-card:hover{transform:translateY(-4px);box-shadow:0 12px 32px rgba(0,0,0,.12)}
        .post-img{height:180px;background:linear-gradient(135deg,#DBEAFE,#EFF6FF);display:flex;align-items:center;justify-content:center}
        .post-img svg{width:48px;height:48px;color:#93C5FD}
        .post-body{padding:20px}
        .post-cat{font-size:.72rem;font-weight:700;text-transform:uppercase;letter-spacing:.5px;color:#2563EB;background:#EFF6FF;padding:3px 10px;border-radius:20px;display:inline-block;margin-bottom:10px}
        .post-title{font-size:1rem;font-weight:700;color:#1E293B;margin-bottom:8px;line-height:1.4}
        .post-excerpt{font-size:.83rem;color:#64748B;line-height:1.5;margin-bottom:14px}
        .post-meta{display:flex;align-items:center;gap:12px;font-size:.75rem;color:#94A3B8}
        .empty-state{text-align:center;padding:80px 20px;color:#64748B}
        .empty-state svg{width:64px;height:64px;color:#CBD5E1;margin-bottom:16px}
        .empty-state h3{font-size:1.2rem;font-weight:600;margin-bottom:8px}
        footer{background:#1E293B;color:#94A3B8;text-align:center;padding:24px;font-size:.83rem;margin-top:60px}
    </style>
</head>
<body>
    <nav class="navbar">
        <a href="{{ route('home') }}" class="brand">
            <svg viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
            Go-Blog
        </a>
        <div class="nav-links">
            @auth
                <span style="font-size:.85rem;color:#64748B">Hai, {{ auth()->user()->name }}!</span>
                @if(auth()->user()->isAdmin())
                    <a href="{{ route('admin.dashboard') }}" class="btn-nav btn-primary">Dashboard</a>
                @endif
                <form method="POST" action="{{ route('logout') }}" style="display:inline">
                    @csrf
                    <button type="submit" class="btn-nav btn-outline" style="border:none;cursor:pointer;background:none;font-family:inherit">Keluar</button>
                </form>
            @else
                <a href="{{ route('login.visitor') }}" class="btn-nav btn-outline">Masuk</a>
                <a href="{{ route('register') }}" class="btn-nav btn-primary">Daftar</a>
            @endauth
        </div>
    </nav>

    @if(session('success'))
        <div style="background:#ECFDF5;border-bottom:1px solid #6EE7B7;padding:12px 32px;font-size:.85rem;color:#065F46;text-align:center">
            {{ session('success') }}
        </div>
    @endif

    <section class="hero">
        <h1>Jelajahi Dunia Bersama Kami ✈️</h1>
        <p>Temukan cerita perjalanan inspiratif dari berbagai penjuru dunia</p>
        @guest
            <a href="{{ route('register') }}" class="hero-btn">Bergabung Sekarang</a>
        @endguest
    </section>

    <div class="container">
        <div class="section-title">Artikel Terbaru</div>

        @if($posts->isEmpty())
            <div class="empty-state">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                <h3>Belum Ada Artikel</h3>
                <p>Admin belum memposting artikel apapun. Cek lagi nanti!</p>
            </div>
        @else
            <div class="posts-grid">
                @foreach($posts as $post)
                    <a href="{{ route('posts.show', $post->slug) }}" class="post-card">
                        <div class="post-img">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064"/>
                            </svg>
                        </div>
                        <div class="post-body">
                            <span class="post-cat">{{ $post->category ?? 'Umum' }}</span>
                            <div class="post-title">{{ $post->title }}</div>
                            <div class="post-excerpt">{{ Str::limit($post->excerpt ?? $post->body, 90) }}</div>
                            <div class="post-meta">
                                <span>📍 {{ $post->location }}</span>
                                <span>👁 {{ $post->views }}</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            <div style="margin-top:32px">{{ $posts->links() }}</div>
        @endif
    </div>

    <footer>© {{ date('Y') }} Go-Blog. Platform blog travel terbaik.</footer>
</body>
</html>
