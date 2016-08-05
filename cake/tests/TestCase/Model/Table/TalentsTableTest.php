<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TalentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TalentsTable Test Case
 */
class TalentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TalentsTable
     */
    public $Talents;

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
        'app.skills_tree',
        'app.stats',
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
        $config = TableRegistry::exists('Talents') ? [] : ['className' => 'App\Model\Table\TalentsTable'];
        $this->Talents = TableRegistry::get('Talents', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Talents);

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
