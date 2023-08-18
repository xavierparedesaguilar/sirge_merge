<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TempDescriptoresTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TempDescriptoresTable Test Case
 */
class TempDescriptoresTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TempDescriptoresTable
     */
    public $TempDescriptores;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.temp_descriptores'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TempDescriptores') ? [] : ['className' => 'App\Model\Table\TempDescriptoresTable'];
        $this->TempDescriptores = TableRegistry::get('TempDescriptores', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TempDescriptores);

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
