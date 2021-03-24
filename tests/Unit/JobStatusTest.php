<?php

namespace Tests\Unit;

use App\Models\ActiveStatus;
use App\Models\Bank;
use App\Models\ContractType;
use App\Models\JobStatus;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class JobStatusTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_belongs_to_a_contract_type()
    {
        $contractType = ContractType::factory()->create();
        $status = JobStatus::factory()->create(['contract_type_id' => $contractType->id]);

        $this->assertInstanceOf(ContractType::class, $status->contractType);
    }

    public function test_it_belongs_to_an_active_status()
    {
        $activeStatus = ActiveStatus::factory()->create();
        $status = JobStatus::factory()->create(['active_status_id' => $activeStatus->id]);

        $this->assertInstanceOf(ActiveStatus::class, $status->activeStatus);
    }

    public function test_it_belongs_to_a_bank()
    {
        $bank = Bank::factory()->create();
        $status = JobStatus::factory()->create(['bank_id' => $bank->id]);

        $this->assertInstanceOf(Bank::class, $status->bank);
    }

}
