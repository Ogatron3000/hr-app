<?php

namespace Tests\Feature;

use App\Models\Document;
use Facades\Tests\Setup\EmployeeFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ArchiveTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_see_all_documents_in_archive()
    {
        $this->withoutExceptionHandling();
        $this->signIn();

        $employee = EmployeeFactory::withJobDescription()->withDocument(3)->create();

        $documents = $employee->documents;

        $this->get(route('archive'))
            ->assertOk()
            ->assertSee($documents[0]->name)
            ->assertSee($documents[1]->name)
            ->assertSee($documents[2]->name);
    }

}
