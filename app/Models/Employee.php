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

    public function status()
    {
        return $this->statusHistory()->whereNull('deleted_at')->first();
    }

    public function statusHistory()
    {
        return $this->belongsToMany(EmployeeStatus::class, 'employee_status_history')->withTimestamps();
    }

    public function addStatus($newStatusAttributes)
    {
        if ($status = $this->status()) {
            $this->statusHistory()->updateExistingPivot($status->id, ['deleted_at' => Carbon::now()]);
        }

        $newStatusAttributes['employee_id'] = $this->id;
        $newStatus = EmployeeStatus::create($newStatusAttributes);

        $this->statusHistory()->attach($newStatus->id);

        return $newStatus;
    }
}
