<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Entry;

class EntryApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_entry()
    {
        $entry = Entry::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/entries', $entry
        );

        $this->assertApiResponse($entry);
    }

    /**
     * @test
     */
    public function test_read_entry()
    {
        $entry = Entry::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/entries/'.$entry->id
        );

        $this->assertApiResponse($entry->toArray());
    }

    /**
     * @test
     */
    public function test_update_entry()
    {
        $entry = Entry::factory()->create();
        $editedEntry = Entry::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/entries/'.$entry->id,
            $editedEntry
        );

        $this->assertApiResponse($editedEntry);
    }

    /**
     * @test
     */
    public function test_delete_entry()
    {
        $entry = Entry::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/entries/'.$entry->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/entries/'.$entry->id
        );

        $this->response->assertStatus(404);
    }
}
