<x-guest-layout>
    <x-authentication-card>

        <h1 class="h3 auth-title">{{ __('messages.register') }}</h1>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mt-4">
                <label for="name" class="block font-medium fs-6 text-gray-700 mb-3">Toifangizni tanlang</label>
                @foreach($user_types ?? [] as $type)
                    <label class="block">
                        {{ $type->name }} <input type="radio" name="type" value="{{ $type->id }}">
                    </label>
                @endforeach
                @error('type')
                <div class="text-danger mt-1 small">Xatolik: {{ $message }}</div>
                @enderror
            </div>

            <div class="mt-4">
                <label for="name" class="block font-medium fs-6 text-gray-700 mb-2">{{ __('messages.enter name') }}</label>
                <input id="name"
                       class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                       type="text" name="name" value="{{ old('name')}}" autocomplete="name"/>
                @error('name')
                <div class="text-danger mt-1 small">Xatolik: {{ $message }}</div>
                @enderror
            </div>

            <div class="mt-4">
                <label for="phone-input" class="block font-medium fs-6 text-gray-700 mb-2">{{ __('messages.phone') }}</label>
                <div class="flex items-center gap-1">
                    <div class="relative w-full">
                        <input type="tel" id="phone-input" name="phone" value="{{ old('phone') }}"
                               class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                               maxlength="13" placeholder="+9989******" />
                    </div>
                </div>
                <span class="small text-warning italic">( Raqamlar orasini ochmasdan,chiziqcha qoʻymasdan yozing)</span>
                @error('phone')
                <div class="text-danger mt-1 small">Xatolik: {{ $message }}</div>
                @enderror
            </div>

            <div class="mt-4">
                <div class="flex gap-1">
                    <div class="mt-4 flex-1">
                        <label for="province"
                               class="block font-medium fs-6 text-gray-700 mb-2">{{ __('messages.select province') }}
                            </label>
                        <select id="province" name="province"
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">
                            <option value="" selected>{{ __('messages.select province') }}</option>

                            @foreach ($provinces ?? [] as $province)
                                <option value="{{ $province->id }}"> {{ $province->name }}</option>
                            @endforeach
                        </select>
                        @error('province')
                        <div class="text-danger mt-1 small">Xatolik: {{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-4 flex-1">
                        <label for="town"
                               class="block font-medium fs-6 text-gray-700 mb-2">{{ __('messages.select town') }}</label>
                        <select id="town" name="town"
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">
                            <option value="" selected>{{ __('messages.select town') }}</option>
                            @foreach ($towns??[] as $town)
                                <option value="{{ $town->id }}" data-province="{{ $town->province_id }}" class="hidden">{{ $town->name }}</option>
                            @endforeach
                        </select>
                        @error('town')
                        <div class="text-danger mt-1 small">Xatolik: {{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div id="teacher-section" class="depending-section hidden">
                <div class="mt-4">
                    <label for="teacher-category"
                           class="block font-medium fs-6 text-gray-700 mb-2">{{ __('messages.select teacher type') }}
                        </label>
                    <select id="teacher-category" name="teacher_category"
                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">
                        <option value="" selected disabled>{{ __('messages.select teacher type') }}</option>
                        @foreach ($teacher_types??[] as $teacher_type)
                            <option value="{{ $teacher_type->id }}">{{ $teacher_type->name }}</option>
                        @endforeach
                    </select>
                    @error('teacher_category')
                    <div class="text-danger mt-1 small">Xatolik: {{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-4">
                    <label for="subject"
                           class="block font-medium fs-6 text-gray-700 mb-2">{{ __('messages.select subject') }}</label>
                    <select id="subject" name="subject"
                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">
                        <option value="" selected disabled>{{ __('messages.select subject') }}</option>
                        @foreach ($subjects??[] as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                        @endforeach
                    </select>
                    @error('subject')
                    <div class="text-danger mt-1 small">Xatolik: {{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div id="pupil-section" class="depending-section hidden">
                <div class="mt-4">
                    <label for="school"
                           class="block font-medium fs-6 text-gray-700 mb-2">{{ __('messages.select the school') }}
                        </label>
                    <select id="school" name="school"
                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">
                        <option value="" selected disabled>{{ __('messages.select the school') }}</option>
                        @foreach ($schools??[] as $school)
                            <option value="{{ $school->id }}" class="hidden" data-town="{{ $school->town_id }}">{{ $school->name }}</option>
                        @endforeach
                    </select>
                    @error('school')
                    <div class="text-danger mt-1 small">Xatolik: {{ $message }}</div>
                    @enderror
                </div>

                <div class="mt-4">
                    <label for="pupil-grade"
                           class="block font-medium fs-6 text-gray-700 mb-2">{{ __('messages.select pupil grade') }}
                        </label>
                    <select id="pupil-grade" name="pupil_grade"
                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">
                        <option value="1" selected>1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                    @error('pupil_grade')
                    <div class="text-danger mt-1 small">Xatolik: {{ $message }}</div>
                    @enderror
                </div>

            </div>


            <div class="mt-4">
                <x-label for="password" value="{{ __('messages.password') }}" class="fs-6 mb-2" />
                <div class="position-relative">
                    <x-input id="password" class="block mt-1 w-full pr-10" type="password" name="password" required
                             autocomplete="new-password"/>
                    <span toggle="#password" class="fa fa-fw fa-eye field-icon password-eye-toggle" id="toggle_password"></span>
                </div>
                @error('password')
                <div class="text-danger mt-1 small">Xatolik: {{ $message }}</div>
                @enderror
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('messages.confirm password') }}" class="fs-6 mb-2" />
                <div class="position-relative">
                    <x-input id="password_confirmation" class="block mt-1 w-full pr-10" type="password"
                             name="password_confirmation" required autocomplete="new-password"/>
                    <span toggle="#password" class="fa fa-fw fa-eye field-icon password-eye-toggle" id="toggle_password_confirmation"></span>
                </div>
                @error('password_confirmation')
                <div class="text-danger mt-1 small">Xatolik: {{ $message }}</div>
                @enderror
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
