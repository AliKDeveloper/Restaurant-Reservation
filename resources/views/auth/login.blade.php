<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    {{-- Button Theme & Dropdown Language --}}
    <div class="flex justify-between">
        @include('table.parts._buttonTheme')
        @include('table.parts.dropdown_language_menu')
    </div>


    <form method="POST" action="{{ route('login') }}" id="login_form">
        @csrf
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('auth/login.Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('auth/login.Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        {{-- Google reCAPTCHA Token --}}
        <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
        <x-input-error :messages="$errors->get('g-recaptcha-response')" class="mt-2" />

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('auth/login.Remember_me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-start mt-4">
            <x-primary-button type="button" onclick="onClick(event)" class="ml-3">
                {{ __('auth/login.Log_in') }}
            </x-primary-button>

            <div class=" ml-4">
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="inline-flex items-start px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        {{ __('auth/login.Sign_Up') }}
                    </a>
                @endif
            </div>

            <div class=" ml-10">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                        {{ __('auth/login.Forgot_your_password') }}
                    </a>
                @endif
            </div>

        </div>
    </form>

    @push('scripts')
        <script>
            function onClick(e) {
                e.preventDefault();
                grecaptcha.ready(function() {
                    grecaptcha.execute('{{ config('recaptcha.site_key') }}', {action: 'login'}).then(function(token) {
                        // Add your logic to submit to your backend server here.
                        document.getElementById('g-recaptcha-response').value = token;
                        document.getElementById('login_form').submit();
                    });
                });
            }
        </script>

        {{-- Theme Script --}}
        @include('table.scripts.__theme')
    @endpush
</x-guest-layout>
