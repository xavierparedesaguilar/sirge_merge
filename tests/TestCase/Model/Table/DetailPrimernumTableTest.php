<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DetailPrimernumTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DetailPrimernumTable Test Case
 */
class DetailPrimernumTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DetailPrimernumTable
     */
    public $DetailPrimernum;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.detail_primernum',
        'app.caract_genotypic',
        'app.resource',
        'app.module',
        'app.log',
        'app.user',
        'app.role',
        'app.country',
        'app.passport',
        'app.specie',
        'app.collection',
        'app.station',
        'app.ubigeo',
        'app.insitu',
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
        'app.module_user',
        'app.module_role',
        'app.detail_adaptrnum'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('DetailPrimernum') ? [] : ['className' => 'App\Model\Table\DetailPrimernumTable'];
        $this->DetailPrimernum = TableRegistry::get('DetailPrimernum', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DetailPrimernum);

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
