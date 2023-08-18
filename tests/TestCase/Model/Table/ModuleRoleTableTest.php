<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ModuleRoleTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ModuleRoleTable Test Case
 */
class ModuleRoleTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ModuleRoleTable
     */
    public $ModuleRole;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.module_role',
        'app.module',
        'app.role'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ModuleRole') ? [] : ['className' => 'App\Model\Table\ModuleRoleTable'];
        $this->ModuleRole = TableRegistry::get('ModuleRole', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ModuleRole);

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
