<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * StationFixture
 *
 */
class StationFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'station';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'eea' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - NOMBRE DE LA ESTACIÓN EXPERIMENTAL', 'precision' => null, 'fixed' => null],
        'collsite' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - INFORMACIÓN SOBRE LA UBICACIÓN DEL LUGAR   DONDE SE ENCUENTRA LA EEA', 'precision' => null, 'fixed' => null],
        'responsible' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - NOMBRE RESPONSABLE DE LA EEA - RRGG', 'precision' => null, 'fixed' => null],
        'telephone' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - NUMERO TELEFONICO DE  LA EEA ', 'precision' => null, 'fixed' => null],
        'celphone' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - NUMERO CELULAR DE LA EEA O DEL RESPONSBLE', 'precision' => null, 'fixed' => null],
        'availability' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'MULTICROP - DISPONIBILIDAD ', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'ubigeo_id' => ['type' => 'integer', 'length' => 10, 'unsigned' => true, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'country_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'status' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'localidad' => ['type' => 'string', 'length' => 150, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'fk_station_ubigeo1_idx' => ['type' => 'index', 'columns' => ['ubigeo_id'], 'length' => []],
            'fk_station_country1_idx' => ['type' => 'index', 'columns' => ['country_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_station_country1' => ['type' => 'foreign', 'columns' => ['country_id'], 'references' => ['country', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_station_ubigeo1' => ['type' => 'foreign', 'columns' => ['ubigeo_id'], 'references' => ['ubigeo', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'eea' => 'Lorem ipsum dolor sit amet',
            'collsite' => 'Lorem ipsum dolor sit amet',
            'responsible' => 'Lorem ipsum dolor sit amet',
            'telephone' => 'Lorem ipsum dolor sit amet',
            'celphone' => 'Lorem ipsum dolor sit amet',
            'availability' => 1,
            'created' => '2017-05-03 20:29:55',
            'modified' => '2017-05-03 20:29:55',
            'ubigeo_id' => 1,
            'country_id' => 1,
            'status' => 1,
            'localidad' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
