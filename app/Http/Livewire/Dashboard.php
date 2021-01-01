<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Livewire\WithPagination;

use App\Models\LogEntry;

class Dashboard extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        return view('livewire.dashboard', [
            'entries' => LogEntry::search('activity', $this->search)->paginate(10)
            // 'entries' => LogEntry::paginate(10)
        ]);
    }
}
