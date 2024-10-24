<x-guest-layout>
    <x-authentication-card>

        @if ($errors->any())
            <div class="mb-4">
                <div class="font-medium text-red-600">Telefon yoki parol no'to'g'ri, yoki siz hali ro‘yxatdan o‘tmagansiz</div>
            </div>
        @endif

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="phone" value="{{ __('messages.phone') }}" />
                <x-input id="phone" class="block mt-1 w-full" type="tel" name="phone" :value="old('phone')" required autofocus autocomplete="phone" placeholder="+9989******" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('messages.password') }}" />
                <div class="position-relative">
                    <x-input id="password" class="block mt-1 w-full d-inline-block pr-42" type="password" name="password" required autocomplete="current-password" />
                    <span toggle="#password" class="fa fa-fw fa-eye field-icon password-eye-toggle" id="toggle_password"></span>
                </div>
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('messages.remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('messages.forgot your password?') }}
                    </a>
                @endif

                <x-button class="ms-4">
                    {{ __('messages.log in') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
