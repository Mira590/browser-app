@include('partial.link')

<style>
    :root {
        --login-navy: #102b46;
        --login-blue: #1769aa;
        --login-ink: #172b3d;
        --login-muted: #718296;
        --login-line: #dce6ef;
    }

    body {
        min-height: 100vh;
        margin: 0;
        background: #f4f7fb;
        color: var(--login-ink);
        font-family: Inter, "Segoe UI", Arial, sans-serif;
    }

    .login-page {
        display: grid;
        min-height: 100vh;
        grid-template-columns: minmax(0, 1.12fr) minmax(420px, 0.88fr);
        padding: 18px;
        box-sizing: border-box;
    }

    .login-showcase {
        position: relative;
        display: flex;
        min-height: 620px;
        flex-direction: column;
        justify-content: space-between;
        overflow: hidden;
        padding: clamp(30px, 5vw, 72px);
        border-radius: 24px;
        background:
            radial-gradient(ellipse at 82% 18%, rgba(63, 160, 207, 0.42), transparent 34%),
            linear-gradient(145deg, #102b46 4%, #123a5e 55%, #17638c 100%);
        color: #fff;
    }

    .login-showcase::before,
    .login-showcase::after {
        position: absolute;
        width: 380px;
        height: 380px;
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        content: "";
        pointer-events: none;
    }

    .login-showcase::before {
        right: -170px;
        bottom: -180px;
    }

    .login-showcase::after {
        right: -105px;
        bottom: -115px;
    }

    .login-brand,
    .login-showcase-copy,
    .login-artwork,
    .login-showcase-footer {
        position: relative;
        z-index: 1;
    }

    .login-brand {
        display: inline-flex;
        width: fit-content;
        align-items: center;
        gap: 12px;
        color: #fff;
        font-size: 15px;
        font-weight: 750;
        letter-spacing: 0.2px;
        text-decoration: none;
    }

    .login-brand img {
        width: 42px;
        height: 42px;
        padding: 7px;
        border: 1px solid rgba(255, 255, 255, 0.22);
        border-radius: 13px;
        background: rgba(255, 255, 255, 0.12);
        object-fit: contain;
    }

    .login-showcase-copy {
        max-width: 610px;
        margin-top: 38px;
    }

    .login-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 18px;
        color: #bdeaff;
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 1.6px;
        text-transform: uppercase;
    }

    .login-eyebrow::before {
        width: 22px;
        height: 2px;
        background: #70d7ed;
        content: "";
    }

    .login-showcase-copy h1 {
        max-width: 590px;
        margin: 0;
        color: #fff;
        font-size: clamp(36px, 4.7vw, 64px);
        font-weight: 750;
        letter-spacing: -2.4px;
        line-height: 1.08;
    }

    .login-showcase-copy p {
        max-width: 490px;
        margin: 20px 0 0;
        color: rgba(237, 247, 255, 0.76);
        font-size: 16px;
        line-height: 1.75;
    }

    .login-artwork {
        display: flex;
        align-items: center;
        justify-content: center;
        margin: -20px 0;
    }

    .login-artwork img {
        width: min(100%, 440px);
        max-height: 300px;
        object-fit: contain;
        filter: drop-shadow(0 22px 40px rgba(2, 18, 35, 0.17));
    }

    .login-showcase-footer {
        display: flex;
        align-items: center;
        gap: 10px;
        color: rgba(237, 247, 255, 0.7);
        font-size: 12px;
    }

    .login-showcase-footer svg {
        width: 17px;
        height: 17px;
        color: #86dcef;
    }

    .login-form-side {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: clamp(26px, 5vw, 76px);
    }

    .login-card {
        width: min(100%, 420px);
    }

    .login-mobile-brand {
        display: none;
    }

    .login-heading {
        margin-bottom: 34px;
    }

    .login-heading .login-kicker {
        margin: 0 0 11px;
        color: var(--login-blue);
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 1.3px;
        text-transform: uppercase;
    }

    .login-heading h2 {
        margin: 0;
        color: var(--login-ink);
        font-size: clamp(30px, 3vw, 38px);
        font-weight: 750;
        letter-spacing: -1.2px;
    }

    .login-heading p {
        margin: 10px 0 0;
        color: var(--login-muted);
        font-size: 14px;
        line-height: 1.6;
    }

    .login-alert {
        margin-bottom: 20px;
        padding: 12px 14px;
        border: 1px solid #f0caca;
        border-radius: 10px;
        background: #fff5f5;
        color: #9c3333;
        font-size: 13px;
        line-height: 1.5;
    }

    .login-alert.success {
        border-color: #bde7d0;
        background: #f0fbf5;
        color: #17643b;
    }

    .login-field {
        margin-bottom: 20px;
    }

    .login-label {
        display: block;
        margin-bottom: 8px;
        color: #284157;
        font-size: 13px;
        font-weight: 700;
    }

    .login-input-wrap {
        position: relative;
    }

    .login-input-icon {
        position: absolute;
        top: 50%;
        left: 15px;
        width: 19px;
        height: 19px;
        color: #8193a5;
        transform: translateY(-50%);
        pointer-events: none;
    }

    .login-input {
        width: 100%;
        min-height: 54px;
        box-sizing: border-box;
        padding: 0 48px;
        border: 1px solid var(--login-line);
        border-radius: 12px;
        outline: none;
        background: #fff;
        color: var(--login-ink);
        font: inherit;
        font-size: 14px;
        transition: border-color 0.2s, box-shadow 0.2s;
    }

    .login-input::placeholder {
        color: #a0adba;
    }

    .login-input:focus {
        border-color: #68a6d2;
        box-shadow: 0 0 0 4px rgba(23, 105, 170, 0.1);
    }

    .login-submit:focus-visible {
        outline: 3px solid rgba(23, 105, 170, 0.32);
        outline-offset: 3px;
    }

    .login-field-error {
        margin-top: 7px;
        color: #b42318;
        font-size: 12px;
    }

    .login-options {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        margin: 4px 0 24px;
    }

    .login-remember {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        color: #53687b;
        font-size: 13px;
        cursor: pointer;
    }

    .login-remember input {
        width: 16px;
        height: 16px;
        margin: 0;
        accent-color: var(--login-blue);
    }

    .login-submit {
        display: flex;
        width: 100%;
        min-height: 54px;
        align-items: center;
        justify-content: center;
        gap: 10px;
        border: 0;
        border-radius: 12px;
        background: linear-gradient(110deg, #102b46, #1769aa);
        box-shadow: 0 10px 22px rgba(16, 65, 103, 0.19);
        color: #fff;
        font: inherit;
        font-size: 14px;
        font-weight: 750;
        cursor: pointer;
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .login-submit:hover {
        box-shadow: 0 13px 28px rgba(16, 65, 103, 0.26);
        transform: translateY(-1px);
    }

    .login-submit svg {
        width: 18px;
        height: 18px;
    }

    .login-security-note {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        margin-top: 25px;
        padding: 14px;
        border: 1px solid #e6edf3;
        border-radius: 11px;
        background: rgba(255, 255, 255, 0.65);
        color: var(--login-muted);
        font-size: 12px;
        line-height: 1.55;
    }

    .login-security-note svg {
        width: 17px;
        height: 17px;
        flex: 0 0 auto;
        color: #31816c;
    }

    .login-copyright {
        margin: 34px 0 0;
        color: #9aa8b5;
        font-size: 11px;
        text-align: center;
    }

    @media (max-width: 1000px) {
        .login-page {
            grid-template-columns: minmax(0, 1fr) minmax(360px, 0.9fr);
        }

        .login-form-side {
            padding: 34px;
        }

        .login-showcase {
            padding: 36px;
        }
    }

    @media (max-width: 760px) {
        .login-page {
            display: block;
            padding: 0;
        }

        .login-showcase {
            display: none;
        }

        .login-form-side {
            min-height: 100vh;
            box-sizing: border-box;
            padding: 30px 22px;
            background:
                radial-gradient(ellipse at 100% 0, rgba(91, 174, 211, 0.16), transparent 38%),
                #f4f7fb;
        }

        .login-mobile-brand {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 42px;
            color: var(--login-navy);
            font-size: 14px;
            font-weight: 750;
        }

        .login-mobile-brand img {
            width: 38px;
            height: 38px;
            padding: 6px;
            border: 1px solid var(--login-line);
            border-radius: 11px;
            background: #fff;
            object-fit: contain;
        }

        .login-card {
            width: min(100%, 440px);
        }
    }

    @media (prefers-reduced-motion: reduce) {
        *,
        *::before,
        *::after {
            scroll-behavior: auto !important;
            transition-duration: 0.01ms !important;
        }
    }
</style>

<body>
    <main class="login-page">
        <section class="login-showcase" aria-label="Browser Portal introduction">
            <a class="login-brand" href="{{ route('login') }}">
                <img src="{{ asset('assets/images/logo-icon.png') }}" alt="">
                <span>AziziBank <span style="font-weight: 500; opacity: 0.72;">| Browser Portal</span></span>
            </a>

            <div class="login-showcase-copy">
                <div class="login-eyebrow">One secure workspace</div>
                <h1>Your work tools, all in one place.</h1>
                <p>Sign in to access the applications and resources you need to get your work done.</p>
            </div>

            <div class="login-artwork">
                <img src="{{ asset('assets/images/login-images/login-cover.svg') }}" alt="" aria-hidden="true">
            </div>

            <div class="login-showcase-footer">
                <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <path d="M12 3 19 6v5c0 4.5-2.9 8.3-7 10-4.1-1.7-7-5.5-7-10V6l7-3Z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/>
                    <path d="m9 12 2 2 4-4" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <span>Secure access for authorized team members</span>
            </div>
        </section>

        <section class="login-form-side" aria-labelledby="loginTitle">
            <div class="login-card">
                <div class="login-mobile-brand">
                    <img src="{{ asset('assets/images/logo-icon.png') }}" alt="">
                    <span>AziziBank Browser Portal</span>
                </div>

                <header class="login-heading">
                    <p class="login-kicker">Welcome back</p>
                    <h2 id="loginTitle">Sign in to your account</h2>
                    <p>Enter your work credentials to continue to the portal.</p>
                </header>

                @if (session('success'))
                    <div class="login-alert success" role="status">{{ session('success') }}</div>
                @endif

                @if ($errors->any())
                    <div class="login-alert" role="alert">
                        Please check your credentials and try again.
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="login-field">
                        <label class="login-label" for="inputEmailAddress">Username</label>
                        <div class="login-input-wrap">
                            <svg class="login-input-icon" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <circle cx="12" cy="8" r="3.5" stroke="currentColor" stroke-width="1.7"/>
                                <path d="M5 20c.5-3.1 3.2-5 7-5s6.5 1.9 7 5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/>
                            </svg>
                            <input
                                type="text"
                                class="login-input"
                                id="inputEmailAddress"
                                name="username"
                                value="{{ old('username') }}"
                                placeholder="Enter your username"
                                autocomplete="username"
                                autocapitalize="none"
                                spellcheck="false"
                                required
                                autofocus
                                aria-describedby="usernameError"
                            >
                        </div>
                        <x-input-error :messages="$errors->get('username')" class="login-field-error" id="usernameError" />
                    </div>

                    <div class="login-field">
                        <label class="login-label" for="inputChoosePassword">Password</label>
                        <div class="login-input-wrap">
                            <svg class="login-input-icon" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <rect x="5" y="10" width="14" height="11" rx="2" stroke="currentColor" stroke-width="1.7"/>
                                <path d="M8 10V7a4 4 0 1 1 8 0v3m-4 5v2" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/>
                            </svg>
                            <input
                                type="password"
                                class="login-input"
                                id="inputChoosePassword"
                                name="password"
                                placeholder="Enter your password"
                                autocomplete="current-password"
                                required
                                aria-describedby="passwordError"
                            >
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="login-field-error" id="passwordError" />
                    </div>

                    <div class="login-options">
                        <label class="login-remember" for="remember">
                            <input id="remember" type="checkbox" name="remember" value="1" @checked(old('remember'))>
                            <span>Remember me</span>
                        </label>
                    </div>

                    <button class="login-submit" type="submit">
                        <span>Sign in securely</span>
                        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M5 12h14m-6-6 6 6-6 6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </form>

                <div class="login-security-note">
                    <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="M12 3 19 6v5c0 4.5-2.9 8.3-7 10-4.1-1.7-7-5.5-7-10V6l7-3Z" stroke="currentColor" stroke-width="1.7" stroke-linejoin="round"/>
                        <path d="m9 12 2 2 4-4" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span>Your sign-in is protected. Never share your password with anyone.</span>
                </div>

                <p class="login-copyright">© {{ date('Y') }} AziziBank Internal Portal · IT Department</p>
            </div>
        </section>
    </main>

</body>
</html>
