<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Livewire\WithPagination;

use App\Models\LogEntry;

class Dashboard extends Component
{
    use WithPagination;

    public $search = '';

    public $sortField = 'activity_date';

    public $sortDirection = 'asc';

    public $currentSort = [];

    public function sortBy($field) {

        $this->sortDirection = ($field == $this->sortField) ? $this->oppSortDirection() : 'asc';

        $this->sortField = $field;

        $this->currentSort = [$field => $this->sortDirection];
    }

    public function sortDirection($field) {

        return ($field == $this->sortField) ? $this->sortDirection : 'asc';

    }


    public function render()
    {
        return view('livewire.dashboard', [
            'entries' => LogEntry::search('activity', $this->search)
                            ->orderBy($this->sortField, $this->sortDirection)
                            ->paginate(10)
            // 'entries' => LogEntry::paginate(10)
        ]);
    }

    private function oppSortDirection() {
        return $this->sortDirection === 'asc' ? 'desc' : 'asc';
    }
}
