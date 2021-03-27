<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    public function jobDescriptions()
    {
        return $this->hasMany(JobDescription::class);
    }
}
