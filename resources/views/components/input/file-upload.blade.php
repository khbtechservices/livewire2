<div class="mt-2 space-x-3 flex items-center">

    {{  $slot }}

    <div x-data="{ focused : false }">

        <span class="rounded-md shadow-sm">

            <input {{ $attributes }} @focus="{ focused = true }" @blur="{ focused = false }" class="sr-only" type="file">

            <label
                for="{{ $attributes['id'] }}"
                :class="{ 'outline-none ring-2 ring-offset-2 ring-indigo-500' : focused }"
                type="button"
                class="bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 ">
                Select File
            </label>

        </span>

    </div>

</div>
