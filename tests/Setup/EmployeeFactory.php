<?php


namespace Tests\Setup;


use App\Models\Document;
use App\Models\Employee;
use App\Models\JobDescription;
use App\Models\JobStatus;

class EmployeeFactory
{

    protected int $jobStatuses = 0;

    protected int $jobDescriptions = 0;

    protected int $documents = 0;

    public function withJobStatus(int $n = 1): EmployeeFactory
    {
        $this->jobStatuses = $n;

        return $this;
    }

    public function withJobDescription(int $n = 1): EmployeeFactory
    {
        $this->jobDescriptions = $n;

        return $this;
    }

    public function withDocument(int $n = 1): EmployeeFactory
    {
        $this->documents = $n;

        return $this;
    }

    public function create(int $n = 1)
    {
        $employees = Employee::factory($n)->create();

        foreach ($employees as $employee) {

            for ($i = 0; $i < $this->jobStatuses; $i++) {
                $employee->addJobStatus(JobStatus::factory()->raw(['employee_id' => null]));
            }

            for ($i = 0; $i < $this->jobDescriptions; $i++) {
                $employee->addJobDescription(JobDescription::factory()->raw(['employee_id' => null]));
            }

            for ($i = 0; $i < $this->documents; $i++) {
                $employee->addDocument(Document::factory()->raw(['employee_id' => null]));
            }
        }

        return count($employees) === 1 ? $employees[0] : $employees;
    }
}
