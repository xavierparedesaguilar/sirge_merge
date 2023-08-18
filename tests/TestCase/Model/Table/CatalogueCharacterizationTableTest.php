<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CatalogueCharacterizationTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CatalogueCharacterizationTable Test Case
 */
class CatalogueCharacterizationTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CatalogueCharacterizationTable
     */
    public $CatalogueCharacterization;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.catalogue_characterization'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CatalogueCharacterization') ? [] : ['className' => 'App\Model\Table\CatalogueCharacterizationTable'];
        $this->CatalogueCharacterization = TableRegistry::get('CatalogueCharacterization', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CatalogueCharacterization);

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
