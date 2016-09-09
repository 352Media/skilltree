<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RanksTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RanksTable Test Case
 */
class RanksTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RanksTable
     */
    public $Ranks;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ranks',
        'app.skills',
        'app.talents',
        'app.links',
        'app.skills_tree',
        'app.stats',
        'app.skills_stats',
        'app.users',
        'app.users_skills',
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
        $config = TableRegistry::exists('Ranks') ? [] : ['className' => 'App\Model\Table\RanksTable'];
        $this->Ranks = TableRegistry::get('Ranks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Ranks);

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
