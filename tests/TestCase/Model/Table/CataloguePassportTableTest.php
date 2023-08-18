<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CataloguePassportTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CataloguePassportTable Test Case
 */
class CataloguePassportTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CataloguePassportTable
     */
    public $CataloguePassport;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.catalogue_passport'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CataloguePassport') ? [] : ['className' => 'App\Model\Table\CataloguePassportTable'];
        $this->CataloguePassport = TableRegistry::get('CataloguePassport', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CataloguePassport);

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
