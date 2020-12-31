<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogEntry extends Model
{
    use HasFactory;

    public $guarded = ['id'];

    public $dates = ['activity_date'];

    public function getStatusColorAttribute() {

        return [
            'pending' => 'gray',
            'verified' => 'green',
        ][$this->status] ?? 'orange';

    }

    public function getDateWithDayOfWeekAttribute() {
        return $this->activity_date->format('D, M d, Y');
    }

}
