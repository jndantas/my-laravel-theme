<?php namespace Tests\Repositories;

use App\Models\Entry;
use App\Repositories\EntryRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class EntryRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var EntryRepository
     */
    protected $entryRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->entryRepo = \App::make(EntryRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_entry()
    {
        $entry = Entry::factory()->make()->toArray();

        $createdEntry = $this->entryRepo->create($entry);

        $createdEntry = $createdEntry->toArray();
        $this->assertArrayHasKey('id', $createdEntry);
        $this->assertNotNull($createdEntry['id'], 'Created Entry must have id specified');
        $this->assertNotNull(Entry::find($createdEntry['id']), 'Entry with given id must be in DB');
        $this->assertModelData($entry, $createdEntry);
    }

    /**
     * @test read
     */
    public function test_read_entry()
    {
        $entry = Entry::factory()->create();

        $dbEntry = $this->entryRepo->find($entry->id);

        $dbEntry = $dbEntry->toArray();
        $this->assertModelData($entry->toArray(), $dbEntry);
    }

    /**
     * @test update
     */
    public function test_update_entry()
    {
        $entry = Entry::factory()->create();
        $fakeEntry = Entry::factory()->make()->toArray();

        $updatedEntry = $this->entryRepo->update($fakeEntry, $entry->id);

        $this->assertModelData($fakeEntry, $updatedEntry->toArray());
        $dbEntry = $this->entryRepo->find($entry->id);
        $this->assertModelData($fakeEntry, $dbEntry->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_entry()
    {
        $entry = Entry::factory()->create();

        $resp = $this->entryRepo->delete($entry->id);

        $this->assertTrue($resp);
        $this->assertNull(Entry::find($entry->id), 'Entry should not exist in DB');
    }
}
