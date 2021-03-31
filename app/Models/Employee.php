<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function avatarUrl($path)
    {
        return str_contains($path, 'pravatar') ? $path : Storage::url($path);
    }

    public function path()
    {
        return '/employees/' . $this->id;
    }

    public function getJobStatusAttribute()
    {
        return $this->jobStatuses->first();
    }

    public function jobStatuses()
    {
        return $this->hasMany(JobStatus::class);
    }

    public function jobStatusHistory()
    {
        return $this->jobStatuses()->withTrashed();
    }

    public function addJobStatus($newStatusAttributes)
    {
        if ($status = $this->fresh()->jobStatus) {

            if (count(array_intersect($status->toArray(), $newStatusAttributes)) === count($newStatusAttributes)) {
                return $status;
            }

            $status->delete();
        }

        return $this->jobStatuses()->create($newStatusAttributes);
    }

    public function getJobDescriptionAttribute()
    {
        return $this->jobDescriptions->first();
    }

    public function jobDescriptions()
    {
        return $this->hasMany(JobDescription::class);
    }

    public function jobDescriptionHistory()
    {
        return $this->jobDescriptions()->withTrashed();
    }

    public function addJobDescription($newDescriptionAttributes)
    {
        if ($desc = $this->fresh()->jobDescription) {

            if (count(array_intersect($desc->toArray(), $newDescriptionAttributes)) === count($newDescriptionAttributes)) {
                return $desc;
            }

            $desc->delete();
        }

        return $this->jobDescriptions()->create($newDescriptionAttributes);
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
