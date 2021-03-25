<?php


namespace Tests\Setup;


use App\Models\Employee;
use App\Models\JobDescription;
use App\Models\JobStatus;

class EmployeeFactory
{
    protected array $jobStatusAttributes;
    protected array $jobDescriptionAttributes;
    protected Employee $employee;

    public function withJobStatus(): EmployeeFactory
    {
        $this->jobStatusAttributes = JobStatus::factory()->raw(['employee_id' => '']);

        return $this;
    }

    public function withJobDescription(): EmployeeFactory
    {
        $this->jobDescriptionAttributes = JobDescription::factory()->raw(['employee_id' => '']);

        return $this;
    }

    public function create(): Employee
    {
        $employee = Employee::factory()->create();
        $employee->addJobStatus($this->jobStatusAttributes);
        $employee->addJobDescription($this->jobDescriptionAttributes);

        return $employee;
    }
}
