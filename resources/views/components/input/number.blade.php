@props([
    'leadingAddOn' => false,
    'trailingAddOn' => false,
])

<div class="flex rounded-md shadow-sm">

    @if($leadingAddOn)
        <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
            {{ $leadingAddOn }}
        </span>
    @endif

    <input {{$attributes}}
        type = "number"
        class = "{{ $leadingAddOn ? 'rounded-r-md' : ''}} {{ $trailingAddOn ? 'rounded-l-md' : ''}} {{ !$leadingAddOn && !$trailingAddOn ? 'rounded-md' : ''}} focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full sm:text-sm border-gray-300"
    >

    @if($trailingAddOn)
    <span class="inline-flex items-center px-3 rounded-r-md border border-l-0 border-gray-300 bg-gray-50 text-gray-500 text-sm">
        {{ $trailingAddOn }}
    </span>
    @endif

</div>
