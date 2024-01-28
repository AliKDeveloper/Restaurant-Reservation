<x-guest-layout>

    {{-- Button Theme & Dropdown Language --}}
    <div class="flex justify-between">
        @include('table.parts._buttonTheme')
        @include('table.parts.dropdown_language_menu')
    </div>

    <form method="POST" action="{{ route('register') }}" id="register_form">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('auth/register.Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('auth/register.Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('auth/register.Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('auth/register.Confirm_Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        {{-- Google reCAPTCHA Token --}}
        <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
        <x-input-error :messages="$errors->get('g-recaptcha-response')" class="mt-2" />

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('auth/register.Already_registered') }}
            </a>

            <x-primary-button type="button" onclick="onClick(event)" class="ml-4">
                {{ __('auth/register.Register') }}
            </x-primary-button>
        </div>
    </form>

    @push('scripts')
        <script>
            function onClick(e) {
                e.preventDefault();
                grecaptcha.ready(function() {
                    grecaptcha.execute('{{ config('recaptcha.site_key') }}', {action: 'register'}).then(function(token) {
                        // Add your logic to submit to your backend server here.
                        document.getElementById('g-recaptcha-response').value = token;
                        document.getElementById('register_form').submit();
                    });
                });
            }
        </script>

        {{-- Theme Script --}}
        @include('table.scripts.__theme')
    @endpush
</x-guest-layout>
