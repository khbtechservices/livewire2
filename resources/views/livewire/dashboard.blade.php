<div class="space-y-6">

    <div>
        <h1 class="text-2xl font-semibold text-gray-900">Dashboard</h1>
    </div>

    <div class="">
        <div class="w-1/4">
            <x-input.text wire:model="search" placeholder="Search..."/>
        </div>
    </div>

    <div>

        <x-table>

            <x-slot name="head">
                <x-table.heading sortable wire:click="sortBy('activity_date')" :direction="$currentSort['activity_date'] ?? null">Date</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('activity')" :direction="$currentSort['activity'] ?? null">Activity</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('minutes')" :direction="$currentSort['minutes'] ?? null">Minutes</x-table.heading>
                <x-table.heading sortable wire:click="sortBy('status')" :direction="$currentSort['status'] ?? null">Status</x-table.heading>
            </x-slot>

            <x-slot name="body">

                @forelse($entries as $entry)

                <x-table.row wire:loading.class.delay="opacity-50">
                    <x-table.cell>{{ $entry->date_with_day_of_week }}</x-table.cell>
                    <x-table.cell>
                        {{ Str::limit($entry->activity, 60) }}
                    </x-table.cell>
                    <x-table.cell>{{ $entry->minutes }}</x-table.cell>
                    <x-table.cell>
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-{{$entry->status_color}}-200 text-{{$entry->status_color}}-800 ">
                            {{ $entry->status }}
                        </span>
                    </x-table.cell>
                </x-table.row>
                @empty
                    <x-table.row wire:loading.class.delay="opacity-50">
                        <x-table.cell colspan="4">
                            <div class="flex justify-center items-center space-x-3">
                                <span class="h-6 w-6 text-gray-400">
                                    <x-icon.thumbs-down/>
                                </span>
                                <span class="text-gray-500 py-6 text-xl">
                                    No Results
                                </span>
                            </div>
                        </x-table.cell>
                    </x-table.row>
                @endforelse

            </x-slot>

        </x-table>


    </div>

    <div>

        {{ $entries->links() }}

    </div>

</div>
