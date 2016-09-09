<?php
namespace App\Test\TestCase\Controller;

use App\Controller\TalentsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\TalentsController Test Case
 */
class TalentsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.talents',
        'app.skills',
        'app.links',
        'app.ranks',
        'app.users_skills',
        'app.users',
        'app.stats',
        'app.skills_stats',
        'app.users_stats',
        'app.skills_tree'
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
