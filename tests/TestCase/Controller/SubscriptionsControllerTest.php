<?php
namespace App\Test\TestCase\Controller;

use App\Controller\SubscriptionsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\SubscriptionsController Test Case
 */
class SubscriptionsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.subscriptions',
        'app.users',
        'app.roles',
        'app.permissions',
        'app.connectors',
        'app.permissions_roles',
        'app.diaries',
        'app.projects',
        'app.tasks',
        'app.states',
        'app.from_to_tasks',
        'app.tasks_users',
        'app.lastuserthread',
        'app.projects_users',
        'app.entries',
        'app.threads',
        'app.forums',
        'app.categories',
        'app.lasttopicuser',
        'app.files',
        'app.posts',
        'app.posts_files'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
