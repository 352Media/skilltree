<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SkillsTreeTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SkillsTreeTable Test Case
 */
class SkillsTreeTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SkillsTreeTable
     */
    public $SkillsTree;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.skills_tree',
        'app.skills',
        'app.talents',
        'app.links',
        'app.ranks',
        'app.users_skills',
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
        $config = TableRegistry::exists('SkillsTree') ? [] : ['className' => 'App\Model\Table\SkillsTreeTable'];
        $this->SkillsTree = TableRegistry::get('SkillsTree', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SkillsTree);

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
