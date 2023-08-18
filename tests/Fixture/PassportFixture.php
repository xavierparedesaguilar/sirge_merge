<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PassportFixture
 *
 */
class PassportFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'passport';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'instcode' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - CODIGO DEL INSTITUTO (COD. FAO)', 'precision' => null, 'fixed' => null],
        'accenumb' => ['type' => 'string', 'length' => 10, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - CODIGO DE ACCESIÓN (COD. PER)', 'precision' => null, 'fixed' => null],
        'accname' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - NOMBRE DE LA ACCESIÓN', 'precision' => null, 'fixed' => null],
        'othenumb' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - IDENTIFICACIÓN DE ESTA ACCESIÓN QUE SE HAYA ENCONTRADO EN OTRAS COLECCIONES -  (COD INTERNO)', 'precision' => null, 'fixed' => null],
        'specie_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'resource_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'station_current_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'Estación experimental', 'precision' => null, 'autoIncrement' => null],
        'station_origin_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'Estación Experimental de Procedencia.', 'precision' => null, 'autoIncrement' => null],
        'status' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'country_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'ubigeo_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'localidad' => ['type' => 'string', 'length' => 150, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'collection_name' => ['type' => 'string', 'length' => 150, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'promissory' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_passport_specie1_idx' => ['type' => 'index', 'columns' => ['specie_id'], 'length' => []],
            'fk_passport_resource1_idx' => ['type' => 'index', 'columns' => ['resource_id'], 'length' => []],
            'fk_passport_station1_idx' => ['type' => 'index', 'columns' => ['station_current_id'], 'length' => []],
            'fk_passport_station2_idx' => ['type' => 'index', 'columns' => ['station_origin_id'], 'length' => []],
            'fk_passport_country1_idx' => ['type' => 'index', 'columns' => ['country_id'], 'length' => []],
            'fk_passport_ubigeo1_idx' => ['type' => 'index', 'columns' => ['ubigeo_id'], 'length' => []],
            'instcode' => ['type' => 'index', 'columns' => ['instcode'], 'length' => []],
            'accenumb' => ['type' => 'index', 'columns' => ['accenumb'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_passport_country1' => ['type' => 'foreign', 'columns' => ['country_id'], 'references' => ['country', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_passport_resource1' => ['type' => 'foreign', 'columns' => ['resource_id'], 'references' => ['resource', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_passport_specie1' => ['type' => 'foreign', 'columns' => ['specie_id'], 'references' => ['specie', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_passport_station1' => ['type' => 'foreign', 'columns' => ['station_current_id'], 'references' => ['station', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_passport_station2' => ['type' => 'foreign', 'columns' => ['station_origin_id'], 'references' => ['station', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_passport_ubigeo1' => ['type' => 'foreign', 'columns' => ['ubigeo_id'], 'references' => ['ubigeo', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'instcode' => 'Lorem ipsum dolor sit amet',
            'accenumb' => 'Lorem ip',
            'accname' => 'Lorem ipsum dolor sit amet',
            'othenumb' => 'Lorem ipsum dolor sit amet',
            'specie_id' => 1,
            'resource_id' => 1,
            'station_current_id' => 1,
            'station_origin_id' => 1,
            'status' => 1,
            'modified' => '2017-07-22 13:12:05',
            'created' => '2017-07-22 13:12:05',
            'country_id' => 1,
            'ubigeo_id' => 1,
            'localidad' => 'Lorem ipsum dolor sit amet',
            'collection_name' => 'Lorem ipsum dolor sit amet',
            'promissory' => 1
        ],
    ];
}
