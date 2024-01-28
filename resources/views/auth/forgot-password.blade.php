<x-guest-layout>
    {{-- Button Theme & Dropdown Language --}}
    <div class="flex justify-between">
        @include('table.parts._buttonTheme')
        @include('table.parts.dropdown_language_menu')
    </div>

    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('auth/forgot_password.forgot_password_message') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('auth/forgot_password.email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('auth/forgot_password.email_reset_link') }}
            </x-primary-button>
        </div>
    </form>

    @push('scripts')
        {{-- Theme Script --}}
        @include('table.scripts.__theme')
    @endpush
</x-guest-layout>
