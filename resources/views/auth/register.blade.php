<x-auth-layout>
    <style>
        .offerta-modal h2 {
            text-align: center;
            margin-top: 0;
        }
        .offerta-modal p {
            font-size: 20px;
        }
    </style>
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
                            <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="FIO" class="auth-input">

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

                            <div class="password-wrapper">
                                <p class="auth-label">Parol <span>(kamida 8 belgi)</span></p>
                                <input type="password" id="password" name="password" class="auth-input password-input">
                                <i class="far fa-eye toggle-password" data-target="#password"></i>
                            </div>

                            <p class="auth-label">Telefon raqam</p>
                            <input type="text" id="phone-number" name="phone-number" value="{{ old('phone') }}" placeholder="+998"
                                   class="auth-input">
                            <input type="hidden" id="phone" name="phone" value="{{ old('phone') }}">

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
                                Tizimdan ro‘yxatdan o‘tish bilan men foydalanuvchi kelishuviga roziligimni bildiraman.
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
                    <button id="closeModal" class="icon-btn btn"><i class="fa fa-arrow-left"></i></button>
                    <h2 class="bolder">OFERTA (OMMAVIY TAKLIF)</h2>
                    <a href="{{ asset('storage/offerta/offerta.pdf') }}" id="download" class="icon-btn btn"><i class="fa fa-arrow-right-to-bracket rotate-down"></i></a>
                </div>
                <div id="termsFrame" class="terms-frame">
                    <p>Ushbu oferta O‘zbekiston Respublikasining Fuqarolik kodeksining 367-moddasiga muvofiq tuzilgan bo‘lib, <strong>Muallima.uz</strong> sayti (keyingi o‘rinlarda — “Tizim”) orqali ro‘yxatdan o‘tayotgan barcha o‘qituvchilar va talabalar (keyingi o‘rinlarda — <strong>“Foydalanuvchi”</strong>) uchun majburiy hisoblanadi.</p>

                    <p>Tizimda ro‘yxatdan o‘tish, xizmatlardan foydalanish yoki testlarni yechish orqali foydalanuvchi ushbu ofertaning barcha shartlarini to‘liq va so‘zsiz qabul qilgan (aksept qilgan) hisoblanadi.</p>

                    <div class="offerta-band">
                        <h3>1. Umumiy qoidalar</h3>
                        <p>1.1. Mazkur oferta Tizim ma’muriyati tomonidan taqdim etilayotgan onlayn testlar va ta’limiy xizmatlardan foydalanish tartibini belgilaydi.</p>
                        <p>1.2. Tizim materiallari bilimni mustahkamlash va o‘z bilimini sinab ko‘rish maqsadida yaratilgan.</p>
                        <p>1.3. Tizim davlat organlari yoki rasmiy attestatsiya tashkilotlari bilan bog‘liq emas.</p>
                    </div>

                    <div class="offerta-band">
                        <h3>2. Foydalanuvchi ma'lumotlari</h3>
                        <p>2.1. Foydalanuvchi ro‘yxatdan o‘tishda kiritgan ismi, familiyasi, telefon raqami va boshqa shaxsiy ma’lumotlar o‘ziga tegishli ekanini tasdiqlaydi.</p>
                        <p>2.2. Foydalanuvchi kiritilgan ma’lumotlarning haqqoniyligi va yangiligi uchun shaxsan javobgar hisoblanadi.</p>
                        <p>2.3. Boshqa shaxsga tegishli ma’lumotlardan foydalanish qat’iyan taqiqlanadi.</p>
                        <p>2.4. Sayt ma’muriyati foydalanuvchi ma’lumotlarini amaldagi qonunchilikka muvofiq himoyalaydi.</p>
                    </div>

                    <div class="offerta-band">
                        <h3>3. Mualliflik huquqi va foydalanish cheklovlari</h3>
                        <p>3.1. Saytda joylashtirilgan barcha testlar, savollar, matnlar va boshqa materiallar mualliflik huquqi bilan himoyalangan.</p>
                        <p>3.2. Foydalanuvchi sayt materiallaridan faqat shaxsiy va notijoriy maqsadlarda foydalanishi mumkin.</p>
                        <p>3.3. Foydalanuvchi o‘z akkauntining xavfsizligi uchun javobgar bo‘lib, login va parolni uchinchi shaxslarga bermasligi shart.</p>
                        <p>3.4. Quyidagilar qat’iyan taqiqlanadi:</p>
                        <ul>
                            <li>Muallima.uz test va materiallarini tarqatish, nusxalash, o‘zlashtirish, botlar yoki boshqa saytlar orqali joylashtirish;</li>
                            <li>materiallardan pullik kurslar, guruhlar, kanallar yoki treninglarda foydalanish;</li>
                            <li>onlayn kurs materiallarini pullik onlayn yoki oflayn darslarda tayyor material sifatida qo‘llash.</li>
                        </ul>
                        <h4>🔒 Mualliflik huquqi buzilganda javobgarlik</h4>
                        <p>3.5. Ushbu ofertada belgilangan talablarga zid ravishda sayt materiallaridan foydalanish mualliflik huquqining buzilishi hisoblanadi.</p>
                        <p>3.6. Mualliflik huquqi buzilgan taqdirda sayt ma’muriyati quyidagi choralarni ko‘rish huquqiga ega:</p>
                        <ul>
                            <li>foydalanuvchi hisobini vaqtincha yoki doimiy bloklash;</li>
                            <li>yetkazilgan moddiy zararni qoplashni talab qilish;</li>
                            <li>qonunchilikda belgilangan tartibda jarima undirish;</li>
                            <li>huquqlarni himoya qilish maqsadida sud organlariga murojaat qilish.</li>
                        </ul>
                        <p>3.7. Foydalanuvchi noqonuniy foydalanish natijasida yetkazilgan barcha zararlar uchun to‘liq javobgar hisoblanadi.</p>
                        <p>3.8. Sayt ma’muriyati huquqbuzarlik bo‘yicha dalillarni sud yoki vakolatli organlarga taqdim etish huquqiga ega.</p>
                        <p>3.9. Agar Muallima.uz tizimidan tijoriy maqsadlarda noqonuniy foydalanish holati haqida uchinchi shaxs tomonidan asosli dalillar (skrinshotlar, havolalar, yozuvlar va boshqa tasdiqlovchi materiallar) taqdim etilsa va ushbu holat natijasida foydalanuvchidan jarima yoki kompensatsiya undirilsa, sayt ma’muriyati o‘z ixtiyoriga ko‘ra ushbu uchinchi shaxsga undirilgan summa hisobidan mukofot (rag‘batlantirish) berish huquqiga ega.</p>
                        <p>3.10. Mukofot miqdori, shakli va to‘lash tartibi sayt ma’muriyati tomonidan mustaqil ravishda belgilanadi hamda majburiy hisoblanmaydi.</p>
                    </div>

                    <div class="offerta-band">
                        <h3>4. Testlar va attestatsiya haqida</h3>
                        <p>4.1. Saytda joylashtirilgan testlar namunaviy (o‘quv-maqsadli) xarakterga ega.</p>
                        <p>4.2. Testlar rasmiy attestatsiya savollarining aynan nusxasi emas.</p>
                        <p>4.3. Testlar davlat organlariga tegishli vazirlik tomonidan  tasdiqlangan spektifikatsiyada berilgan darsliklar, metodikalar ,metodik qo‘llanmalar va qo‘shimcha adabiyotlarga asoslanib tuzilgan.</p>
                        <p>4.4. Ayrim savollar real sinovlarda aynan , qisman o‘zgartirilgan yoki o‘xshash shaklda uchrashi mumkin.</p>
                        <p>4.5. Ushbu holat kafolat sifatida talqin etilmaydi.</p>
                    </div>

                    <div class="offerta-band">
                        <h3>5. Natijalar va javobgarlik</h3>
                        <p>5.1. Test natijalari faqat foydalanuvchining bilimini baholash uchun mo‘ljallangan.</p>
                        <p>5.2. Saytda namunaviy test yechish natijasida to’plagan yuqori yoki past bali foydalanuvchining amaldagi malaka toifasiga ta’sir qilmaydi.</p>
                        <p>5.3. Testlardan foydalanish natijasida qabul qilingan qarorlar uchun foydalanuvchi o‘zi javobgar.</p>
                    </div>

                    <div class="offerta-band">
                        <h3>6. Texnik holatlar</h3>
                        <p>6.1. Sayt faoliyatida texnik uzilishlar yoki vaqtinchalik nosozliklar bo‘lishi mumkin.</p>
                        <p>6.2. Foydalanuvchining nosoz qurilmasi yoki sifatsiz internet sababli yuzaga kelgan texnik muammolar uchun sayt ma’muriyati javobgar emas.</p>
                        <p>6.3. Sayt ma’muriyati saytni texnik ishlarini olib borish huquqini o‘zida saqlab qoladi.</p>
                    </div>

                    <div class="offerta-band">
                        <h3>7. Akkauntni cheklash va bekor qilish</h3>
                        <p>7.1. Quyidagi holatlarda foydalanuvchi akkaunti vaqtincha yoki doimiy bloklanishi mumkin:</p>
                        <ul>
                            <li>yolg‘on ma’lumot kiritish;</li>
                            <li>tijoriy foydalanish;</li>
                            <li>mualliflik huquqini buzish;</li>
                            <li>sayt faoliyatiga zarar yetkazish.</li>
                        </ul>
                    </div>

                    <div class="offerta-band">
                        <h3>8. To‘lovlar va obuna shartlari</h3>
                        <p>8.1. Sayt xizmatlari pullik va  ayrim hollarda bepul shakllarda taqdim etiladi.</p>
                        <p>8.2. Pullik xizmatlar uchun to‘lovlar eng ishonchli hamkor <strong>Click</strong> ilovasi orqali amalga oshiriladi.</p>
                        <p>8.3. Click orqali to‘lovlar ishonchli va xavfsiz bo‘lib, bank karta ma’lumotlari sayt tomonidan saqlanmaydi.Ilova o‘rnatilgan smartfondan to’lov qilish juda oson va qulay.</p>
                        <p>8.4. Quyidagi obuna turlari mavjud bo‘lishi mumkin:</p>
                        <ul>
                            <li>kunlik;</li>
                            <li>haftalik;</li>
                            <li>oylik;</li>
                            <li>yillik.</li>
                        </ul>
                        <p>8.5. Har bir obuna turi bo‘yicha xizmat hajmi, muddati va narxi sayt sahifasida alohida ko‘rsatiladi.</p>
                        <p>8.6. Foydalanuvchi to‘lovdan oldin shartlar bilan mustaqil tanishishi shart.</p>
                        <p>8.7. To‘lov amalga oshirilgandan so‘ng xizmatlar avtomatik faollashtiriladi.</p>
                        <p>8.8. Obuna muddati davomida xizmatlardan foydalanilmagan taqdirda ham, to‘lov summasi qaytarilmaydi, qonunchilikda belgilangan holatlar bundan mustasno.</p>
                        <p>8.9. Texnik nosozlik holatlarida sayt ma’muriyati obuna muddatini uzaytirish huquqiga ega.</p>
                        <p>8.10. Narxlar va shartlar bir tomonlama o‘zgartirilishi mumkin, o‘zgarishlar keyingi to‘lovlarga tatbiq etiladi.</p>
                    </div>

                    <div class="offerta-band">
                        <h3>9. Yakuniy qoidalar</h3>
                        <p>9.1. Ushbu oferta Muallima.uz saytiga joylashtirilgan kundan boshlab kuchga kiradi.</p>
                        <p>9.2. Sayt ma’muriyati ushbu ofertaga bir tomonlama o‘zgartirish va qo‘shimchalar kiritish huquqiga ega.</p>
                        <p>9.3. Ofertaga kiritilgan o‘zgartirishlar saytga joylashtirilgan paytdan boshlab kuchga kiradi.</p>
                        <p>9.4. Foydalanuvchi sayt xizmatlaridan foydalanishda ofertaning amaldagi tahririga rioya etishi shart.</p>
                        <p>9.5. Ushbu oferta O‘zbekiston Respublikasining amaldagi qonunchiligiga muvofiq tartibga solinadi.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="agreeBtn" style="display: none;" class="btn btn-success btn-rounded">
                        Shartlarni qabul qilaman
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
                if (
                    termsFrame.scrollTop + termsFrame.clientHeight
                    >= termsFrame.scrollHeight - 10
                ) {
                    agreeBtn.style.display = 'block';
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

            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape') {
                    modal.style.display = 'none';
                }
            });
        });
    </script>
</x-auth-layout>
