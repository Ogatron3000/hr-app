<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function path()
    {
        return '/employees/' . $this->id;
    }

    public function jobStatus()
    {
        return $this->jobStatusHistory()->whereNull('deleted_at')->first();
    }

    public function jobStatusHistory()
    {
        return $this->hasMany(JobStatus::class);
    }

    public function addJobStatus($newStatusAttributes)
    {
        if ($status = $this->jobStatus()) {
            $status->delete();
        }

        $newStatusAttributes['employee_id'] = $this->id;

        return JobStatus::create($newStatusAttributes);
    }

    public function jobDescription()
    {
        return $this->jobDescriptionHistory()->whereNull('deleted_at')->first();
    }

    public function jobDescriptionHistory()
    {
        return $this->hasMany(JobDescription::class);
    }

    public function addJobDescription($newDescriptionAttributes)
    {
        if ($desc = $this->jobDescription()) {
            $desc->delete();
        }

        $newDescriptionAttributes['employee_id'] = $this->id;

        return JobDescription::create($newDescriptionAttributes);
    }
}
