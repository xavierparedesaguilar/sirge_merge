<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ShortTermConservationMicroFixture
 *
 */
class ShortTermConservationMicroFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'short_term_conservation_micro';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'constime' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - FECHA QUE SE REALIZA LA CONSERVACIÓN DEL MATERIAL', 'precision' => null],
        'consresponsible' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - NOMBRE DEL PERSONAL RESPONSABLE DEL MATERIAL', 'precision' => null, 'fixed' => null],
        'consrem' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - MOTIVO QUE ESTA REALIZANDO LA CONSERVACIÓN', 'precision' => null, 'fixed' => null],
        'shortermcon' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - DEFINE EL MEDIO EN CUAL SE DEBE CONSERVAR EL MICROORGANISMO', 'precision' => null, 'autoIncrement' => null],
        'shortermtemp' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - DEFINE LA TEMPERATURA SE DEBE CONSERVAR EL MICROORGANISMO', 'precision' => null, 'fixed' => null],
        'shortermtime' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - DEFINE EL TIEMPO QUE SE DEBE CONSERVAR EL MICROORGANISMO', 'precision' => null, 'fixed' => null],
        'shortmatstor' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - TIPO DE MATERIAL DONDE SE ALMACENA LA MUESTRA', 'precision' => null, 'autoIncrement' => null],
        'shortmatnumb' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - NUMERO DE MATERIAL QUE SE MANTIENEN POR CADA MUESTRA ', 'precision' => null, 'fixed' => null],
        'shortminstock' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - STOCK MINIMO QUE SE DEBE MANTENER DEL MATERIAL', 'precision' => null, 'autoIncrement' => null],
        'shortstornumb' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - CODIGO DEL EQUIPO DE ALAMACENAMIENTO', 'precision' => null, 'fixed' => null],
        'shortstorage' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - LUGARES DE ALMACENAMIENTO DONDE SE MANTIENE EL MATERIAL', 'precision' => null, 'autoIncrement' => null],
        'shortlevsh' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - NIVEL DE ESTANTERIA DONDE SE ENCUENTRA LA GRADILLA CON EL TUBO O PLACA CON LA MUESTRA', 'precision' => null, 'fixed' => null],
        'criorack' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - CODIGO DE LA GRADILLA', 'precision' => null, 'fixed' => null],
        'shortrackpos' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - POSICION DEL TUBO O PLACA DENTRO DE LA GRADILLA', 'precision' => null, 'fixed' => null],
        'bank_micro_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'status' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'renewal_date' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - FECHA DE RENOVACIÓN', 'precision' => null],
        '_indexes' => [
            'fk_short_term_conservation_micro_bank_micro1_idx' => ['type' => 'index', 'columns' => ['bank_micro_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_short_term_conservation_micro_bank_micro1' => ['type' => 'foreign', 'columns' => ['bank_micro_id'], 'references' => ['bank_micro', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'constime' => '2017-08-24',
            'consresponsible' => 'Lorem ipsum dolor sit amet',
            'consrem' => 'Lorem ipsum dolor sit amet',
            'shortermcon' => 1,
            'shortermtemp' => 'Lorem ipsum dolor sit amet',
            'shortermtime' => 'Lorem ipsum dolor sit amet',
            'shortmatstor' => 1,
            'shortmatnumb' => 'Lorem ipsum dolor sit amet',
            'shortminstock' => 1,
            'shortstornumb' => 'Lorem ipsum dolor sit amet',
            'shortstorage' => 1,
            'shortlevsh' => 'Lorem ipsum dolor sit amet',
            'criorack' => 'Lorem ipsum dolor sit amet',
            'shortrackpos' => 'Lorem ipsum dolor sit amet',
            'bank_micro_id' => 1,
            'created' => '2017-08-24 12:03:06',
            'modified' => '2017-08-24 12:03:06',
            'status' => 1,
            'renewal_date' => '2017-08-24'
        ],
    ];
}
