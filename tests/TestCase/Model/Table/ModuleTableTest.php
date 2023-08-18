<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ModuleTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ModuleTable Test Case
 */
class ModuleTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ModuleTable
     */
    public $Module;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.module',
        'app.resource',
        'app.passport',
        'app.specie',
        'app.station',
        'app.ubigeo',
        'app.insitu',
        'app.country',
        'app.user',
        'app.role',
        'app.shopping_cart',
        'app.module_user',
        'app.collection',
        'app.bank_dna',
        'app.bank_field',
        'app.bank_invitro',
        'app.bank_micro',
        'app.bank_seed',
        'app.descriptor_value',
        'app.insitu_accesion',
        'app.passport_fito',
        'app.passport_micro',
        'app.passport_zoo',
        'app.shopping_cart_product',
        'app.log',
        'app.module_role'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Module') ? [] : ['className' => 'App\Model\Table\ModuleTable'];
        $this->Module = TableRegistry::get('Module', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Module);

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
