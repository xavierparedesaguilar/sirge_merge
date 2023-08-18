<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OptionListTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OptionListTable Test Case
 */
class OptionListTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OptionListTable
     */
    public $OptionList;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.option_list'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('OptionList') ? [] : ['className' => 'App\Model\Table\OptionListTable'];
        $this->OptionList = TableRegistry::get('OptionList', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OptionList);

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
