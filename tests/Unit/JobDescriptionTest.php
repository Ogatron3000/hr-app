<?php

namespace Tests\Unit;

use App\Models\Department;
use App\Models\JobDescription;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class JobDescriptionTest extends TestCase
{
    use RefreshDatabase;

    public function test_belongs_to_a_department()
    {
        $department = Department::factory()->create();
        $description = JobDescription::factory()->create(['department_id' => $department->id]);

        $this->assertInstanceOf(Department::class, $description->department);
    }
}
