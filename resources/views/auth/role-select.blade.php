<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk — Go-Blog</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        *{box-sizing:border-box;margin:0;padding:0}
        :root{--blue:#2563EB;--green:#059669;--text:#1E293B;--muted:#64748B}
        body{font-family:'Inter',sans-serif;min-height:100vh;display:flex;align-items:center;justify-content:center;overflow:hidden}
        .bg{position:fixed;inset:0;background-image:url('/images/travel_bg.png');background-size:cover;background-position:center;z-index:0}
        .overlay{position:fixed;inset:0;background:rgba(0,0,0,.35);z-index:1}
        .frame{position:fixed;inset:10px;border:3px solid rgba(59,130,246,.7);border-radius:20px;z-index:2;pointer-events:none}
        .logo{position:fixed;top:26px;left:30px;z-index:10;display:flex;align-items:center;gap:8px;color:#fff;font-weight:700;font-size:1rem;text-shadow:0 1px 4px rgba(0,0,0,.5)}
        .logo svg{width:22px;height:22px;fill:#60A5FA}
        .wrapper{position:relative;z-index:10;width:100%;max-width:500px;padding:0 20px;animation:up .5s cubic-bezier(.22,1,.36,1)}
        @keyframes up{from{opacity:0;transform:translateY(28px) scale(.96)}to{opacity:1;transform:none}}
        .card{background:rgba(255,255,255,.97);border-radius:20px;padding:44px 40px 36px;box-shadow:0 24px 70px rgba(0,0,0,.3)}
        .card-header{text-align:center;margin-bottom:8px}
        .card-header h1{font-size:1.7rem;font-weight:800;color:var(--text);letter-spacing:-.5px}
        .card-header p{font-size:.88rem;color:var(--muted);margin-top:6px}
        .divider{display:flex;align-items:center;gap:12px;margin:26px 0;font-size:.78rem;color:var(--muted)}
        .divider::before,.divider::after{content:'';flex:1;height:1px;background:#E2E8F0}
        .role-grid{display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:26px}
        .role-card{display:flex;flex-direction:column;align-items:center;gap:14px;padding:28px 16px;border-radius:16px;border:2px solid #E2E8F0;text-decoration:none;background:#F8FAFC;position:relative;overflow:hidden;transition:all .22s cubic-bezier(.34,1.56,.64,1)}
        .role-card:hover{transform:translateY(-4px) scale(1.02)}
        .role-card.admin:hover{border-color:var(--blue);box-shadow:0 12px 32px rgba(37,99,235,.2);background:#EFF6FF}
        .role-card.visitor:hover{border-color:var(--green);box-shadow:0 12px 32px rgba(5,150,105,.2);background:#ECFDF5}
        .badge{position:absolute;top:10px;right:10px;font-size:.64rem;font-weight:700;padding:2px 8px;border-radius:20px;text-transform:uppercase;letter-spacing:.5px}
        .role-card.admin .badge{background:#DBEAFE;color:var(--blue)}
        .role-card.visitor .badge{background:#D1FAE5;color:var(--green)}
        .icon-wrap{width:64px;height:64px;border-radius:50%;display:flex;align-items:center;justify-content:center;transition:transform .22s}
        .role-card:hover .icon-wrap{transform:scale(1.1)}
        .role-card.admin .icon-wrap{background:linear-gradient(135deg,#2563EB,#1D4ED8);box-shadow:0 6px 20px rgba(37,99,235,.4)}
        .role-card.visitor .icon-wrap{background:linear-gradient(135deg,#059669,#047857);box-shadow:0 6px 20px rgba(5,150,105,.4)}
        .icon-wrap svg{width:30px;height:30px;stroke:#fff;fill:none}
        .role-title{font-size:.95rem;font-weight:700;color:var(--text);text-align:center;margin-bottom:4px}
        .role-desc{font-size:.75rem;color:var(--muted);text-align:center;line-height:1.4}
        .arrow{position:absolute;bottom:12px;right:12px;opacity:0;transform:translateX(-6px);transition:all .2s}
        .role-card:hover .arrow{opacity:1;transform:translateX(0)}
        .arrow svg{width:16px;height:16px}
        .role-card.admin .arrow svg{stroke:var(--blue)}
        .role-card.visitor .arrow svg{stroke:var(--green)}
        .footer-text{text-align:center;font-size:.8rem;color:var(--muted)}
        .footer-text a{color:var(--green);font-weight:600;text-decoration:none}
        .footer-text a:hover{text-decoration:underline}
        .features{display:flex;justify-content:center;gap:24px;margin-top:22px;padding-top:18px;border-top:1px solid #F1F5F9}
        .feat-item{display:flex;flex-direction:column;align-items:center;gap:5px;font-size:.72rem;color:var(--muted);font-weight:500}
        .feat-item svg{width:20px;height:20px;color:#94A3B8}
    </style>
</head>
<body>
    <div class="bg"></div>
    <div class="overlay"></div>
    <div class="frame"></div>
    <div class="logo">
        <svg viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
        Go-Blog
    </div>

    <div class="wrapper">
        <div class="card">
            <div class="card-header">
                <h1>Selamat Datang! 👋</h1>
                <p>Pilih bagaimana Anda ingin masuk ke Go-Blog</p>
            </div>
            <div class="divider"><span>Pilih peran login Anda</span></div>

            <div class="role-grid">
                <!-- Admin -->
                <a href="{{ route('login.admin') }}" class="role-card admin" id="btn-admin-login">
                    <span class="badge">Staff</span>
                    <div class="icon-wrap">
                        <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                        </svg>
                    </div>
                    <div>
                        <div class="role-title">Login Admin</div>
                        <div class="role-desc">Kelola blog, post, dan komentar</div>
                    </div>
                    <span class="arrow"><svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg></span>
                </a>

                <!-- Visitor -->
                <a href="{{ route('login.visitor') }}" class="role-card visitor" id="btn-visitor-login">
                    <span class="badge">Publik</span>
                    <div class="icon-wrap">
                        <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.8" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <div>
                        <div class="role-title">Login Pengunjung</div>
                        <div class="role-desc">Baca &amp; komentari artikel blog</div>
                    </div>
                    <span class="arrow"><svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg></span>
                </a>
            </div>

            <p class="footer-text">Belum punya akun? <a href="{{ route('register') }}" id="link-register">Daftar sebagai Pengunjung &rarr;</a></p>

            <div class="features">
                <div class="feat-item">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                    Aman
                </div>
                <div class="feat-item">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    Cepat
                </div>
                <div class="feat-item">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Terpercaya
                </div>
            </div>
        </div>
    </div>
</body>
</html>
