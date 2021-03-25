<?php


namespace Tests\Setup;


use App\Models\Document;
use App\Models\Employee;
use App\Models\JobDescription;
use App\Models\JobStatus;
use Illuminate\Http\UploadedFile;

class EmployeeFactory
{

    protected Employee $employee;

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

    public function create(): Employee
    {
        $employee = Employee::factory()->create();

        JobStatus::factory($this->jobStatuses)->create(['employee_id' => $employee->id]);

        JobDescription::factory($this->jobDescriptions)->create(['employee_id' => $employee->id]);

        for ($i = 0; $i < $this->documents; $i++) {
            $employee->addDocument(Document::factory()->raw(['employee_id' => null]));
        }

        return $employee;
    }
}
