<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Login Admin Go-Blog - Platform Blog Travel Terbaik">
    <title>Login — Go-Blog Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --primary: #2563EB;
            --primary-dark: #1D4ED8;
            --primary-light: #3B82F6;
            --text-dark: #1E293B;
            --text-muted: #64748B;
            --border: #E2E8F0;
            --white: #FFFFFF;
            --input-bg: #F8FAFC;
            --shadow-lg: 0 20px 60px rgba(0, 0, 0, 0.25);
            --shadow-card: 0 4px 24px rgba(37, 99, 235, 0.12);
            --radius: 16px;
            --radius-sm: 10px;
            --radius-btn: 50px;
        }

        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            position: relative;
        }

        /* ── Background Image ── */
        .bg-layer {
            position: fixed;
            inset: 0;
            background-image: url('/images/travel_bg.png');
            background-size: cover;
            background-position: center;
            z-index: 0;
        }

        .bg-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.15);
            z-index: 1;
        }

        /* ── Blue border frame (like the reference image) ── */
        .frame-border {
            position: fixed;
            inset: 10px;
            border: 3px solid rgba(59, 130, 246, 0.7);
            border-radius: 20px;
            z-index: 2;
            pointer-events: none;
        }

        /* ── Top-left logo ── */
        .site-logo {
            position: fixed;
            top: 26px;
            left: 30px;
            z-index: 10;
            display: flex;
            align-items: center;
            gap: 8px;
            color: white;
            font-weight: 700;
            font-size: 1rem;
            text-shadow: 0 1px 4px rgba(0,0,0,0.4);
        }

        .site-logo svg {
            width: 22px;
            height: 22px;
            fill: #60A5FA;
        }

        /* ── Help icon top-right ── */
        .help-icon {
            position: fixed;
            top: 22px;
            right: 30px;
            z-index: 10;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            border: 2px solid rgba(255,255,255,0.7);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 0.85rem;
            cursor: pointer;
            backdrop-filter: blur(4px);
            background: rgba(255,255,255,0.15);
        }

        /* ── Login Card ── */
        .login-wrapper {
            position: relative;
            z-index: 10;
            width: 100%;
            max-width: 440px;
            padding: 0 20px;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.97);
            border-radius: var(--radius);
            padding: 40px 40px 36px;
            box-shadow: var(--shadow-lg);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255,255,255,0.9);
            animation: cardIn 0.5s cubic-bezier(0.22, 1, 0.36, 1);
        }

        @keyframes cardIn {
            from { opacity: 0; transform: translateY(30px) scale(0.96); }
            to   { opacity: 1; transform: translateY(0) scale(1); }
        }

        /* ── Card Header ── */
        .card-header {
            text-align: center;
            margin-bottom: 28px;
        }

        .card-header h1 {
            font-size: 1.6rem;
            font-weight: 700;
            color: var(--primary);
            letter-spacing: -0.3px;
            margin-bottom: 4px;
        }

        .card-header p {
            font-size: 0.85rem;
            color: var(--text-muted);
            font-weight: 400;
        }

        /* ── Form Fields ── */
        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            font-size: 0.82rem;
            font-weight: 500;
            color: var(--text-dark);
            margin-bottom: 7px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper input {
            width: 100%;
            padding: 12px 16px;
            border: 1.5px solid var(--border);
            border-radius: var(--radius-sm);
            font-family: 'Inter', sans-serif;
            font-size: 0.88rem;
            color: var(--text-dark);
            background: var(--input-bg);
            transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
            outline: none;
        }

        .input-wrapper input::placeholder {
            color: #B0BAC9;
            font-weight: 400;
        }

        .input-wrapper input:focus {
            border-color: var(--primary-light);
            background: #fff;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.12);
        }

        /* ── Password eye toggle ── */
        .pwd-toggle {
            position: absolute;
            right: 13px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #94A3B8;
            display: flex;
            align-items: center;
            transition: color 0.2s;
        }

        .pwd-toggle:hover { color: var(--primary); }
        .pwd-toggle svg { width: 18px; height: 18px; }

        /* ── Remember + Forgot row ── */
        .remember-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 4px 0 24px;
        }

        .remember-label {
            display: flex;
            align-items: center;
            gap: 7px;
            font-size: 0.82rem;
            color: var(--text-muted);
            cursor: pointer;
        }

        .remember-label input[type="checkbox"] {
            width: 14px;
            height: 14px;
            accent-color: var(--primary);
            cursor: pointer;
        }

        .forgot-link {
            font-size: 0.82rem;
            font-weight: 500;
            color: var(--primary);
            text-decoration: none;
            transition: opacity 0.2s;
        }

        .forgot-link:hover { opacity: 0.75; }

        /* ── Submit Button ── */
        .btn-login {
            width: 100%;
            padding: 13px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            border: none;
            border-radius: var(--radius-btn);
            font-family: 'Inter', sans-serif;
            font-size: 0.92rem;
            font-weight: 600;
            cursor: pointer;
            letter-spacing: 0.3px;
            transition: transform 0.15s, box-shadow 0.2s, opacity 0.2s;
            box-shadow: 0 4px 16px rgba(37, 99, 235, 0.4);
        }

        .btn-login:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 22px rgba(37, 99, 235, 0.5);
            opacity: 0.95;
        }

        .btn-login:active {
            transform: translateY(0);
            box-shadow: 0 2px 8px rgba(37, 99, 235, 0.35);
        }

        /* ── Divider text ── */
        .divider-text {
            text-align: center;
            font-size: 0.78rem;
            color: var(--text-muted);
            margin: 20px 0 16px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .divider-text::before,
        .divider-text::after {
            content: '';
            flex: 1;
            height: 1px;
            background: var(--border);
        }

        /* ── Bottom icons ── */
        .bottom-icons {
            display: flex;
            justify-content: center;
            gap: 36px;
            margin-top: 8px;
        }

        .icon-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 5px;
            font-size: 0.72rem;
            color: var(--text-muted);
            font-weight: 500;
        }

        .icon-item svg {
            width: 22px;
            height: 22px;
            color: #94A3B8;
        }

        /* ── Error messages ── */
        .error-alert {
            background: #FEF2F2;
            border: 1px solid #FECACA;
            border-radius: 8px;
            padding: 10px 14px;
            margin-bottom: 18px;
            font-size: 0.82rem;
            color: #DC2626;
        }

        .field-error {
            font-size: 0.76rem;
            color: #DC2626;
            margin-top: 5px;
        }

        .input-wrapper input.is-error {
            border-color: #FCA5A5;
            background: #FFF5F5;
        }

        /* ── Visitor login link ── */
        .visitor-link {
            text-align: center;
            font-size: 0.8rem;
            color: var(--text-muted);
            margin-top: 14px;
        }

        .visitor-link a {
            color: var(--primary);
            font-weight: 600;
            text-decoration: none;
        }

        .visitor-link a:hover { text-decoration: underline; }

        /* ── Loading spinner on button ── */
        @keyframes spin { to { transform: rotate(360deg); } }
        .btn-spinner {
            display: none;
            width: 16px;
            height: 16px;
            border: 2px solid rgba(255,255,255,0.4);
            border-top-color: white;
            border-radius: 50%;
            animation: spin 0.7s linear infinite;
            margin: 0 auto;
        }
    </style>
</head>
<body>

    <!-- Background layers -->
    <div class="bg-layer"></div>
    <div class="bg-overlay"></div>
    <div class="frame-border"></div>

    <!-- Top-left logo -->
    <div class="site-logo">
        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
        </svg>
        Go-Blog
    </div>

    <!-- Help icon -->
    <div class="help-icon" title="Bantuan">?</div>

    <!-- Login Card -->
    <div class="login-wrapper">
        <div class="login-card">

            <!-- Header -->
            <div class="card-header">
                <h1>Admin Go-Blog</h1>
                <p>Admin Go-Blog Access</p>
            </div>

            <!-- Error messages from Laravel -->
            @if ($errors->any())
                <div class="error-alert" role="alert">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            @if (session('error'))
                <div class="error-alert" role="alert">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Login Form -->
            <form id="loginForm" method="POST" action="{{ route('login.admin.submit') }}" novalidate>
                @csrf

                <!-- Email -->
                <div class="form-group">
                    <label for="email">Admin Email</label>
                    <div class="input-wrapper">
                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="admin@goblog.com"
                            value="{{ old('email') }}"
                            autocomplete="email"
                            class="{{ $errors->has('email') ? 'is-error' : '' }}"
                            required
                        >
                    </div>
                    @error('email')
                        <p class="field-error">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password">Security Key</label>
                    <div class="input-wrapper">
                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="••••••••••••"
                            autocomplete="current-password"
                            class="{{ $errors->has('password') ? 'is-error' : '' }}"
                            required
                        >
                        <span class="pwd-toggle" id="pwdToggle" role="button" aria-label="Tampilkan password" title="Tampilkan/sembunyikan password">
                            <!-- Eye icon -->
                            <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                        </span>
                    </div>
                    @error('password')
                        <p class="field-error">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember + Forgot -->
                <div class="remember-row">
                    <label class="remember-label">
                        <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        Remember device
                    </label>
                    <a href="#" class="forgot-link">Forgot Key?</a>
                </div>

                <!-- Submit -->
                <button type="submit" id="submitBtn" class="btn-login">
                    <span id="btnText">Access Dashboard</span>
                    <div class="btn-spinner" id="btnSpinner"></div>
                </button>
            </form>

            <!-- Divider -->
            <div class="divider-text">Authorised Use Only</div>

            <!-- Bottom icons -->
            <div class="bottom-icons">
                <div class="icon-item">
                    <!-- Shield icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                    Secure
                </div>
                <div class="icon-item">
                    <!-- Lock/Logs icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M12 11c0-1.1.9-2 2-2s2 .9 2 2v1H10v-1c0-1.1.9-2 2-2zM5 21V7a2 2 0 012-2h10a2 2 0 012 2v14M9 21v-4a3 3 0 016 0v4"/>
                    </svg>
                    Logs
                </div>
                <div class="icon-item">
                    <!-- Node icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    Node 04
                </div>
            </div>

            <!-- Back + Visitor link -->
            <p class="visitor-link">
                <a href="{{ route('login') }}">&larr; Kembali ke Pilihan Login</a>
            </p>

        </div>
    </div>

    <script>
        // Toggle password visibility
        const pwdToggle = document.getElementById('pwdToggle');
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');

        pwdToggle.addEventListener('click', () => {
            const isHidden = passwordInput.type === 'password';
            passwordInput.type = isHidden ? 'text' : 'password';
            eyeIcon.innerHTML = isHidden
                ? `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>`
                : `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>`;
        });

        // Loading spinner on submit
        document.getElementById('loginForm').addEventListener('submit', function () {
            const btn = document.getElementById('submitBtn');
            const text = document.getElementById('btnText');
            const spinner = document.getElementById('btnSpinner');
            btn.disabled = true;
            text.style.display = 'none';
            spinner.style.display = 'block';
        });

        // Input focus animation
        document.querySelectorAll('input[type="email"], input[type="password"], input[type="text"]').forEach(input => {
            input.addEventListener('focus', () => {
                input.closest('.form-group')?.querySelector('label')?.classList.add('focused');
            });
            input.addEventListener('blur', () => {
                input.closest('.form-group')?.querySelector('label')?.classList.remove('focused');
            });
        });
    </script>
</body>
</html>
