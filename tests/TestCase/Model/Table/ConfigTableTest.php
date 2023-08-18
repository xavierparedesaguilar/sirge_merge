<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ConfigTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ConfigTable Test Case
 */
class ConfigTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ConfigTable
     */
    public $ConfigTable;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Config') ? [] : ['className' => 'App\Model\Table\ConfigTable'];
        $this->ConfigTable = TableRegistry::get('Config', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ConfigTable);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
