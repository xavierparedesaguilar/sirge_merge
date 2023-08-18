<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InsituTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InsituTable Test Case
 */
class InsituTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\InsituTable
     */
    public $Insitu;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.insitu',
        'app.user',
        'app.role',
        'app.country',
        'app.passport',
        'app.specie',
        'app.collection',
        'app.station',
        'app.ubigeo',
        'app.resource',
        'app.module',
        'app.log',
        'app.module_role',
        'app.module_user',
        'app.descriptor',
        'app.descriptor_state',
        'app.descriptor_value',
        'app.bank_dna',
        'app.extraction_dna',
        'app.input_dna',
        'app.output_dna',
        'app.test_integrity_dna',
        'app.test_purity_dna',
        'app.bank_field',
        'app.evaluation_field',
        'app.input_field',
        'app.output_field',
        'app.bank_invitro',
        'app.conservation_invitro',
        'app.input_invitro',
        'app.output_invitro',
        'app.propagation_invitro',
        'app.bank_micro',
        'app.input_micro',
        'app.long_term_conservation_micro',
        'app.output_micro',
        'app.short_term_conservation_micro',
        'app.bank_seed',
        'app.input_seed',
        'app.output_seed',
        'app.insitu_accesion',
        'app.passport_fito',
        'app.passport_micro',
        'app.passport_zoo',
        'app.shopping_cart_product',
        'app.shopping_cart',
        'app.insitu_farmer_activity',
        'app.insitu_plage',
        'app.insitu_threat'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Insitu') ? [] : ['className' => 'App\Model\Table\InsituTable'];
        $this->Insitu = TableRegistry::get('Insitu', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Insitu);

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
