<table id="myTable" class="flex flex-col md:inline-table overflow-hidden mb-16 w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr class="hidden md:table-row">
            <th class="py-3 px-6">
                @sortablelink('id', __('table/table.table_number') )
                <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3 h-3" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512">
                    <path
                        d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"/>
                </svg>
            </th>

            <th class="py-3 px-6">
                @sortablelink('is_reserved', __('table/table.is_reserved'))
                <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3 h-3" aria-hidden="true" fill="currentColor"
                     viewBox="0 0 320 512">
                    <path
                        d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"/>
                </svg>
            </th>

            <th class="py-3 px-6">
                @sortablelink('client', __('table/table.client_name'))
                <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3 h-3" aria-hidden="true" fill="currentColor"
                     viewBox="0 0 320 512">
                    <path
                        d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"/>
                </svg>
            </th>

            <th class="py-3 px-6">
                @sortablelink('client', __('table/table.reserved_by'))
                <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3 h-3" aria-hidden="true" fill="currentColor"
                     viewBox="0 0 320 512">
                    <path
                        d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"/>
                </svg>
            </th>

            <th class="py-3 px-6">
                @sortablelink('arrival_time', __('table/table.arrival_time'))
                <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3 h-3" aria-hidden="true" fill="currentColor"
                     viewBox="0 0 320 512">
                    <path
                        d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"/>
                </svg>
            </th>

            <th class="py-3 px-6">
                {{ __('table/table.action') }}
            </th>
        </tr>
    </thead>

    <tbody>
    @foreach ($tables as $table)
        <tr class="flex flex-col md:table-row bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600">
            <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                <span class="md:hidden">{{ __('table/table.table_number') }}: </span>{{ $table->id }}
            </td>

            <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$table->is_reserved? __('table/table.reserved') : __('table/table.free')}}
            </td>

            <td class="py-4 px-6 font-medium text-gray-900 overflow-hidden text-ellipsis whitespace-nowrap dark:text-white">
                <span class="{{!$table->is_reserved? 'hidden' : ''}} md:hidden">{{ __('table/table.client_name') }}: </span>{{$table->client}}
            </td>

            <td class="py-4 px-6 font-medium text-gray-900 overflow-hidden text-ellipsis whitespace-nowrap dark:text-white">
                <span class="{{!$table->is_reserved? 'hidden' : ''}} md:hidden">{{ __('table/table.reserved_by') }}: </span>{{$table->reserved_by}}
            </td>

            <td class="py-4 px-6 font-medium text-gray-900 overflow-hidden text-ellipsis whitespace-nowrap dark:text-white">
                <span class="{{!$table->is_reserved? 'hidden' : ''}} md:hidden">{{ __('table/table.arrival_time') }}: </span>{{date('Y-m-d h:i A', strtotime($table->arrival_time))}}
            </td>

            <td class="flex items-center py-4 px-6 space-x-3">
                @include('table.edit')
                @if ($table->is_reserved)
                    @include('table.show')
                @endif
                @include('table.delete')
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
