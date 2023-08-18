<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * InsituPlageFixture
 *
 */
class InsituPlageFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'insitu_plage';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'severity' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => false, 'default' => null, 'comment' => 'Severidad', 'precision' => null, 'autoIncrement' => null],
        'scientific_name' => ['type' => 'string', 'length' => 180, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'Nombre cientifico', 'precision' => null, 'fixed' => null],
        'reported_damage' => ['type' => 'string', 'length' => 160, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'Daño reportado.', 'precision' => null, 'fixed' => null],
        'culture' => ['type' => 'string', 'length' => 120, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'common_name' => ['type' => 'string', 'length' => 180, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'Nombre comun', 'precision' => null, 'fixed' => null],
        'status' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'insitu_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_insitu_plage_insitu1_idx' => ['type' => 'index', 'columns' => ['insitu_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_insitu_plage_insitu1' => ['type' => 'foreign', 'columns' => ['insitu_id'], 'references' => ['insitu', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'severity' => 1,
            'scientific_name' => 'Lorem ipsum dolor sit amet',
            'reported_damage' => 'Lorem ipsum dolor sit amet',
            'culture' => 'Lorem ipsum dolor sit amet',
            'common_name' => 'Lorem ipsum dolor sit amet',
            'status' => 1,
            'created' => '2017-06-14 11:46:36',
            'modified' => '2017-06-14 11:46:36',
            'insitu_id' => 1
        ],
    ];
}
