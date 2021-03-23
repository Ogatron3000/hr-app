<?php

namespace Tests\Unit;

use App\Models\Bank;
use App\Models\EmployeeStatus;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EmployeeStatusTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_belongs_to_a_bank()
    {
        $bank = Bank::factory()->create();
        $status = EmployeeStatus::factory()->create(['bank_id' => $bank->id]);

        $this->assertInstanceOf(Bank::class, $status->bank);
    }

}
