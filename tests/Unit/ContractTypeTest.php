<?php

namespace Tests\Unit;

use App\Models\ContractType;
use App\Models\JobStatus;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContractTypeTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_has_many_employees(): void
    {
        $contractType = ContractType::factory()->create();

        JobStatus::factory()->create(['contract_type_id' => $contractType->id]);

        $this->assertInstanceOf(JobStatus::class, $contractType->jobStatuses[0]);
    }
}
