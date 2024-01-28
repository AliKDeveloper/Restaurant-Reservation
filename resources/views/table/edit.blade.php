<button type="button" id="editTableDetailsButton-{{ $table->id }}"
        data-modal-toggle="editTableDetailsModal-{{ $table->id }}"
        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
    @if($table->is_reserved)
        {{ __('table/table.edit') }}
    @else
        {{ __('table/table.reserve') }}
    @endif
</button>

<div id="editTableDetailsModal-{{ $table->id }}" tabindex="-1" aria-hidden="true"
     class="hidden fixed top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-lg max-h-full ">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-800 p-1">

            <!-- Modal Header -->
            <div class="flex justify-between items-center p-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    @if($table->is_reserved)
                        {{ __('table/table.editing_table') }}:
                    @else
                        {{ __('table/table.reserved_table') }}:
                    @endif {{$table->id}}
                </h2>

                {{-- Close Box Icon --}}
                <button type="button" data-modal-toggle="editTableDetailsModal-{{ $table->id }}"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                              clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            {{-- Modal Body --}}
            <form action="{{ route('table.update', $table->id) }}" method="post">
                @csrf
                @method('put')
                <div class="grid md:grid-cols-2 md:gap-6 mx-6 my-6">

                    <div class="relative z-0 w-full mb-6 group">
                        <input type="text" name="client" id="floating_client_name"
                               class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                               placeholder=" " @if($table->is_reserved) value="{{ $table->client }}" @endif  required/>
                        <label for="floating_client_name"
                               class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            {{ __('table/table.client_name') }}
                        </label>
                    </div>

                    <div class="relative z-0 w-full mb-6 group">
                        <input type="tel" pattern="^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$"
                               name="phone" id="floating_phone"
                               class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                               placeholder=" " @if($table->is_reserved) value="{{ $table->phone }}" @endif required/>
                        <label for="floating_phone"
                               class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            {{ __('table/table.phone') }}
                        </label>
                    </div>

                    <div class="relative z-0 w-full mb-6 group">
                        <input type="datetime-local" name="arrival_time" id="floating_arrival_time"
                               class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                               placeholder=" " @if($table->is_reserved) value="{{ $table->arrival_time }}" @endif/>
                        <label for="floating_arrival_time"
                               class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            {{ __('table/table.arrival_time') }}
                        </label>
                    </div>

                    <div class="relative z-0 w-full mb-6 group">
                        <input type="text" name="note" id="floating_note_name"
                               class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                               placeholder=" " @if($table->is_reserved) value="{{ $table->note }}" @endif/>
                        <label for="floating_note_name"
                               class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            {{ __('table/table.note') }}
                        </label>
                    </div>

                </div>

                <div class="flex items-start justify-start space-x-2 md:space-x-4 mx-6 mb-6">
                    <button type="submit"
                            class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        @if($table->is_reserved)
                            {{ __('table/table.update') }}
                        @else
                            {{ __('table/table.reserve') }}
                        @endif
                    </button>

                    {{-- Close Button --}}
                    <button data-modal-hide="editTableDetailsModal-{{ $table->id }}" type="button"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                        {{ __('table/table.close') }}
                    </button>

                    {{-- Cancel the Reservation Body --}}
                    @if($table->is_reserved)
                        <button type="button" data-modal-target="cancelReservationModal-{{ $table->id }}"
                                data-modal-toggle="cancelReservationModal-{{ $table->id }}"
                                class="w-full md:w-auto font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                            {{ __('table/table.cancel_the_reservation') }}
                        </button>
                        @include('table.parts._warnPopupBox',['alertMessage'=>__('table/table.cancel_reservation_alert'),
                        'formID'=>'cancelReservation'.'-'.$table->id, 'modalName'=>'cancelReservationModal'.'-'.$table->id])
                    @endif

                </div>
            </form>

            {{-- Form for Cancel the Reservation  --}}
            @if($table->is_reserved)
                <div>
                    <form id="cancelReservation-{{ $table->id }}" action="{{ route('table.cancel', $table->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                    </form>
                </div>
            @endif

        </div>
    </div>
</div>
