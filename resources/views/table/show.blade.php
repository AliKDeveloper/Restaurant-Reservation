<button type="button" id="showTableDetailsButton-{{ $table->id }}" data-modal-toggle="showTableDetailsModal-{{ $table->id }}" class="font-medium text-green-600 dark:text-green-500 hover:underline">
    {{ __('table/table.details') }}
</button>

<div id="showTableDetailsModal-{{ $table->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-lg h-full md:h-auto">
        {{-- Modal Content --}}
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">

            <!-- Modal Header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('table/table.details_of_the_table') }}: {{$table->id}}
                </h2>

                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="showTableDetailsModal-{{ $table->id }}">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            {{-- Modal Body --}}
            <div class="mt-6">
                <div>
                    <label for="id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        {{ __('table/table.table_number') }}:&nbsp;{{$table->id}}
                    </label>
                </div>

                <div>
                    <label for="client" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        {{ __('table/table.client_name') }}: {{$table->client}}
                    </label>
                </div>

                <div>
                    <label for="reserved_by" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        {{ __('table/table.reserved_by') }}:&nbsp;{{$table->reserved_by}}
                    </label>
                </div>

                <div>
                    <label for="reserved_by" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        {{ __('table/table.arrival_time') }}:&nbsp;{{$table->arrival_time}}
                    </label>
                </div>

                <div>
                    <label for="reserved_by" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        {{ __('table/table.last_time_changed') }}:&nbsp;{{$table->updated_at}}
                    </label>
                </div>

                <div>
                    <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        {{ __('table/table.phone') }}: {{$table->phone}}
                    </label>
                </div>

                <div>
                    <label for="note" class="block {{$table->note == null ? 'hidden':''}} mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        {{ __('table/table.note') }}:&nbsp;{{$table->note}}
                    </label>
                </div>
            </div>

            <div class="mt-6 flex justify-start">
                <button data-modal-hide="showTableDetailsModal-{{ $table->id }}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                    {{ __('table/table.close') }}
                </button>
            </div>

        </div>
    </div>
</div>
