<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Livewire\WithPagination;

use App\Models\LogEntry;

class Dashboard extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.dashboard', [
            'entries' => LogEntry::paginate(10)
        ]);
    }
}
