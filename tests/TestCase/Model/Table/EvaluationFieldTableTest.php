<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EvaluationFieldTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EvaluationFieldTable Test Case
 */
class EvaluationFieldTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EvaluationFieldTable
     */
    public $EvaluationField;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.evaluation_field',
        'app.bank_field',
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
        'app.input_field',
        'app.output_field'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('EvaluationField') ? [] : ['className' => 'App\Model\Table\EvaluationFieldTable'];
        $this->EvaluationField = TableRegistry::get('EvaluationField', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EvaluationField);

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
