<x-auth-layout>
    <style>
        .offerta-modal-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.6);
            justify-content: center;
            align-items: center;
            z-index: 999;
        }

        .offerta-modal {
            background: #fff;
            border-radius: 16px;
            padding: 20px;
            width: 90%;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .offerta-modal h2 {
            text-align: center;
            margin-top: 0;
        }

        .offerta-modal p {
            font-size: 20px;
        }

        .offerta-close-btn {
            margin-top: 20px;
            background: #7f7f7f;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 8px;
            cursor: pointer;
        }
    </style>
    <div class="auth-layout">
        <main class="auth-box">
            <div class="box-container">
                <div class="auth-content">

                    <div class="d-flex justify-content-center align-items-center mb-5">
                        <div class="flex-1">
                            <a href="{{ route('home') }}"
                               class="home-link navbar-brand p-0 d-flex align-items-center gap-2">
                                <div class="auth-logo">
                                    <i class="fa fa-user-tie me-2"></i>
                                </div>
                                <div class="auth-platform text-start">
                                    <h3 class="m-0 fs-1 auth-color">Muallima</h3>
                                    <p class="m-0 fs-6">test platformasi</p>
                                </div>
                            </a>
                        </div>
                    </div>

                    <form action="{{ route('register') }}" class="auth-form" method="POST">
                        @csrf
                        <div class="auth-form-container align-items-center">

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <h1 class="mb-3 auth-title">Ro'yhatdan o'tish</h1>
                            <p class="text-muted">Iltimos, tizimda akkaunt yaratish uchun ma'lumotlaringgizni
                                kiriting!</p>

                            <p class="auth-label">FIO</p>
                            <input type="text" id="name" name="name" placeholder="FIO" class="auth-input">

                            <p class="auth-label">Fan</p>
                            <select name="subject" id="subject" class="custom-select form-select auth-input">
                                <option value="" disabled selected>-- Fanni tanlang --</option>
                                @foreach($subjects as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                @endforeach
                            </select>

                            <p class="auth-label">Malaka (amaldagi) toifa</p>
                            <select name="teacher_category" id="teacher_category"
                                    class="custom-select form-select auth-input">
                                <option value="" disabled selected>-- Amaldagi malaka topifangizni tanlang --</option>
                                @foreach($teacher_types as $teacher_type)
                                    <option value="{{ $teacher_type->id }}">{{ $teacher_type->name }}</option>
                                @endforeach
                            </select>

                            <p class="auth-label">Parol <span>(kamida 8 belgi)</span></p>
                            <input type="password" id="password" name="password" class="auth-input">

                            <p class="auth-label">Telefon raqam</p>
                            <input type="text" id="phone-number" name="phone-number" placeholder="+998"
                                   class="auth-input">
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

                                document.querySelector('form').addEventListener('submit', function (e) {
                                    document.querySelector('#phone').value = cleave.getRawValue()
                                });
                            </script>

                            <div class="auth-offerta">
                                <input type="checkbox" id="termsCheckbox" name="offerta" class="auth-offerta-input">
                                <span class="auth-offerta-label auth-label">Men foydalanuvchi kelishuvi bilan tanishib chiqdim</span>
                            </div>
                                <button id="registerBtn" class="btn auth-btn confirm-btn mt-3" disabled="true">Tasdiqlash</button>

                            <p class="mt-3 small text-muted">
                                Tizimdan ro‘yxatdan o‘tish bilan men offerta-ga roziligimni bildiraman.
                                <a href="#" class="offerta-btn" id="offertaOpenModalBtn">Offerta</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>

    <div id="termsModal" style="display:none;position:fixed;inset:0;background:rgba(0,0,0,.6);z-index:9999;">
        <div id="termsContent"
             style="height:100vh; overflow-y:auto; border:1px solid #ccc; padding:10px">

            <div class="modal-box">
                <div class="modal-header">
                    <h3>Foydalanuvchi shartlari</h3>
                    <button id="closeModal" class="close-btn btn">&times;</button>
                </div>
                <div id="termsFrame" class="terms-frame">
                    <iframe
                        src="{{ asset('storage/offerta/offerta.pdf#page=1&v=${Date.now()}') }}"
                        id="termsFrameContent"
                        class="terms-frame">
                    </iframe>
                </div>
                <div class="modal-footer">
                    <button id="agreeBtn" class="btn btn-success" disabled>
                        Foydalanish shartlariga roziman
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const checkbox = document.getElementById('termsCheckbox');
            const modal = document.getElementById('termsModal');
            const termsContent = document.getElementById('termsContent');
            const termsFrame = document.getElementById('termsFrame');
            const agreeBtn = document.getElementById('agreeBtn');
            const registerBtn = document.getElementById('registerBtn');
            const closeModal = document.getElementById('closeModal');
            const termsFrameContent = document.getElementById('termsFrameContent');

            if (!checkbox || !modal || !termsContent || !agreeBtn || !closeModal) {
                console.error('Missing elements');
                return;
            }

            checkbox.addEventListener('click', (e) => {
                if (checkbox.checked) {
                    e.preventDefault();
                    modal.style.display = 'block';
                } else {
                    registerBtn.disabled = true;
                }
            });

            termsFrame.addEventListener('scroll', () => {
                console.log(termsFrame.scrollTop+' '+termsFrame.clientHeight+' '+termsFrame.scrollHeight);
                if (
                    termsFrame.scrollTop + termsFrame.clientHeight
                    >= termsFrame.scrollHeight - 5
                ) {
                    agreeBtn.disabled = false;
                }
            });

            agreeBtn.addEventListener('click', () => {
                checkbox.checked = true;
                modal.style.display = 'none';
                if (registerBtn) {
                    registerBtn.disabled = false;
                }
            });

            closeModal.addEventListener('click', () => {
                modal.style.display = 'none';
            });
        });
    </script>
</x-auth-layout>
