<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CaractPhysicalChemistryTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CaractPhysicalChemistryTable Test Case
 */
class CaractPhysicalChemistryTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CaractPhysicalChemistryTable
     */
    public $CaractPhysicalChemistry;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.caract_physical_chemistry'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CaractPhysicalChemistry') ? [] : ['className' => 'App\Model\Table\CaractPhysicalChemistryTable'];
        $this->CaractPhysicalChemistry = TableRegistry::get('CaractPhysicalChemistry', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CaractPhysicalChemistry);

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
