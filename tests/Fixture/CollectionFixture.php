<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CollectionFixture
 *
 */
class CollectionFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'collection';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'colname' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - NOMBRE DE LA COLECCIÓN QUE SE MANEJA EN EL BANCO', 'precision' => null, 'fixed' => null],
        'colgroup' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - GRUPO QUE PERTENECE LA COLECCIÓN', 'precision' => null, 'fixed' => null],
        'resource_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - NOMBRE DEL RECURSOS QUE VA A PERTENECER LA COLECCIÓN', 'precision' => null, 'autoIncrement' => null],
        'eea' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - NOMBRE DE LA ESTACIÓN EXPERIMENTAL DONDE SE CONSERVA LA COLECCIÓN', 'precision' => null, 'autoIncrement' => null],
        'invitro' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - SI LA COLECCIÓN PERTENECE AL BANCO DE IN VITRO', 'precision' => null, 'autoIncrement' => null],
        'bseed' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - SI LA COLECCIÓN  PERTENECE AL BANCO DE SEMILLAS', 'precision' => null, 'autoIncrement' => null],
        'bfield' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - SI LA COLECCIÓN  PERTENECE AL BANCO DE CAMPO', 'precision' => null, 'autoIncrement' => null],
        'bdna' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - SI LA COLECCIÓN  PERTENECE AL  BANCO DE ADN', 'precision' => null, 'autoIncrement' => null],
        'insitu' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - SI LA COLECCIÓN  PERTENECE A CONSERVACIÓN IN SITU', 'precision' => null, 'autoIncrement' => null],
        'availability' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'MULTICROP - DISPONIBILIDAD DEL LOTE DE LA COLECCIÓN', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'status' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_collection_station1' => ['type' => 'index', 'columns' => ['eea'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_collection_station1' => ['type' => 'foreign', 'columns' => ['eea'], 'references' => ['station', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'colname' => 'Lorem ipsum dolor sit amet',
            'colgroup' => 'Lorem ipsum dolor sit amet',
            'resource_id' => 1,
            'eea' => 1,
            'invitro' => 1,
            'bseed' => 1,
            'bfield' => 1,
            'bdna' => 1,
            'insitu' => 1,
            'availability' => 1,
            'created' => '2017-06-12 16:27:34',
            'modified' => '2017-06-12 16:27:34',
            'status' => 1
        ],
    ];
}
