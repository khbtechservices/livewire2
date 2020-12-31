<div class="space-y-6">

    <div>
        <h1 class="text-2xl font-semibold text-gray-900">Dashboard</h1>
    </div>

    <div>

        <x-table>

            <x-slot name="head">
                <x-table.heading>Date</x-table.heading>
                <x-table.heading>Activity</x-table.heading>
                <x-table.heading>Minutes</x-table.heading>
                <x-table.heading>Status</x-table.heading>
            </x-slot>

            <x-slot name="body">

                @foreach($entries as $entry)

                <x-table.row wire:key="row-{{ $entry->id }}">
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

                @endforeach

            </x-slot>

        </x-table>

    </div>

    <div>

        {{ $entries->links() }}

    </div>

</div>
