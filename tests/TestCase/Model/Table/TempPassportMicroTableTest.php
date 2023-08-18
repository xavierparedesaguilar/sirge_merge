<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TempPassportMicroTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TempPassportMicroTable Test Case
 */
class TempPassportMicroTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TempPassportMicroTable
     */
    public $TempPassportMicro;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.temp_passport_micro'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TempPassportMicro') ? [] : ['className' => 'App\Model\Table\TempPassportMicroTable'];
        $this->TempPassportMicro = TableRegistry::get('TempPassportMicro', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TempPassportMicro);

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
