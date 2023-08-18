<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CountryTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CountryTable Test Case
 */
class CountryTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CountryTable
     */
    public $Country;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.country',
        'app.passport',
        'app.station',
        'app.user',
        'app.role',
        'app.insitu',
        'app.shopping_cart',
        'app.module',
        'app.module_user'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Country') ? [] : ['className' => 'App\Model\Table\CountryTable'];
        $this->Country = TableRegistry::get('Country', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Country);

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
