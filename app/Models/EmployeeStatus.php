<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeStatus extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function contractType()
    {
        return $this->belongsTo(ContractType::class);
    }

    public function activeStatus()
    {
        return $this->belongsTo(ActiveStatus::class);
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
}
