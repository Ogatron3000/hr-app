<?php

namespace Tests\Feature;

use App\Models\Department;
use App\Models\Document;
use App\Models\Employee;
use Carbon\Carbon;
use Facades\Tests\Setup\EmployeeFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_view_dashboard()
    {
        $this->signIn();

        $employees = EmployeeFactory::withJobDescription(3)->withDocument(2)->create(3);

        // unknown bug was causing this test to fail from time to time when using faker names
        $expiresSoon = Document::factory()->create(['name'        => 'should be here',
                                                    'expiry'      => Carbon::now()->addMonths(1)->toDateString(),
                                                    'employee_id' => $employees[0]->id,
        ]);
        $expiresLater = Document::factory()->create(['name'        => 'should not be here',
                                                     'expiry'      => Carbon::now()->addMonths(4)->toDateString(),
                                                     'employee_id' => $employees[0]->id,
        ]);

        $this->get(route('dashboard'))
            ->assertOk()
            ->assertSee(Department::count())
            ->assertSee(Document::count())
            ->assertSee(Employee::count())
            ->assertSee($expiresSoon->name)
            ->assertDontSee($expiresLater->name);
    }

}
