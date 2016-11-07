<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FilesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FilesTable Test Case
 */
class FilesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FilesTable
     */
    public $Files;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.files',
        'app.posts',
        'app.users',
        'app.roles',
        'app.permissions',
        'app.connectors',
        'app.permissions_roles',
        'app.diaries',
        'app.projects',
        'app.from_to_tasks',
        'app.tasks',
        'app.states',
        'app.tasks_users',
        'app.threads',
        'app.forums',
        'app.categories',
        'app.lasttopicuser',
        'app.posts_files',
        'app.subscriptions',
        'app.lastuserthread',
        'app.portfolios',
        'app.projects_users',
        'app.portfolios_users',
        'app.threads_files',
        'app.entries'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Files') ? [] : ['className' => 'App\Model\Table\FilesTable'];
        $this->Files = TableRegistry::get('Files', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Files);

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
