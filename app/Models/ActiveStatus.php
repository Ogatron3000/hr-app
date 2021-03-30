<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActiveStatus extends Model
{
    use HasFactory;

    public function jobStatuses()
    {
        return $this->hasMany(JobStatus::class);
    }
}
