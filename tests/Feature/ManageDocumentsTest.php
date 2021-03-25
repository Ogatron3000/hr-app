<?php

namespace Tests\Feature;

use App\Models\Document;
use Facades\Tests\Setup\EmployeeFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ManageDocumentsTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_see_all_employee_documents()
    {
        $this->signIn();

        $employee = EmployeeFactory::withJobStatus()->withJobDescription()->withDocument()->create();

        $this->get($employee->path() . '/documents')
            ->assertOk()
            ->assertSee($employee->documents[0]->name)
            ->assertSee($employee->documents[0]->date)
            ->assertSee($employee->documents[0]->expiry);
    }

    public function test_user_can_download_employee_document()
    {
        $this->signIn();

        $employee = EmployeeFactory::withJobStatus()->withJobDescription()->withDocument()->create();

        $fileName = explode('/', $employee->documents[0]->file)[1];

        $response = $this->get($employee->path() . '/documents/' . $employee->documents[0]->id)->assertOk();
        $this->assertEquals("attachment; filename={$fileName}", $response->headers->get('content-disposition'));
    }

    public function test_user_can_create_employee_documents()
    {
        $this->signIn();

        $employee = EmployeeFactory::withJobStatus()->withJobDescription()->create();

        $document = Document::factory()->raw();

        $this->get($employee->path() . '/documents/create')->assertOk();

        $this->post($employee->path() . '/documents', $document);

        Storage::disk('local')->assertExists('documents/' . $document['file']->hashName());
    }

    public function test_user_can_delete_employee_documents()
    {
        $this->signIn();

        $employee = EmployeeFactory::withJobStatus()->withJobDescription()->withDocument()->create();

        $document = $employee->documents[0];

        $this->followingRedirects()
            ->delete($employee->path() . '/documents/' . $document->id)
            ->assertDontSee($document->name)
            ->assertDontSee($document->date)
            ->assertDontSee($document->expiry);

        Storage::disk('local')->assertMissing($document->file);
    }
}
