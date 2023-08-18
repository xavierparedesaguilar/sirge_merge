<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DescriptorValueTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DescriptorValueTable Test Case
 */
class DescriptorValueTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DescriptorValueTable
     */
    public $DescriptorValue;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.descriptor_value',
        'app.passport',
        'app.specie',
        'app.collection',
        'app.stations',
        'app.descriptor',
        'app.descriptor_state',
        'app.resource',
        'app.module',
        'app.log',
        'app.user',
        'app.role',
        'app.country',
        'app.station',
        'app.ubigeo',
        'app.insitu',
        'app.shopping_cart',
        'app.module_user',
        'app.module_role',
        'app.bank_dna',
        'app.bank_field',
        'app.bank_invitro',
        'app.bank_micro',
        'app.bank_seed',
        'app.insitu_accesion',
        'app.passport_fito',
        'app.passport_micro',
        'app.passport_zoo',
        'app.shopping_cart_product'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('DescriptorValue') ? [] : ['className' => 'App\Model\Table\DescriptorValueTable'];
        $this->DescriptorValue = TableRegistry::get('DescriptorValue', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DescriptorValue);

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
