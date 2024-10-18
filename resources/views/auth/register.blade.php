<x-guest-layout>
    <x-authentication-card>

        <x-validation-errors class="mb-4"/>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mt-4">
                <div>
                    <h1>Toifangizni tanlang:</h1>
                    @foreach($user_types ?? [] as $type)
                        <label class="block">
                            {{ $type->name }} <input type="radio" name="type" value="{{ $type->id }}"
                                                     required>
                        </label>
                    @endforeach
                </div>
            </div>

            <div class="mt-4">
                <label for="name" class="block font-medium text-sm text-gray-700">{{ __('messages.enter name') }}</label>
                <input id="name"
                       class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                       type="text" name="name" value="{{ old('name')}}" required autocomplete="name" minlength="3"/>
            </div>

            <div class="mt-4">
                <label class="block font-medium text-sm text-gray-700">{{ __('messages.phone') }}</label>
                <div class="flex items-center gap-1">
                    <div class="relative w-1/2">
                        <select id="code" name="code" required
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full">
                            <option selected>Kod</option>
                            <option value="33">33</option>
                            <option value="88">88</option>
                            <option value="90">90</option>
                            <option value="91">91</option>
                            <option value="93">93</option>
                            <option value="94">94</option>
                            <option value="95">95</option>
                            <option value="97">97</option>
                            <option value="98">98</option>
                            <option value="99">99</option>
                        </select>
                    </div>
                    <div class="relative w-full">
                        <input type="tel" id="phone-input" name="phone" value="{{ old('phone') }}"
                               class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                               pattern="[0-9]{7}" maxlength="7" placeholder="###-##-##" required/>
                    </div>
                </div>
                <span class="small text-warning italic">( Raqamlar orasini ochmasdan,chiziqcha qoʻymasdan yozing)</span>
            </div>

            <div class="mt-4">
                <div class="flex gap-1">
                    <div class="mt-4 flex-1">
                        <label for="province"
                               class="block font-medium text-sm text-gray-700">{{ __('messages.select province') }}
                            </label>
                        <select id="province" name="province"
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">
                            <option value="" selected>{{ __('messages.select province') }}</option>

                            @foreach ($provinces ?? [] as $province)
                                <option value="{{ $province->id }}"> {{ $province->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-4 flex-1">
                        <label for="town"
                               class="block font-medium text-sm text-gray-700">{{ __('messages.select town') }}</label>
                        <select id="town" name="town"
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">
                            <option value="" selected>{{ __('messages.select town') }}</option>
                            @foreach ($towns??[] as $town)
                                <option value="{{ $town->id }}" data-province="{{ $town->province_id }}" class="hidden">{{ $town->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div id="teacher-section" class="depending-section hidden">
                <div class="mt-4">
                    <label for="teacher-category"
                           class="block font-medium text-sm text-gray-700">{{ __('messages.select teacher type') }}
                        </label>
                    <select id="teacher-category" name="teacher_category"
                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">
                        <option value="" selected disabled>{{ __('messages.select teacher type') }}</option>
                        @foreach ($teacher_types??[] as $teacher_type)
                            <option value="{{ $teacher_type->id }}">{{ $teacher_type->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-4">
                    <label for="subject"
                           class="block font-medium text-sm text-gray-700">{{ __('messages.select subject') }}</label>
                    <select id="subject" name="subject"
                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">
                        <option value="" selected disabled>{{ __('messages.select subject') }}</option>
                        @foreach ($subjects??[] as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div id="pupil-section" class="depending-section hidden">
                <div class="mt-4">
                    <label for="school"
                           class="block font-medium text-sm text-gray-700">{{ __('messages.select the school') }}
                        </label>
                    <select id="school" name="school"
                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">
                        <option value="" selected disabled>{{ __('messages.select the school') }}</option>
                        @foreach ($schools??[] as $school)
                            <option value="{{ $school->id }}" class="hidden" data-town="{{ $school->town_id }}">{{ $school->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mt-4">
                    <label for="pupil-grade"
                           class="block font-medium text-sm text-gray-700">{{ __('messages.select pupil grade') }}
                        </label>
                    <select id="pupil-grade" name="pupil_grade"
                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">
                        <option value="1" selected>1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>

            </div>


            <div class="mt-4">
                <x-label for="password" value="{{ __('messages.password') }}"/>
                <div class="relative">
                    <x-input id="password" class="block mt-1 w-full pr-10" type="password" name="password" required
                             autocomplete="new-password"/>
                    <span class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                        <i class="fa fa-eye cursor-pointer" id="togglePassword"></i>
                    </span>
                </div>
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('messages.confirm password') }}"/>
                <div class="relative">
                    <x-input id="password_confirmation" class="block mt-1 w-full pr-10" type="password"
                             name="password_confirmation" required autocomplete="new-password"/>
                    <span class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                        <i class="fa fa-eye cursor-pointer" id="togglePasswordConfirmation"></i>
                    </span>
                </div>
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required/>

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                   href="{{ route('login') }}">
                    {{ __('messages.already registered') }}
                </a>

                <x-button class="ms-4">
                    {{ __('messages.register') }}
                </x-button>
            </div>
        </form>

    </x-authentication-card>
</x-guest-layout>
