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

    public $showEditModal = false;

    public LogEntry $editing;

    protected $rules = [ //need rules to bind to model
        'editing.activity' => 'required|max:120',
        'editing.minutes' => 'required|numeric|between:0,120'
    ];


    public function edit(LogEntry $entry) { //Livewire v2 will automatically perform the find if it senses the parameter is numeric

        // $entry = LogEntry::find($entryId);
        $this->editing = $entry;

        $this->showEditModal = true;
    }

    public function cancel() {

        $this->showEditModal = false;

        $this->editing->refresh();

    }


    public function save() {

        $this->validate();

        $this->editing->save();

        $this->showEditModal = false;

    }


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


    public function updated($propertyName) {

        $this->validateOnly($propertyName, [
                'editing.activity' => 'max:120',
                'editing.minutes' => 'numeric|between:0,120'
        ]);

    }


    // public function updatedEditingActivity() {
    //     $this->validate(['editing.activity' => 'max:60']);
    // }
    //
    // public function updatedEditingMinutes() {
    //     $this->validate(['editing.minutes' => 'numeric|between:0,120']);
    // }

    private function oppSortDirection() {
        return $this->sortDirection === 'asc' ? 'desc' : 'asc';
    }
}
