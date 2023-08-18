<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InputMicroTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InputMicroTable Test Case
 */
class InputMicroTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\InputMicroTable
     */
    public $InputMicro;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.input_micro',
        'app.bank_micro',
        'app.passport',
        'app.specie',
        'app.collection',
        'app.station',
        'app.ubigeo',
        'app.insitu',
        'app.country',
        'app.user',
        'app.role',
        'app.shopping_cart',
        'app.module',
        'app.resource',
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
        'app.bank_seed',
        'app.input_seed',
        'app.output_seed',
        'app.insitu_accesion',
        'app.passport_fito',
        'app.passport_micro',
        'app.passport_zoo',
        'app.shopping_cart_product',
        'app.long_term_conservation_micro',
        'app.output_micro',
        'app.short_term_conservation_micro'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('InputMicro') ? [] : ['className' => 'App\Model\Table\InputMicroTable'];
        $this->InputMicro = TableRegistry::get('InputMicro', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->InputMicro);

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
