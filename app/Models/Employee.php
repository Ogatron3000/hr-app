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
        return $this->jobStatusHistory()->first();
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

        return $this->jobStatusHistory()->create($newStatusAttributes);
    }

    public function jobDescription()
    {
        return $this->jobDescriptionHistory()->first();
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

        return $this->jobDescriptionHistory()->create($newDescriptionAttributes);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function addDocument($documentAttributes)
    {
        $documentAttributes['file'] = $documentAttributes['file']->store('documents');

        return $this->documents()->create($documentAttributes);
    }
}
