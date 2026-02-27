<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Login — {{ config('app.name', 'DevDimensions') }}</title>
    <link rel="icon" href="{{ asset('assets/images/favicon-150x150.jpeg') }}" sizes="32x32">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* ══════════════════════════════
           ROOT & RESET
        ══════════════════════════════ */
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --red: #FC3F37;
            --red-dark: #B51E17;
            --bg: #040404;
            --surface: #0C0C0C;
            --border: rgba(255, 255, 255, 0.07);
            --text: #E8E8E8;
            --muted: #4A4A4A;
            --subtle: #1E1E1E;
        }

        html,
        body {
            height: 100%;
            background: var(--bg);
            color: var(--text);
            font-family: 'Gilroy', -apple-system, sans-serif;
            -webkit-font-smoothing: antialiased;
        }

        /* ══════════════════════════════
           PAGE LAYOUT — split 50/50
        ══════════════════════════════ */
        .login-page {
            min-height: 100vh;
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

        @media (max-width: 900px) {
            .login-page {
                grid-template-columns: 1fr;
            }

            .login-left {
                display: none;
            }
        }

        /* ══════════════════════════════
           LEFT — Visual / Brand panel
        ══════════════════════════════ */
        .login-left {
            position: relative;
            overflow: hidden;
            background: #060606;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 40px;
        }

        /* Animated grid background */
        .grid-bg {
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(255, 255, 255, 0.025) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, 0.025) 1px, transparent 1px);
            background-size: 60px 60px;
            animation: grid-drift 20s linear infinite;
            opacity: 0.6;
        }

        @keyframes grid-drift {
            0% {
                transform: translate(0, 0);
            }

            100% {
                transform: translate(60px, 60px);
            }
        }

        /* Red glow orbs */
        .orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            pointer-events: none;
        }

        .orb-1 {
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(181, 30, 23, 0.22) 0%, transparent 70%);
            top: -100px;
            left: -100px;
            animation: orb-float 8s ease-in-out infinite alternate;
        }

        .orb-2 {
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(252, 63, 55, 0.12) 0%, transparent 70%);
            bottom: -80px;
            right: -80px;
            animation: orb-float 10s ease-in-out infinite alternate-reverse;
        }

        @keyframes orb-float {
            0% {
                transform: translate(0, 0) scale(1);
            }

            100% {
                transform: translate(30px, 20px) scale(1.08);
            }
        }

        /* Left top logo */
        .left-logo {
            position: relative;
            z-index: 2;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .left-logo img {
            height: 32px;
            width: auto;
        }

        /* Left center content */
        .left-center {
            position: relative;
            z-index: 2;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 20px 0;
        }

        .left-eyebrow {
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--red);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .left-eyebrow::before {
            content: "";
            display: inline-block;
            width: 28px;
            height: 1px;
            background: var(--red);
        }

        .left-headline {
            font-size: clamp(36px, 3.5vw, 52px);
            font-weight: 700;
            color: #fff;
            letter-spacing: -1.2px;
            line-height: 1.08;
            margin-bottom: 20px;
        }

        .left-headline span {
            background: linear-gradient(90deg, var(--red-dark), var(--red));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .left-desc {
            font-size: 15px;
            color: var(--muted);
            line-height: 1.7;
            max-width: 380px;
            margin-bottom: 40px;
        }

        /* Stats row */
        .left-stats {
            display: flex;
            gap: 32px;
        }

        .stat-item {
            display: flex;
            flex-direction: column;
            gap: 3px;
        }

        .stat-n {
            font-size: 26px;
            font-weight: 800;
            color: #fff;
            letter-spacing: -0.8px;
            line-height: 1;
        }

        .stat-l {
            font-size: 11.5px;
            color: var(--muted);
            font-weight: 500;
            letter-spacing: 0.2px;
        }

        .stat-sep {
            width: 1px;
            background: rgba(255, 255, 255, 0.08);
            align-self: stretch;
        }

        /* Bottom bar */
        .left-bottom {
            position: relative;
            z-index: 2;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-top: 24px;
            border-top: 1px solid rgba(255, 255, 255, 0.06);
        }

        .left-bottom-text {
            font-size: 12px;
            color: #2E2E2E;
        }

        .live-dot {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 12px;
            color: #4ADE80;
            font-weight: 500;
        }

        .live-dot::before {
            content: "";
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #4ADE80;
            animation: pulse-live 2s infinite;
        }

        @keyframes pulse-live {

            0%,
            100% {
                opacity: 1
            }

            50% {
                opacity: 0.3
            }
        }

        /* ══════════════════════════════
           RIGHT — Login form panel
        ══════════════════════════════ */
        .login-right {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 24px;
            position: relative;
            background: var(--bg);
        }

        /* Subtle corner accent */
        .login-right::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 1px;
            height: 100%;
            background: linear-gradient(180deg,
                    transparent 0%,
                    rgba(181, 30, 23, 0.3) 30%,
                    rgba(252, 63, 55, 0.3) 50%,
                    rgba(181, 30, 23, 0.3) 70%,
                    transparent 100%);
        }

        .form-wrap {
            width: 100%;
            max-width: 420px;
            animation: form-rise 0.6s cubic-bezier(0.22, 1, 0.36, 1) both;
        }

        @keyframes form-rise {
            from {
                opacity: 0;
                transform: translateY(24px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Mobile logo (only on small screens) */
        .mobile-logo {
            display: none;
            margin-bottom: 36px;
        }

        @media (max-width: 900px) {
            .mobile-logo {
                display: flex;
                align-items: center;
                gap: 10px;
            }
        }

        .mobile-logo img {
            height: 30px;
            width: auto;
        }

        /* Form header */
        .form-header {
            margin-bottom: 36px;
        }

        .form-title {
            font-size: 28px;
            font-weight: 700;
            color: #fff;
            letter-spacing: -0.6px;
            line-height: 1.15;
            margin-bottom: 8px;
        }

        .form-subtitle {
            font-size: 14px;
            color: var(--muted);
            line-height: 1.5;
        }

        /* Error alert */
        .alert-error {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            background: rgba(252, 63, 55, 0.07);
            border: 1px solid rgba(252, 63, 55, 0.2);
            border-radius: 10px;
            padding: 12px 14px;
            margin-bottom: 24px;
            font-size: 13px;
            color: #FC6B65;
            line-height: 1.5;
        }

        .alert-error svg {
            flex-shrink: 0;
            margin-top: 1px;
        }

        /* Field group */
        .field {
            margin-bottom: 18px;
        }

        .field label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #888;
            margin-bottom: 8px;
            letter-spacing: 0.1px;
        }

        .field-inner {
            position: relative;
        }

        .field-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #333;
            pointer-events: none;
            transition: color 0.2s;
        }

        .field-inner:focus-within .field-icon {
            color: var(--red);
        }

        .field input {
            width: 100%;
            height: 50px;
            padding: 0 44px 0 42px;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid var(--border);
            border-radius: 10px;
            font-size: 14px;
            color: #E0E0E0;
            font-family: inherit;
            outline: none;
            transition: border-color 0.2s, background 0.2s, box-shadow 0.2s;
            letter-spacing: 0.1px;
        }

        .field input::placeholder {
            color: #2A2A2A;
        }

        .field input:focus {
            border-color: rgba(252, 63, 55, 0.45);
            background: rgba(252, 63, 55, 0.03);
            box-shadow: 0 0 0 3px rgba(252, 63, 55, 0.07);
        }

        .field input.is-error {
            border-color: rgba(252, 63, 55, 0.5);
        }

        /* Password toggle */
        .toggle-pw {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #2A2A2A;
            background: none;
            border: none;
            cursor: pointer;
            padding: 4px;
            transition: color 0.2s;
            line-height: 0;
        }

        .toggle-pw:hover {
            color: #888;
        }

        /* Field error text */
        .field-err {
            font-size: 12px;
            color: #FC6B65;
            margin-top: 6px;
            display: none;
        }

        .field-err.show {
            display: block;
        }

        /* Remember + forgot row */
        .form-options {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 28px;
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }

        .remember input[type="checkbox"] {
            width: 16px;
            height: 16px;
            accent-color: var(--red);
            cursor: pointer;
        }

        .remember span {
            font-size: 13px;
            color: var(--muted);
            user-select: none;
        }

        .forgot-link {
            font-size: 13px;
            color: var(--muted);
            text-decoration: none;
            transition: color 0.2s;
        }

        .forgot-link:hover {
            color: var(--red);
        }

        /* Submit button */
        .btn-login {
            width: 100%;
            height: 52px;
            border: none;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 700;
            color: #fff;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            letter-spacing: 0.3px;
            background: linear-gradient(90deg, var(--red-dark) 0%, var(--red) 100%);
            transition: all 0.25s ease;
            font-family: inherit;
        }

        .btn-login:hover {
            background: var(--red-dark);
            transform: translateY(-1px);
            box-shadow: 0 12px 30px rgba(181, 30, 23, 0.35);
        }

        .btn-login:active {
            transform: translateY(0);
        }

        .btn-login:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        /* Button shimmer */
        .btn-login::after {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 60%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.12), transparent);
            transition: left 0.5s ease;
        }

        .btn-login:hover::after {
            left: 150%;
        }

        /* Spinner inside button */
        .btn-inner {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-spinner {
            display: none;
            width: 18px;
            height: 18px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-top-color: #fff;
            border-radius: 50%;
            animation: spin 0.7s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        .btn-login.is-loading .btn-text {
            display: none;
        }

        .btn-login.is-loading .btn-spinner {
            display: block;
        }

        /* Divider */
        .form-divider {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 28px 0;
        }

        .form-divider::before,
        .form-divider::after {
            content: "";
            flex: 1;
            height: 1px;
            background: rgba(255, 255, 255, 0.06);
        }

        .form-divider span {
            font-size: 12px;
            color: #2A2A2A;
            white-space: nowrap;
        }

        /* Back to site */
        .back-link {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            font-size: 13px;
            color: #3A3A3A;
            text-decoration: none;
            transition: color 0.2s;
        }

        .back-link:hover {
            color: #888;
        }

        .back-link svg {
            transition: transform 0.2s;
        }

        .back-link:hover svg {
            transform: translateX(-3px);
        }

        /* Security badge */
        .security-badge {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            margin-top: 32px;
            font-size: 11.5px;
            color: #252525;
        }

        .security-badge svg {
            flex-shrink: 0;
        }
    </style>
</head>

<body>

    <div class="login-page">

        {{-- ══════════════════════════
         LEFT — Brand panel
    ══════════════════════════ --}}
        <div class="login-left">
            <div class="grid-bg"></div>
            <div class="orb orb-1"></div>
            <div class="orb orb-2"></div>

            {{-- Logo --}}
            <div class="left-logo">
                <img src="{{ asset('assets/images/logo.svg') }}" alt="DevDimensions">
            </div>

            {{-- Main content --}}
            <div class="left-center">
                <div class="left-eyebrow">Admin Portal</div>
                <h2 class="left-headline">
                    Control your<br>
                    <span>digital presence</span><br>
                    from one place.
                </h2>
                <p class="left-desc">
                    Manage case studies, testimonials, partner logos,
                    consultation leads, and site settings — all in one
                    powerful dashboard.
                </p>

                <div class="left-stats">
                    <div class="stat-item">
                        <span class="stat-n">14</span>
                        <span class="stat-l">Case Studies</span>
                    </div>
                    <div class="stat-sep"></div>
                    <div class="stat-item">
                        <span class="stat-n">48</span>
                        <span class="stat-l">Leads</span>
                    </div>
                    <div class="stat-sep"></div>
                    <div class="stat-item">
                        <span class="stat-n">27</span>
                        <span class="stat-l">Reviews</span>
                    </div>
                </div>
            </div>

            {{-- Bottom --}}
            <div class="left-bottom">
                <span class="left-bottom-text">© {{ date('Y') }} DevDimensions, LLC</span>
                <span class="live-dot">System Online</span>
            </div>
        </div>

        {{-- ══════════════════════════
         RIGHT — Form panel
    ══════════════════════════ --}}
        <div class="login-right">
            <div class="form-wrap">

                {{-- Mobile logo --}}
                <div class="mobile-logo">
                    <img src="{{ asset('assets/images/logo.svg') }}" alt="DevDimensions">
                </div>

                {{-- Header --}}
                <div class="form-header">
                    <h1 class="form-title">Welcome back</h1>
                    <p class="form-subtitle">Sign in to your admin account to continue.</p>
                </div>

                {{-- Error alert (Laravel validation) --}}
                @if ($errors->any())
                    <div class="alert-error">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round">
                            <circle cx="12" cy="12" r="10" />
                            <line x1="12" y1="8" x2="12" y2="12" />
                            <line x1="12" y1="16" x2="12.01" y2="16" />
                        </svg>
                        <span>{{ $errors->first() }}</span>
                    </div>
                @endif

                {{-- Session error (for manual flash messages) --}}
                @if (session('error'))
                    <div class="alert-error">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round">
                            <circle cx="12" cy="12" r="10" />
                            <line x1="12" y1="8" x2="12" y2="12" />
                            <line x1="12" y1="16" x2="12.01" y2="16" />
                        </svg>
                        <span>{{ session('error') }}</span>
                    </div>
                @endif

                {{-- Form --}}
                <form method="POST" action="{{ route('admin.login.post') }}" id="login-form" novalidate>
                    @csrf

                    {{-- Email --}}
                    <div class="field">
                        <label for="email">Email Address</label>
                        <div class="field-inner">
                            <span class="field-icon">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="1.8" stroke-linecap="round">
                                    <path
                                        d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                                    <polyline points="22,6 12,13 2,6" />
                                </svg>
                            </span>
                            <input type="email" id="email" name="email" value="{{ old('email') }}"
                                placeholder="admin@devdimensions.com" autocomplete="email"
                                class="{{ $errors->has('email') ? 'is-error' : '' }}" required>
                        </div>
                        <span class="field-err {{ $errors->has('email') ? 'show' : '' }}">
                            {{ $errors->first('email') ?? 'Please enter a valid email.' }}
                        </span>
                    </div>

                    {{-- Password --}}
                    <div class="field">
                        <label for="password">Password</label>
                        <div class="field-inner">
                            <span class="field-icon">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="1.8" stroke-linecap="round">
                                    <rect x="3" y="11" width="18" height="11" rx="2"
                                        ry="2" />
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                                </svg>
                            </span>
                            <input type="password" id="password" name="password" placeholder="Enter your password"
                                autocomplete="current-password"
                                class="{{ $errors->has('password') ? 'is-error' : '' }}" required>
                            <button type="button" class="toggle-pw" id="toggle-pw"
                                aria-label="Toggle password visibility">
                                {{-- Eye icon (show) --}}
                                <svg id="eye-show" width="16" height="16" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                                    <circle cx="12" cy="12" r="3" />
                                </svg>
                                {{-- Eye-off icon (hide) --}}
                                <svg id="eye-hide" width="16" height="16" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                                    style="display:none;">
                                    <path
                                        d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24" />
                                    <line x1="1" y1="1" x2="23" y2="23" />
                                </svg>
                            </button>
                        </div>
                        <span class="field-err {{ $errors->has('password') ? 'show' : '' }}">
                            {{ $errors->first('password') ?? 'Please enter your password.' }}
                        </span>
                    </div>

                    {{-- Remember + Forgot --}}
                    <div class="form-options">
                        <label class="remember">
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <span>Remember me</span>
                        </label>
                        <a href="#" class="forgot-link">Forgot password?</a>
                    </div>

                    {{-- Submit --}}
                    <button type="submit" class="btn-login" id="btn-login">
                        <div class="btn-inner">
                            <span class="btn-text">Sign In to Dashboard</span>
                            <span class="btn-spinner"></span>
                        </div>
                    </button>

                </form>

                {{-- Divider --}}
                <div class="form-divider"><span>or</span></div>

                {{-- Back to site --}}
                <a href="{{ url('/') }}" class="back-link">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round">
                        <line x1="19" y1="12" x2="5" y2="12" />
                        <polyline points="12 19 5 12 12 5" />
                    </svg>
                    Back to main site
                </a>

                {{-- Security badge --}}
                <div class="security-badge">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.8" stroke-linecap="round">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                    </svg>
                    Secured with CSRF protection
                </div>

            </div>
        </div>
    </div>

    <script>
        // Password toggle
        (function() {
            var btn = document.getElementById('toggle-pw');
            var input = document.getElementById('password');
            var show = document.getElementById('eye-show');
            var hide = document.getElementById('eye-hide');

            if (btn) {
                btn.addEventListener('click', function() {
                    var isHidden = input.type === 'password';
                    input.type = isHidden ? 'text' : 'password';
                    show.style.display = isHidden ? 'none' : 'block';
                    hide.style.display = isHidden ? 'block' : 'none';
                });
            }
        })();

        // Form submit — show spinner
        (function() {
            var form = document.getElementById('login-form');
            var btn = document.getElementById('btn-login');

            if (form) {
                form.addEventListener('submit', function(e) {
                    var email = document.getElementById('email').value.trim();
                    var pass = document.getElementById('password').value;
                    var valid = true;

                    // Basic client-side validation
                    var emailErr = document.querySelector('#email ~ .field-err') ||
                        document.querySelector('.field-err');
                    var inputs = form.querySelectorAll('input[required]');

                    inputs.forEach(function(inp) {
                        var err = inp.closest('.field-inner').parentNode.querySelector('.field-err');
                        if (!inp.value.trim()) {
                            inp.classList.add('is-error');
                            if (err) err.classList.add('show');
                            valid = false;
                        } else {
                            inp.classList.remove('is-error');
                            if (err) err.classList.remove('show');
                        }
                    });

                    if (!valid) {
                        e.preventDefault();
                        return;
                    }

                    // Show loading state
                    btn.classList.add('is-loading');
                    btn.disabled = true;
                });
            }

            // Real-time field clearing
            document.querySelectorAll('.field input').forEach(function(inp) {
                inp.addEventListener('input', function() {
                    this.classList.remove('is-error');
                    var err = this.closest('.field-inner').parentNode.querySelector('.field-err');
                    if (err) err.classList.remove('show');
                });
            });
        })();
    </script>

</body>

</html>
