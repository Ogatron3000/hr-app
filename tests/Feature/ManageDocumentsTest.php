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

    public function test_user_can_create_documents()
    {
        $this->withoutExceptionHandling();
        $this->signIn();

        $employee = EmployeeFactory::withJobStatus()->withJobDescription()->create();

        $document = Document::factory()->raw();

        $this->get($employee->path() . '/documents/create')->assertOk();

        $this->post($employee->path() . '/documents', $document);

        Storage::disk('local')->assertExists('documents/' . $document['file']->hashName());
    }
}
