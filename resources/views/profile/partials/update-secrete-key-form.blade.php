<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('profile/update_secrete_key.update_secrete_key') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('profile/update_secrete_key.secrete_key_note') }}
        </p>
    </header>

    <form method="post" action="{{ route('secreteKey.change') }}" class="mt-6 space-y-6">
        @csrf

        <div>
            <x-input-label for="current_secrete_key" :value="__('profile/update_secrete_key.current_secrete_key')" />
            <x-text-input id="current_secrete_key" name="current_secrete_key" type="password" class="mt-1 block w-full" autocomplete="current-secrete-key" />
            @if(session('current_secrete_key_incorrect')) <x-input-error :messages="session('current_secrete_key_incorrect')"  class="mt-2" /> @endif
        </div>

        <div>
            <x-input-label for="new_secrete_key" :value="__('profile/update_secrete_key.new_secrete_key')" />
            <x-text-input id="new_secrete_key" name="new_secrete_key" type="password" class="mt-1 block w-full" autocomplete="new-secrete-key" />
            <x-input-error :messages="$errors->updateSecreteKey->get('new_secrete_key')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="new_secrete_key_confirmation" :value="__('profile/update_secrete_key.confirm_secrete_key')" />
            <x-text-input id="new_secrete_key_confirmation" name="new_secrete_key_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-secrete-key" />
            <x-input-error :messages="$errors->updateSecreteKey->get('new_secrete_key_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('profile/update_secrete_key.save') }}</x-primary-button>

            @if (session('status') === 'secrete-key-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('profile/update_secrete_key.saved') }}</p>
            @endif
        </div>
    </form>
</section>
