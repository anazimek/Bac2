<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ThreadsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ThreadsTable Test Case
 */
class ThreadsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ThreadsTable
     */
    public $Threads;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.threads',
        'app.users',
        'app.roles',
        'app.permissions',
        'app.connectors',
        'app.permissions_roles',
        'app.forums',
        'app.categories',
        'app.posts',
        'app.files',
        'app.posts_files'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Threads') ? [] : ['className' => 'App\Model\Table\ThreadsTable'];
        $this->Threads = TableRegistry::get('Threads', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Threads);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
