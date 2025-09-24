<x-test-layout>

    <div class="flex flex-col flex-auto w-full">
        <div class="flex flex-col flex-auto">

            <div class="app-user-test">
                <div class="user-test-background">

                    <div class="test-page">

                        <div class="header header-container">

                            <div class="home">

                                <a href="{{ route('home') }}" class="navbar-brand p-0">

                                    <h1 class="m-0 home-header"><i class="fa fa-user-tie me-2"></i>
                                        Muallima<span>.uz</span> <br><span
                                            class="home-header-span">Yaxshi muallim - sifatli ta'lim</span>
                                    </h1>

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

                            <div id="test-submit" class="flex gap-2 align-middle">
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
                                            <div> Pedagog ID raqami: {{ auth()->user()->getAuthIdentifier() }}</div>

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
                                                        @for($i=40; $i<sizeof($questions);)
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
                            <div class="test-list test-list-{{ $key + 1 }} {{ $key ? 'hidden' : '' }}">
                                <div class="question-wrapper">
                                    <div class="question-number"> Savol {{ $key + 1 }}</div>
                                </div>
                                <div class="mat-divider mat-divider-horizontal">
                                </div>

                                <div class="question-form-wrapper ng-star-inserted">
                                        <div class="question">
                                            <div class="selected-answer times-new-roman-14 ng-star-inserted">
                                                {!! $question->question !!}
                                            </div>
                                        </div>

                                        <div class="answers">
                                            <div class="mat-radio-group ng-untouched ng-pristine ng-invalid">
                                                @foreach($question->answers as $answer_key => $answer)
                                                <div class="mat-radio-button example-radio-button mat-accent" id="mat-radio-{{ $answer->id }}">
                                                    <label class="mat-radio-label" for="mat-radio-{{ $answer->id }}-input">
                                                        <span class="mat-radio-container">
                                                            <span class="mat-radio-outer-circle"></span>
                                                            <span class="mat-radio-inner-circle"></span>
                                                            <input type="radio" class="mat-radio-input"
                                                                   id="mat-radio-{{ $answer->id }}-input" name="mat-radio-group-{{ $key + 1 }}" value="{{ $answer->id }}" tabindex="0">
                                                            <span class="mat-ripple mat-radio-ripple mat-focus-indicator">
                                                                <span class="mat-ripple-element mat-radio-persistent-ripple"></span>
                                                            </span>
                                                        </span>
                                                        <span class="mat-radio-label-content">
                                                            <span style="display: none;">&nbsp;</span>
                                                            <span><b _ngcontent-eob-c283="">{{ chr(65+$answer_key) }})</b></span>
                                                            <div class="selected-answer times-new-roman-14 ng-star-inserted">
                                                                {!! $answer->option !!}
                                                            </div>
                                                        </span>
                                                    </label>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                </div>
                                <div class="test-list-pagination">
                                    <button class="prev" type="button"> Oldingi</button>
                                    <span class="test-number"> {{ $key + 1 }} / {{ count($questions) }}</span>
                                    <button class="next" type="button"> Keyingisi</button>
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

</x-test-layout>
