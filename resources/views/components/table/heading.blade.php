@props([
    'sortable' => null,
    'direction' => 'asc'
])

<th {{ $attributes->merge(['class' => 'px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider'])->only('class') }} ">

    @if(!$sortable)
        <span>
            {{ $slot }}
        </span>
    @else
        <button class="flex items-center space-x-1 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider group focus:outline-none focus:underline">
            <span class="text-gray-900">
                {{ $slot }}
            </span>
            <span class="h-5 w-5 text-gray-400">
                @if($direction == 'asc')
                    <x-icon.chevron-up />
                @else
                    <x-icon.chevron-down />
                @endif
            </span>
        </button>
    @endif
</th>
