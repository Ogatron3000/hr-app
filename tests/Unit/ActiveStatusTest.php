<?php

namespace Tests\Unit;

use App\Models\ActiveStatus;
use App\Models\ContractType;
use App\Models\JobStatus;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ActiveStatusTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_has_many_employees(): void
    {
        $activeStatus = ActiveStatus::factory()->create();

        JobStatus::factory()->create(['active_status_id' => $activeStatus->id]);

        $this->assertInstanceOf(JobStatus::class, $activeStatus->jobStatuses[0]);
    }
}
