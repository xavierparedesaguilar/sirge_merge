<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TempPassportFitoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TempPassportFitoTable Test Case
 */
class TempPassportFitoTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TempPassportFitoTable
     */
    public $TempPassportFito;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.temp_passport_fito'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TempPassportFito') ? [] : ['className' => 'App\Model\Table\TempPassportFitoTable'];
        $this->TempPassportFito = TableRegistry::get('TempPassportFito', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TempPassportFito);

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
