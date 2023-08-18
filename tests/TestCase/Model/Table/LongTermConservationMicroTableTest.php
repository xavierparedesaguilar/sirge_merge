<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LongTermConservationMicroTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LongTermConservationMicroTable Test Case
 */
class LongTermConservationMicroTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LongTermConservationMicroTable
     */
    public $LongTermConservationMicro;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.long_term_conservation_micro',
        'app.bank_micro',
        'app.passport',
        'app.specie',
        'app.collection',
        'app.station',
        'app.ubigeo',
        'app.insitu',
        'app.user',
        'app.role',
        'app.country',
        'app.log',
        'app.module',
        'app.resource',
        'app.module_role',
        'app.module_user',
        'app.temp_caracterizacion',
        'app.temp_descriptores',
        'app.temp_passport_fito',
        'app.temp_passport_micro',
        'app.temp_passport_zoo',
        'app.insitu_accesion',
        'app.insitu_farmer_activity',
        'app.insitu_plage',
        'app.insitu_threat',
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
        'app.characterization_detail',
        'app.orders_detail',
        'app.orders',
        'app.clients',
        'app.client_users',
        'app.payments',
        'app.passport_fito',
        'app.passport_micro',
        'app.passport_zoo',
        'app.shopping_cart_product',
        'app.input_micro',
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
        $config = TableRegistry::exists('LongTermConservationMicro') ? [] : ['className' => 'App\Model\Table\LongTermConservationMicroTable'];
        $this->LongTermConservationMicro = TableRegistry::get('LongTermConservationMicro', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->LongTermConservationMicro);

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
