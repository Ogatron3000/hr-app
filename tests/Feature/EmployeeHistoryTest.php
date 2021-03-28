<?php

namespace Tests\Feature;

use App\Models\JobStatus;
use Facades\Tests\Setup\EmployeeFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmployeeHistoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_view_employee_history()
    {
        $this->signIn();

        $employee = EmployeeFactory::withJobStatus(3)->withJobDescription(5)->create();

        $jobStatusHistory = $employee->jobStatusHistory;
        $jobDescriptionHistory = $employee->jobDescriptionHistory;

        $this->get($employee->path() . '/history')
            ->assertOk()
            ->assertSee($jobStatusHistory[0]->contractType->name)
            ->assertSee($jobStatusHistory[1]->contractType->name)
            ->assertSee($jobStatusHistory[2]->contractType->name)
            ->assertSee($jobDescriptionHistory[0]->description)
            ->assertSee($jobDescriptionHistory[1]->description)
            ->assertSee($jobDescriptionHistory[2]->description);
    }
}
