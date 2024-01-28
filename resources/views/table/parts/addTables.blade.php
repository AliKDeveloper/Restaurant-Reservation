<div class="w-full max-w-md mx-auto p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
    <form action="{{ route('table.addTables') }}" method="post">
        @csrf
        <div class="space-y-6">
            <h5 class="text-xl font-medium text-gray-900 dark:text-white">
                {{ __('table/table.initialize_tables') }}
            </h5>

            <div>
                <label for="number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    {{ __('table/table.number_of_tables') }}
                </label>

                <input type="number" name="number" id="number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder=" " required>
            </div>

            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                {{ __('table/table.add') }}
            </button>
        </div>
    </form>
</div>

