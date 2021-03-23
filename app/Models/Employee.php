<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function path()
    {
        return '/employees/' . $this->id;
    }

    public function status()
    {
        return $this->statusHistory()->whereNull('deleted_at')->first();
    }

    public function statusHistory()
    {
        return $this->belongsToMany(EmployeeStatus::class, 'employee_status_history')->withTimestamps();
    }

    public function addStatus($newStatusId)
    {
        if ($status = $this->status()) {
            $this->statusHistory()->updateExistingPivot($status->id, ['deleted_at' => Carbon::now()]);
        }

        $this->statusHistory()->attach($newStatusId);
    }
}
