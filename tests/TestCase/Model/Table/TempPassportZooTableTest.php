<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TempPassportZooTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TempPassportZooTable Test Case
 */
class TempPassportZooTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TempPassportZooTable
     */
    public $TempPassportZoo;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.temp_passport_zoo'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TempPassportZoo') ? [] : ['className' => 'App\Model\Table\TempPassportZooTable'];
        $this->TempPassportZoo = TableRegistry::get('TempPassportZoo', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TempPassportZoo);

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
