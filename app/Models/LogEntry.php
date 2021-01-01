<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class LogEntry extends Model
{
    use HasFactory;

    public $guarded = ['id'];

    public $casts = [
        'activity_date' => 'date'
    ];

    public $appends = ['date_for_editing']; //See: https://github.com/livewire/surge/issues/5

    public function getStatusColorAttribute() {

        return [
            'pending' => 'gray',
            'verified' => 'green',
        ][$this->status] ?? 'orange';

    }

    public function getDateWithDayOfWeekAttribute() {
        return $this->activity_date->format('D, M d, Y');
    }

    public function getDateForEditingAttribute() {
        return $this->activity_date->format('m/d/Y');
    }

    public function setDateForEditingAttribute($value) {
        $this->activity_date = Carbon::parse($value);
    }

}
