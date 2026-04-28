<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun — Go-Blog</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        *{box-sizing:border-box;margin:0;padding:0}
        :root{--p:#7C3AED;--pd:#6D28D9;--pl:#8B5CF6;--text:#1E293B;--muted:#64748B;--border:#E2E8F0;--ibg:#F8FAFC}
        body{font-family:'Inter',sans-serif;min-height:100vh;display:flex;align-items:center;justify-content:center;overflow:hidden}
        .bg{position:fixed;inset:0;background-image:url('/images/travel_bg.png');background-size:cover;background-position:center;z-index:0}
        .overlay{position:fixed;inset:0;background:rgba(0,0,0,.32);z-index:1}
        .frame{display:none}
        .logo{position:fixed;top:26px;left:30px;z-index:10;display:flex;align-items:center;gap:8px;color:#fff;font-weight:700;font-size:1rem;text-shadow:0 1px 4px rgba(0,0,0,.5)}
        .logo svg{width:22px;height:22px;fill:#A78BFA}
        .wrapper{position:relative;z-index:10;width:100%;max-width:460px;padding:0 20px;animation:up .5s cubic-bezier(.22,1,.36,1)}
        @keyframes up{from{opacity:0;transform:translateY(28px) scale(.96)}to{opacity:1;transform:none}}
        .card{background:rgba(255,255,255,.97);border-radius:20px;padding:38px 38px 32px;box-shadow:0 24px 64px rgba(0,0,0,.3)}
        .avatar-wrap{display:flex;justify-content:center;margin-bottom:14px}
        .avatar-circle{width:60px;height:60px;border-radius:50%;background:linear-gradient(135deg,var(--p),var(--pd));display:flex;align-items:center;justify-content:center;box-shadow:0 8px 24px rgba(124,58,237,.35)}
        .avatar-circle svg{width:28px;height:28px;stroke:#fff;fill:none}
        .card-header{text-align:center;margin-bottom:22px}
        .card-header h1{font-size:1.5rem;font-weight:800;color:var(--text);margin-bottom:4px}
        .card-header p{font-size:.84rem;color:var(--muted)}
        /* Steps indicator */
        .steps{display:flex;align-items:center;justify-content:center;gap:0;margin-bottom:24px}
        .step{display:flex;flex-direction:column;align-items:center;gap:4px}
        .step-circle{width:28px;height:28px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:.72rem;font-weight:700}
        .step.active .step-circle{background:var(--p);color:#fff;box-shadow:0 4px 12px rgba(124,58,237,.35)}
        .step.done   .step-circle{background:#D1FAE5;color:#059669}
        .step.idle   .step-circle{background:#F1F5F9;color:var(--muted)}
        .step-label{font-size:.65rem;color:var(--muted);font-weight:500}
        .step.active .step-label{color:var(--p);font-weight:700}
        .step-line{width:36px;height:2px;background:#E2E8F0;margin-bottom:16px}
        /* Form */
        .form-row{display:grid;grid-template-columns:1fr 1fr;gap:12px}
        .form-group{margin-bottom:14px}
        .form-group label{display:block;font-size:.82rem;font-weight:500;color:var(--text);margin-bottom:5px}
        .input-wrap{position:relative}
        .input-wrap input{width:100%;padding:11px 14px;border:1.5px solid var(--border);border-radius:10px;font-family:'Inter',sans-serif;font-size:.87rem;color:var(--text);background:var(--ibg);outline:none;transition:border-color .2s,box-shadow .2s}
        .input-wrap input::placeholder{color:#B0BAC9}
        .input-wrap input:focus{border-color:var(--pl);background:#fff;box-shadow:0 0 0 3px rgba(139,92,246,.14)}
        .input-wrap input.err{border-color:#FCA5A5;background:#FFF5F5}
        .input-wrap input.ok{border-color:#6EE7B7}
        .eye{position:absolute;right:12px;top:50%;transform:translateY(-50%);cursor:pointer;color:#94A3B8;display:flex;align-items:center;transition:color .2s}
        .eye:hover{color:var(--p)}
        .eye svg{width:17px;height:17px}
        .field-err{font-size:.74rem;color:#DC2626;margin-top:3px}
        /* Password strength */
        .strength-bar{height:4px;border-radius:2px;margin-top:6px;background:#F1F5F9;overflow:hidden}
        .strength-fill{height:100%;border-radius:2px;width:0;transition:width .3s,background .3s}
        .strength-label{font-size:.72rem;margin-top:3px;color:var(--muted)}
        /* Terms */
        .terms-row{display:flex;align-items:flex-start;gap:8px;margin:14px 0 18px;font-size:.8rem;color:var(--muted)}
        .terms-row input{accent-color:var(--p);margin-top:2px;width:14px;height:14px;flex-shrink:0;cursor:pointer}
        .terms-row a{color:var(--p);font-weight:600;text-decoration:none}
        .terms-row a:hover{text-decoration:underline}
        /* Button */
        .btn{width:100%;padding:13px;background:linear-gradient(135deg,var(--p),var(--pd));color:#fff;border:none;border-radius:50px;font-family:'Inter',sans-serif;font-size:.92rem;font-weight:600;cursor:pointer;letter-spacing:.3px;box-shadow:0 4px 16px rgba(124,58,237,.4);transition:transform .15s,box-shadow .2s}
        .btn:hover{transform:translateY(-1px);box-shadow:0 6px 22px rgba(124,58,237,.5)}
        .btn:disabled{opacity:.7;cursor:not-allowed;transform:none}
        /* Links */
        .links{text-align:center;font-size:.8rem;color:var(--muted);margin-top:14px}
        .links a{color:var(--p);font-weight:600;text-decoration:none}
        .links a:hover{text-decoration:underline}
        .alert-err{background:#FEF2F2;border:1px solid #FECACA;border-radius:8px;padding:10px 14px;margin-bottom:14px;font-size:.82rem;color:#DC2626}
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

            <div class="avatar-wrap">
                <div class="avatar-circle">
                    <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                    </svg>
                </div>
            </div>

            <div class="card-header">
                <h1>Buat Akun Baru</h1>
                <p>Bergabung dan mulai eksplorasi blog kami</p>
            </div>

            <!-- Steps -->
            <div class="steps">
                <div class="step active">
                    <div class="step-circle">1</div>
                    <div class="step-label">Data Diri</div>
                </div>
                <div class="step-line"></div>
                <div class="step idle">
                    <div class="step-circle">2</div>
                    <div class="step-label">Keamanan</div>
                </div>
                <div class="step-line"></div>
                <div class="step idle">
                    <div class="step-circle">✓</div>
                    <div class="step-label">Selesai</div>
                </div>
            </div>

            @if ($errors->any())
                <div class="alert-err">
                    @foreach ($errors->all() as $error)<div>{{ $error }}</div>@endforeach
                </div>
            @endif

            <form id="regForm" method="POST" action="{{ route('register.submit') }}" novalidate>
                @csrf

                <!-- Nama -->
                <div class="form-group">
                    <label for="name">Nama Lengkap</label>
                    <div class="input-wrap">
                        <input type="text" id="name" name="name"
                            placeholder="Nama Anda"
                            value="{{ old('name') }}"
                            class="{{ $errors->has('name') ? 'err' : '' }}"
                            autocomplete="name" required>
                    </div>
                    @error('name')<p class="field-err">{{ $message }}</p>@enderror
                </div>

                <!-- Email -->
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

                <!-- Password -->
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-wrap">
                        <input type="password" id="password" name="password"
                            placeholder="Min. 8 karakter"
                            class="{{ $errors->has('password') ? 'err' : '' }}"
                            autocomplete="new-password" required>
                        <span class="eye" id="eye1">
                            <svg id="ico1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </span>
                    </div>
                    <!-- Strength bar -->
                    <div class="strength-bar"><div class="strength-fill" id="strengthFill"></div></div>
                    <div class="strength-label" id="strengthLabel"></div>
                    @error('password')<p class="field-err">{{ $message }}</p>@enderror
                </div>

                <!-- Konfirmasi Password -->
                <div class="form-group">
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <div class="input-wrap">
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            placeholder="Ulangi password"
                            autocomplete="new-password" required>
                        <span class="eye" id="eye2">
                            <svg id="ico2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </span>
                    </div>
                    <div class="field-err" id="matchErr" style="display:none">Password tidak cocok</div>
                </div>

                <!-- Terms -->
                <div class="terms-row">
                    <input type="checkbox" id="terms" name="terms" required>
                    <label for="terms">Saya menyetujui <a href="#">Syarat &amp; Ketentuan</a> dan <a href="#">Kebijakan Privasi</a> Go-Blog</label>
                </div>

                <button type="submit" id="submitBtn" class="btn">
                    <span id="btnTxt">Buat Akun Sekarang</span>
                    <div class="spinner" id="spinner"></div>
                </button>
            </form>

            <div class="links">
                Sudah punya akun? <a href="{{ route('login.visitor') }}" id="link-masuk">Masuk di sini</a>
                &nbsp;&bull;&nbsp;
                <a href="{{ route('login') }}">Pilih Login</a>
            </div>
        </div>
    </div>

    <script>
        // Eye toggles
        function setupEye(btnId, inputId, icoId) {
            document.getElementById(btnId).addEventListener('click', () => {
                const inp = document.getElementById(inputId);
                const ico = document.getElementById(icoId);
                const h = inp.type === 'password';
                inp.type = h ? 'text' : 'password';
                ico.innerHTML = h
                    ? `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>`
                    : `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>`;
            });
        }
        setupEye('eye1', 'password', 'ico1');
        setupEye('eye2', 'password_confirmation', 'ico2');

        // Password strength
        const pwdInput = document.getElementById('password');
        const fill = document.getElementById('strengthFill');
        const label = document.getElementById('strengthLabel');
        pwdInput.addEventListener('input', () => {
            const v = pwdInput.value;
            let score = 0;
            if (v.length >= 8) score++;
            if (/[A-Z]/.test(v)) score++;
            if (/[0-9]/.test(v)) score++;
            if (/[^A-Za-z0-9]/.test(v)) score++;
            const map = [
                {w:'0%',bg:'#F1F5F9',t:''},
                {w:'25%',bg:'#EF4444',t:'Sangat Lemah'},
                {w:'50%',bg:'#F97316',t:'Lemah'},
                {w:'75%',bg:'#EAB308',t:'Cukup Kuat'},
                {w:'100%',bg:'#22C55E',t:'Sangat Kuat'},
            ];
            fill.style.width = map[score].w;
            fill.style.background = map[score].bg;
            label.textContent = map[score].t;
            label.style.color = map[score].bg;
        });

        // Confirm password match
        const confInput = document.getElementById('password_confirmation');
        const matchErr = document.getElementById('matchErr');
        confInput.addEventListener('input', () => {
            if (confInput.value && confInput.value !== pwdInput.value) {
                matchErr.style.display = 'block';
                confInput.classList.add('err');
            } else {
                matchErr.style.display = 'none';
                confInput.classList.remove('err');
                if (confInput.value) confInput.classList.add('ok');
            }
        });

        // Submit
        document.getElementById('regForm').addEventListener('submit', (e) => {
            if (confInput.value !== pwdInput.value) {
                e.preventDefault();
                matchErr.style.display = 'block';
                return;
            }
            document.getElementById('submitBtn').disabled = true;
            document.getElementById('btnTxt').style.display = 'none';
            document.getElementById('spinner').style.display = 'block';
        });
    </script>
</body>
</html>
