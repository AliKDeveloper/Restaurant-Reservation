<button type="button" x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-adding-table')" class="inline-flex flex-col items-center justify-center px-5 w-10 h-10 bg-blue-600 rounded-full hover:bg-blue-700 group focus:ring-4 focus:ring-blue-300 focus:outline-none dark:focus:ring-blue-800">
    <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
    </svg>
    <span class="sr-only">New item</span>
</button>

<x-modal name="confirm-adding-table" :show="$errors->tableAddition->isNotEmpty()" focusable>
    <form method="post" action="{{ route('table.store') }}" class="p-6">
        @csrf
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('table/table.add_new_table_header') }}
        </h2>

        <div class="mt-6">
            <x-input-label for="id" value="{{ __('table/table.table_number_placeholder') }}" class="sr-only" />

            <x-text-input
                id="id"
                name="id"
                type="number"
                class="mt-1 block w-3/4"
                placeholder="{{ __('table/table.table_number_placeholder') }}"
            />

            <x-input-error :messages="$errors->tableAddition->get('id')" class="mt-2" />
        </div>

        <div class="mt-6 flex justify-start">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('table/table.close') }}
            </x-secondary-button>

            <x-success-button class="ml-3">
                {{ __('table/table.add_new_table_button') }}
            </x-success-button>
        </div>
    </form>
</x-modal>
