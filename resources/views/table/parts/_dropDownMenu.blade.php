<div id="dropdownDots"
     class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconButton">
        <li>
            <button type="button" data-modal-target="cancelAllReservationModal"
                    data-modal-toggle="cancelAllReservationModal"
                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 text-gray-900 dark:text-white">
                {{ __('table/table.cancel_all_reservation_button') }}
            </button>
        </li>
    </ul>

    <div class="py-1">
        <a href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
           class="block py-2 px-4 text-sm text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-600">
            {{ __('table/table.logout_button') }}
        </a>
        {{-- Form for Logout --}}
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>

</div>

{{-- Cancel all Reservations Body --}}
@include('table.parts._warnPopupBox', ['alertMessage'=>__('table/table.cancel_all_reservations'),
                        'formID'=>'cancelAllReservation', 'modalName'=>'cancelAllReservationModal'])

{{-- Form for Cancel All Reservations --}}
<form id="cancelAllReservation" action="{{ route('table.cancelAll', 'All Reservations have been Canceled') }}"
      method="post">
    @csrf
    @method('patch')
</form>

