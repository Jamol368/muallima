<x-auth-layout>
    <div class="auth-layout">
        <main class="auth-box">
            <div class="box-container">
                <div class="auth-content">

                    <div class="d-flex justify-content-center align-items-center mb-5">
                        <div class="flex-1 text-center">
                            <a href="{{ route('home') }}"
                               class="home-link navbar-brand p-0 d-flex align-items-center gap-2">
                                <div class="auth-logo">
                                    <img src="{{ asset('/img/logo-3.png') }}" alt="logo" class="logo-img">
                                </div>
                            </a>
                            <div class="auth-platform">
                                <p class="m-0 fs-6">Yaxshi muallim - sifatli ta'lim</p>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('login') }}" class="auth-form" method="POST">
                        @csrf
                        <div class="auth-form-container align-items-center">

                            <h1 class="mb-3 auth-title">Tizimga kirish</h1>
                            <p class="text-muted">Iltimos, telefon raqam hamda parolinggizni kiriting!</p>

                            <p class="auth-label">Telefon raqam</p>
                            <input type="text" id="phone-number" name="phone-number" placeholder="+998" class="auth-input">
                            <input type="hidden" id="phone" name="phone">

                            <script src="https://cdn.jsdelivr.net/npm/cleave.js@1/dist/cleave.min.js"></script>
                            <script>
                                let cleave = new Cleave('#phone-number', {
                                    prefix: '+998',
                                    delimiters: [' ', '(', ') ', '-', '-'],
                                    blocks: [4, 0, 2, 3, 2, 2],
                                    numericOnly: true,
                                    noImmediatePrefix: true,
                                    rawValueTrimPrefix: true
                                });

                                document.querySelector('form').addEventListener('submit', function(e) {
                                    document.querySelector('#phone').value = cleave.getRawValue()
                                });
                            </script>

                            <div class="password-wrapper">
                                <p class="auth-label">Parol</p>
                                <input type="password" id="password" name="password" class="auth-input password-input">
                                <i class="far fa-eye toggle-password" data-target="#password"></i>
                            </div>

                            <button type="submit" class="btn auth-btn confirm-btn mt-3">Kirish</button>

                            <p class="mt-3 medium text-muted">
                                Parolni unutdingizmi?
                                <a href="#">Yangilash</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</x-auth-layout>
