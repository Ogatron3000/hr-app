<?php

namespace Tests\Feature;

use App\Models\Document;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ArchiveTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_see_all_documents_in_archive()
    {
        $this->signIn();

        $documents = Document::factory(3)->create();

        $this->get(route('archive'))
            ->assertOk()
            ->assertSee($documents[0]->name)
            ->assertSee($documents[1]->name)
            ->assertSee($documents[2]->name);
    }

}
