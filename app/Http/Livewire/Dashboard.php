<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\LogEntry;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.dashboard', [
            'entries' => LogEntry::all()
        ]);
    }
}
