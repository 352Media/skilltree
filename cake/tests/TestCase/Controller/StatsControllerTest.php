<?php
namespace App\Test\TestCase\Controller;

use App\Controller\StatsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\StatsController Test Case
 */
class StatsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.stats',
        'app.skills',
        'app.talents',
        'app.links',
        'app.ranks',
        'app.users_skills',
        'app.users',
        'app.users_stats',
        'app.skills_tree',
        'app.skills_stats'
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
