<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StatsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StatsTable Test Case
 */
class StatsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\StatsTable
     */
    public $Stats;

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
        'app.skills_tree',
        'app.skills_stats',
        'app.users',
        'app.users_stats'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Stats') ? [] : ['className' => 'App\Model\Table\StatsTable'];
        $this->Stats = TableRegistry::get('Stats', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Stats);

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
}
