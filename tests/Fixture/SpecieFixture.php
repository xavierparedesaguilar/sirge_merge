<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SpecieFixture
 *
 */
class SpecieFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'specie';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'genus' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - NOMBRE DEL GÉNERO DADO A LA ESPECIE', 'precision' => null, 'fixed' => null],
        'species' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - PARTE ESPECIFICA DEL NOMBRE CIENTIFICO', 'precision' => null, 'fixed' => null],
        'cropname' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - NOMBRE CÓMUN DE LA ESPECIE CULTIVADA', 'precision' => null, 'fixed' => null],
        'family' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - FAMILIA QUE PERTENECE LA ESPECIE', 'precision' => null, 'fixed' => null],
        'availability' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - DISPONIBILIDAD', 'precision' => null, 'autoIncrement' => null],
        'collection_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'status' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_specie_collection1_idx' => ['type' => 'index', 'columns' => ['collection_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_specie_collection1' => ['type' => 'foreign', 'columns' => ['collection_id'], 'references' => ['collection', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'genus' => 'Lorem ipsum dolor sit amet',
            'species' => 'Lorem ipsum dolor sit amet',
            'cropname' => 'Lorem ipsum dolor sit amet',
            'family' => 'Lorem ipsum dolor sit amet',
            'availability' => 1,
            'collection_id' => 1,
            'created' => '2017-04-10 13:15:22',
            'modified' => '2017-04-10 13:15:22',
            'status' => 1
        ],
    ];
}
