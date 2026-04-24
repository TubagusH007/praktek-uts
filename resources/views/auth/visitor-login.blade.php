<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Pengunjung — Go-Blog</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        *{box-sizing:border-box;margin:0;padding:0}
        :root{--p:#059669;--pd:#047857;--pl:#10B981;--text:#1E293B;--muted:#64748B;--border:#E2E8F0;--ibg:#F8FAFC}
        body{font-family:'Inter',sans-serif;min-height:100vh;display:flex;align-items:center;justify-content:center;overflow:hidden}
        .bg{position:fixed;inset:0;background-image:url('/images/travel_bg.png');background-size:cover;background-position:center;z-index:0}
        .overlay{position:fixed;inset:0;background:rgba(0,0,0,.28);z-index:1}
        .frame{position:fixed;inset:10px;border:3px solid rgba(16,185,129,.65);border-radius:20px;z-index:2;pointer-events:none}
        .logo{position:fixed;top:26px;left:30px;z-index:10;display:flex;align-items:center;gap:8px;color:#fff;font-weight:700;font-size:1rem;text-shadow:0 1px 4px rgba(0,0,0,.5)}
        .logo svg{width:22px;height:22px;fill:#34D399}
        .wrapper{position:relative;z-index:10;width:100%;max-width:440px;padding:0 20px;animation:up .5s cubic-bezier(.22,1,.36,1)}
        @keyframes up{from{opacity:0;transform:translateY(28px) scale(.96)}to{opacity:1;transform:none}}
        .card{background:rgba(255,255,255,.97);border-radius:18px;padding:40px 40px 36px;box-shadow:0 24px 60px rgba(0,0,0,.28)}
        .avatar-wrap{display:flex;justify-content:center;margin-bottom:16px}
        .avatar-circle{width:64px;height:64px;border-radius:50%;background:linear-gradient(135deg,var(--p),var(--pd));display:flex;align-items:center;justify-content:center;box-shadow:0 8px 24px rgba(5,150,105,.35)}
        .avatar-circle svg{width:32px;height:32px;stroke:#fff;fill:none}
        .card-header{text-align:center;margin-bottom:26px}
        .card-header h1{font-size:1.55rem;font-weight:700;color:var(--p);margin-bottom:4px}
        .card-header p{font-size:.84rem;color:var(--muted)}
        .form-group{margin-bottom:16px}
        .form-group label{display:block;font-size:.82rem;font-weight:500;color:var(--text);margin-bottom:6px}
        .input-wrap{position:relative}
        .input-wrap input{width:100%;padding:12px 16px;border:1.5px solid var(--border);border-radius:10px;font-family:'Inter',sans-serif;font-size:.88rem;color:var(--text);background:var(--ibg);outline:none;transition:border-color .2s,box-shadow .2s}
        .input-wrap input::placeholder{color:#B0BAC9}
        .input-wrap input:focus{border-color:var(--pl);background:#fff;box-shadow:0 0 0 3px rgba(16,185,129,.14)}
        .input-wrap input.err{border-color:#FCA5A5;background:#FFF5F5}
        .eye{position:absolute;right:12px;top:50%;transform:translateY(-50%);cursor:pointer;color:#94A3B8;display:flex;align-items:center;transition:color .2s}
        .eye:hover{color:var(--p)}
        .eye svg{width:18px;height:18px}
        .field-err{font-size:.76rem;color:#DC2626;margin-top:4px}
        .row{display:flex;align-items:center;justify-content:space-between;margin:4px 0 22px}
        .chk-label{display:flex;align-items:center;gap:7px;font-size:.82rem;color:var(--muted);cursor:pointer}
        .chk-label input{accent-color:var(--p);width:14px;height:14px}
        .forgot{font-size:.82rem;font-weight:500;color:var(--p);text-decoration:none}
        .forgot:hover{opacity:.75}
        .btn{width:100%;padding:13px;background:linear-gradient(135deg,var(--p),var(--pd));color:#fff;border:none;border-radius:50px;font-family:'Inter',sans-serif;font-size:.92rem;font-weight:600;cursor:pointer;letter-spacing:.3px;box-shadow:0 4px 16px rgba(5,150,105,.4);transition:transform .15s,box-shadow .2s}
        .btn:hover{transform:translateY(-1px);box-shadow:0 6px 22px rgba(5,150,105,.5)}
        .btn:active{transform:translateY(0)}
        .divider{display:flex;align-items:center;gap:10px;margin:18px 0 14px;font-size:.78rem;color:var(--muted)}
        .divider::before,.divider::after{content:'';flex:1;height:1px;background:var(--border)}
        .links{text-align:center;font-size:.8rem;color:var(--muted)}
        .links a{color:var(--p);font-weight:600;text-decoration:none;margin:0 4px}
        .links a:hover{text-decoration:underline}
        .alert-err{background:#FEF2F2;border:1px solid #FECACA;border-radius:8px;padding:10px 14px;margin-bottom:16px;font-size:.82rem;color:#DC2626}
        @keyframes spin{to{transform:rotate(360deg)}}
        .spinner{display:none;width:16px;height:16px;border:2px solid rgba(255,255,255,.4);border-top-color:#fff;border-radius:50%;animation:spin .7s linear infinite;margin:0 auto}
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
            <!-- Avatar -->
            <div class="avatar-wrap">
                <div class="avatar-circle">
                    <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
            </div>

            <div class="card-header">
                <h1>Login Pengunjung</h1>
                <p>Masuk untuk membaca dan berkomentar</p>
            </div>

            @if ($errors->any())
                <div class="alert-err">
                    @foreach ($errors->all() as $error)<div>{{ $error }}</div>@endforeach
                </div>
            @endif

            <form id="vForm" method="POST" action="{{ route('login.visitor.submit') }}" novalidate>
                @csrf

                <div class="form-group">
                    <label for="email">Alamat Email</label>
                    <div class="input-wrap">
                        <input type="email" id="email" name="email"
                            placeholder="email@contoh.com"
                            value="{{ old('email') }}"
                            class="{{ $errors->has('email') ? 'err' : '' }}"
                            autocomplete="email" required>
                    </div>
                    @error('email')<p class="field-err">{{ $message }}</p>@enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-wrap">
                        <input type="password" id="password" name="password"
                            placeholder="••••••••"
                            class="{{ $errors->has('password') ? 'err' : '' }}"
                            autocomplete="current-password" required>
                        <span class="eye" id="eyeBtn">
                            <svg id="eyeIco" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </span>
                    </div>
                    @error('password')<p class="field-err">{{ $message }}</p>@enderror
                </div>

                <div class="row">
                    <label class="chk-label">
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        Ingat saya
                    </label>
                    <a href="#" class="forgot">Lupa Password?</a>
                </div>

                <button type="submit" id="submitBtn" class="btn">
                    <span id="btnTxt">Masuk sebagai Pengunjung</span>
                    <div class="spinner" id="spinner"></div>
                </button>
            </form>

            <div class="divider"><span>atau</span></div>

            <div class="links">
                Belum punya akun? <a href="{{ route('register') }}" id="link-daftar">Daftar Sekarang</a>
                &bull;
                <a href="{{ route('login') }}">Kembali</a>
            </div>
        </div>
    </div>

    <script>
        const eyeBtn = document.getElementById('eyeBtn');
        const pwd = document.getElementById('password');
        const ico = document.getElementById('eyeIco');
        eyeBtn.addEventListener('click', () => {
            const h = pwd.type === 'password';
            pwd.type = h ? 'text' : 'password';
            ico.innerHTML = h
                ? `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>`
                : `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>`;
        });
        document.getElementById('vForm').addEventListener('submit', () => {
            document.getElementById('submitBtn').disabled = true;
            document.getElementById('btnTxt').style.display = 'none';
            document.getElementById('spinner').style.display = 'block';
        });
    </script>
</body>
</html>
