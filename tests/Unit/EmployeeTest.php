<?php

namespace Tests\Unit;

use App\Models\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EmployeeTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_has_path(): void
    {
        $employee = Employee::factory()->create();

        $this->assertEquals('employees/' . $employee->id, $employee->path());
    }
}
