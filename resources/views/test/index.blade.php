<x-test-layout>

    <div class="flex flex-col flex-auto w-full">
        <div class="flex flex-col flex-auto">

            <div class="app-user-test">
                <div class="user-test-background">

                    <div class="test-page">

                        <div class="header header-container">

                            <div class="home">

                                <a href="{{ route('home') }}" class="navbar-brand p-0">
                                    <img src="{{ asset('/img/logo-3.png') }}" alt="logo" class="logo-img">
                                </a>

                            </div>

                            <div id="timer" class="timer">

                                <div class="wrapper">

                                    <div class="time-block ng-star-inserted">

                                        <div id="minutes" class="count">{{ $test_type->mins }}</div>

                                        <div class="label">Daqiqa</div>

                                    </div>
                                    <div class="split ng-star-inserted">:</div>

                                    <div class="time-block ng-star-inserted">

                                        <div id="seconds" class="count">00</div>

                                        <div class="label">Soniya</div>

                                    </div>
                                </div>
                            </div>

                            <div id="test-submit" class="gap-2 align-middle">
                                <button id="end-test-button" class="end-test-button"> Sinovni yakunlash
                                </button>

                            </div>

                        </div>

                        <div class="main">

                            <div class="h-full test-user-info">

                                <div class="user-info mb-2 ng-star-inserted">
                                    <img alt="" class="user-pic"
                                         src="https://i.pinimg.com/originals/ff/a0/9a/ffa09aec412db3f54deadf1b3781de2a.png">

                                    <div>

                                        <div class="teacher-name">
                                            {{ mb_strtoupper(auth()->user()->name) }}
                                        </div>

                                        <div class="flex">
                                            <div> <strong>Pedagog ID raqami:</strong> {{ auth()->user()->getAuthIdentifier() }}</div>
                                        </div>
                                        <div class="flex">
                                            <div> <strong>Test turi:</strong> {{ $test_type->getOriginal('name') }}</div>
                                        </div>
                                        <div class="flex">
                                            <div> <strong>Fan:</strong> {{ $subject->getOriginal('name') }}</div>
                                        </div>
                                        <div class="flex">
                                            <div> <strong>Ball:</strong> {{ $test_type->getOriginal('score') }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="user-test-block">
                                    <div class="mat-accordion mat-accordion-multi">

                                        <div
                                            class="mat-expansion-panel ng-tns-c128-28 mat-expanded mat-expansion-panel-spacing">

                                            <div
                                                class="mat-expansion-panel-header mat-focus-indicator ng-tns-c129-29 ng-tns-c128-28 mat-expanded mat-expansion-toggle-indicator-after ng-star-inserted"
                                                id="mat-expansion-panel-header-0" aria-disabled="true"
                                                style="height: 60px;">
                                                <span class="mat-content ng-tns-c129-29">
                                                    <div
                                                        class="mat-expansion-panel-header-title panel-title ng-tns-c129-29"> {{ $subject->name }} </div>
                                                </span>
                                            </div>
                                            <div
                                                class="mat-expansion-panel-content ng-tns-c128-28 ng-trigger ng-trigger-bodyExpansion"
                                                id="cdk-accordion-child-0">

                                                <div class="mat-expansion-panel-body ng-tns-c128-28">
                                                    <div class="container ng-tns-c128-28">
                                                        @for($i=0; $i<$test_type->getOriginal('questions');)
                                                        <div class="nav-item ng-star-inserted tab-links nav-item-{{ $i + 1 }} {{ $i ? '' : 'active' }}"> {{ ++$i }}</div>
                                                        @endfor
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @if($test_type->id === 1)
                                        <div class="mat-expansion-panel ng-tns-c128-30 mat-expanded mat-expansion-panel-spacing">
                                            <div class="mat-expansion-panel-header mat-focus-indicator ng-tns-c129-31 ng-tns-c128-30 mat-expanded mat-expansion-toggle-indicator-after ng-star-inserted"
                                                id="mat-expansion-panel-header-1"
                                                aria-disabled="true" style="height: 60px;">
                                                <span class="mat-content ng-tns-c129-31">
                                                    <div class="mat-expansion-panel-header-title panel-title ng-tns-c129-31"> Pedagogik mahorati </div>
                                                </span>
                                            </div>
                                            <div role="region"
                                                 class="mat-expansion-panel-content ng-tns-c128-30 ng-trigger ng-trigger-bodyExpansion"
                                                 id="cdk-accordion-child-1"
                                                 aria-labelledby="mat-expansion-panel-header-1"
                                                 style="visibility: visible;">
                                                <div class="mat-expansion-panel-body ng-tns-c128-30">
                                                    <div class="container ng-tns-c128-30">
                                                        @for($i=$test_type->getOriginal('questions'); $i<sizeof($questions);)
                                                            <div class="nav-item ng-star-inserted tab-links nav-item-{{ $i + 1 }}"> {{ ++$i }}</div>
                                                        @endfor
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <form action="{{ route('test.store') }}" method="post" id="test">
                                @csrf
                                @method('post')
                            @foreach($questions as $key => $question)
                                    <input type="hidden" name="result_session_id" value="{{ $result_session_id }}">
                            <div class="test-list test-list-{{ $key + 1 }} {{ $key ? 'hidden' : '' }}">
                                <div class="question-wrapper">
                                    <div class="question-number"> Savol {{ $key + 1 }}</div>
                                    <button
                                        type="button"
                                        class="btn mat-button mat-raised-button text-warn-400"
                                        onclick="openComplaintModal({{ $question['id'] }})"
                                    >
                                        <i class="fa fa-exclamation-circle"></i>
                                        E'tiroz
                                    </button>

                                </div>
                                <div class="mat-divider mat-divider-horizontal">
                                </div>

                                <div class="question-form-wrapper ng-star-inserted">
                                    <div class="question">
                                        <div class="selected-answer times-new-roman-14 ng-star-inserted">
                                            {!! $question['question'] !!}
                                        </div>
                                    </div>

                                    <div class="mat-divider mat-divider-horizontal">
                                    </div>

                                        <div class="answers">
                                            <div class="mat-radio-group ng-untouched ng-pristine ng-invalid">
                                                @foreach($question['options'] as $answer_key => $answer)
                                                <div class="mat-radio-button example-radio-button mat-accent" id="mat-radio-{{ $answer['id'] }}">
                                                    <label class="mat-radio-label" for="mat-radio-{{ $answer['id'] }}-input">
                                                        <span class="mat-radio-container">
                                                            <span class="mat-radio-outer-circle"></span>
                                                            <span class="mat-radio-inner-circle"></span>
                                                            <input type="radio" class="mat-radio-input"
                                                                   id="mat-radio-{{ $answer['id'] }}-input" name="mat-radio-group-{{ $question['id'] }}" value="{{ $answer['id'] }}" tabindex="0">
                                                            <span class="mat-ripple mat-radio-ripple mat-focus-indicator">
                                                                <span class="mat-ripple-element mat-radio-persistent-ripple"></span>
                                                            </span>
                                                        </span>
                                                        <span class="mat-radio-label-content">
                                                            <span style="display: none;">&nbsp;</span>
                                                            <span><b _ngcontent-eob-c283="">{{ chr(65+$answer_key) }})</b></span>
                                                            <div class="selected-answer times-new-roman-14 ng-star-inserted">
                                                                {!! $answer['option'] !!}
                                                            </div>
                                                        </span>
                                                    </label>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                </div>
                                <div class="test-list-pagination">
                                    <button class="prev" type="button"><i class="fas fa-chevron-left"></i> Oldingi</button>
                                    <span class="test-number"> {{ $key + 1 }} / {{ count($questions) }}</span>
                                    <button class="next" type="button"> Keyingisi <i class="fas fa-chevron-right"></i></button>
                                </div>
                            </div>
                            @endforeach
                            </form>
                        </div>
                    </div>
                </div><!----><!---->
                <p-toast class="p-element ng-tns-c99-27 ng-star-inserted">
                    <div class="ng-tns-c99-27 p-toast p-component p-toast-top-right"><!----></div>
                </p-toast>
            </div>
        </div>
    </div>

    <style>
        body::before {
            content: "";
            position: fixed;
            inset: 0;
            pointer-events: none;
            z-index: 9999;

            background-image: url("data:image/svg+xml;utf8, <svg xmlns='http://www.w3.org/2000/svg'><g transform='rotate(-30 200 125)'> <text x='70' y='120' font-size='22' fill='rgba(0,0,0,0.3)'>Muallima.uz</text> <text x='150' y='170' font-size='22' fill='rgba(0,0,0,0.3)'>Muallima.uz</text> <text x='230' y='120' font-size='22' fill='rgba(0,0,0,0.3)'>Muallima.uz</text> </g> </svg> ");

            background-repeat: repeat;
            background-size: 380px 230px;
            }
    </style>

    <div id="confirmModal" class="modal-overlay">
        <div class="modal-box">
            <div class="flex justify-center">
                <span class="border-3 rounded-full border-warning text-warning py-2 px-6 fs-3">
                    <i class="fa fa-exclamation"></i>
                </span>
            </div>
            <p class="not-answered fs-5 p-3 d-none">Diqqat! Hamma savollarga ham javob berilmagan, baribir yakunlamoqchimisiz?</p>
            <p class="submit-answers fs-5 p-3 d-none">Diqqat! Testni yakunlashga ishonchingiz komilmi?</p>

            <div class="modal-actions pt-3">
                <button id="confirmFinish" class="btn mat-button mat-raised-button text-warn-400 fs-6">Ha, yakunlash</button>
                <button id="cancelFinish" class="btn mat-button mat-raised-button fs-6">Ortga</button>
            </div>
        </div>
    </div>

    <div id="complaintModal" class="modal" style="display:none;">
        <div class="modal-content">
            <h4 class="mb-3">E'tiroz bildirish</h4>

            <form id="complaintForm">
                @csrf
                <input type="hidden" name="test_id" id="complaintQuestionId">

                <textarea
                    id="complaintMessageTextarea"
                    name="description"
                    required
                    placeholder="E'tiroz izohi..."
                    rows="4"
                ></textarea>

                <div class="mt-3">
                    <button type="submit" id="complaintSubmitBtn" class="btn bnt-complaint mat-button mat-raised-button btn-success" disabled>Yuborish</button>
                    <button type="button" class="btn mat-button mat-raised-button" onclick="closeComplaintModal()">Bekor qilish</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        function openComplaintModal(questionId) {
            document.getElementById('complaintQuestionId').value = questionId;
            document.getElementById('complaintModal').style.display = 'block';
        }

        const textarea = document.getElementById('complaintMessageTextarea');
        const submitBtn = document.getElementById('complaintSubmitBtn');

        textarea.addEventListener('input', function () {
            submitBtn.disabled = !this.value.trim().length;
        });


        function closeComplaintModal() {
            document.getElementById('complaintModal').style.display = 'none';

            const form = document.getElementById('complaintForm');
            form.reset();
            submitBtn.disabled = true
        }

        document.getElementById('complaintForm').addEventListener('submit', function (e) {
            e.preventDefault();

            fetch('/complaints', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                    'Accept': 'application/json'
                },
                body: new FormData(this)
            })
                .then(res => res.json())
                .then((data) => {
                    if(data.success){
                        alert("✅ E'tirozingiz muvaffaqiyatli jo'natildi");
                        closeComplaintModal();
                        this.reset();
                    } else{
                        alert("⚠️ Nimadir noto'g'ri ketdi. Qaytadan urinib ko'ring.");
                    }
                })
                .catch(() => {
                    alert("⚠️ Nimadir noto'g'ri ketdi. Qaytadan urinib ko'ring.");
                });
        });
    </script>



</x-test-layout>
