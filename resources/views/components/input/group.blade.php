@props([
    'label',
    'for',
    'error' => false,
    'helpText' => false
])

<label for="{{ $for }}" class="block text-sm font-medium text-gray-700">
    {{ $label }}
</label>

<div class="mt-1">
    {{ $slot }}

    @if('error')
        <div class="text-red-600 text-sm mt-1">{{ $error }}</div>
    @endif

    @if ($helpText)
        <p class="mt-2 text-sm text-gray-500">{{ $helpText }}</p>
    @endif

</div>
