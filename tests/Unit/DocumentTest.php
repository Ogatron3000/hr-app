<?php

namespace Tests\Unit;

use App\Models\Document;
use App\Models\Employee;
use Facades\Tests\Setup\EmployeeFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DocumentTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_belongs_to_employee()
    {
        $employee = EmployeeFactory::withDocument()->create();

        $this->assertInstanceOf(Employee::class, $employee->documents[0]->employee);
    }

    public function test_it_has_path()
    {
        $employee = EmployeeFactory::withDocument()->create();

        $this->assertEquals('/employees/' . $employee->id, $employee->path());
    }
}
