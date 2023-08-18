<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UbigeoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UbigeoTable Test Case
 */
class UbigeoTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UbigeoTable
     */
    public $Ubigeo;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ubigeo',
        'app.insitu',
        'app.passport',
        'app.specie',
        'app.resource',
        'app.module',
        'app.station',
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
        $config = TableRegistry::exists('Ubigeo') ? [] : ['className' => 'App\Model\Table\UbigeoTable'];
        $this->Ubigeo = TableRegistry::get('Ubigeo', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Ubigeo);

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
