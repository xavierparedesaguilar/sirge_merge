<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LongTermConservationMicroFixture
 *
 */
class LongTermConservationMicroFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'long_term_conservation_micro';

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
        'longtermcon' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - MEDIO NECESARIO PARA LA CONSERVACIÓN A LARGO PLAZO ', 'precision' => null, 'autoIncrement' => null],
        'longtermtemp' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - DEFINE LA TEMPERATURA SE DEBE CONSERVAR EL MICROORGANISMO', 'precision' => null, 'fixed' => null],
        'longtermtime' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - DEFINE EL TIEMPO L SE DEBE CONSERVAR EL MICROORGANISMO', 'precision' => null, 'fixed' => null],
        'criopro' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - TIPO DE SOLUCIONEZ USADAS PARA CRIOPERSERVACIÓN ', 'precision' => null, 'autoIncrement' => null],
        'longtermtype' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - TIPO DE CONSERVACIÓN A LARGO PLAZO ', 'precision' => null, 'autoIncrement' => null],
        'criovinumb' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - NUMERO DE CRIOVIALES QUE SE MANTIENEN POR CADA MATERIAL ', 'precision' => null, 'autoIncrement' => null],
        'crioviminstock' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - STOCK MINIMO DE CRIOVIALES QUE SE DEBE MANTENER DEL MATERIAL DE LIOFILIZADOS Y CRIOPERSERVADOS', 'precision' => null, 'autoIncrement' => null],
        'longstornumb' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - CODIGO DEL EQUIPO DE ALAMACENAMIENTO', 'precision' => null, 'fixed' => null],
        'longstorage' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - LUGARES DE ALMACENAMIENTO DONDE SE MANTIENE EL MATERIAL', 'precision' => null, 'autoIncrement' => null],
        'criolevel' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - NIVEL DE ESTANTERIA DONDE SE ENCUENTRA LA GRADILLA CON EL CRIOBOX', 'precision' => null, 'fixed' => null],
        'criorack' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - CODIGO DE ALMACENAMIENTO DEL CRIOBOX', 'precision' => null, 'fixed' => null],
        'longrackpos' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - POSICION DEL CRIOBOX DENTRO DE LA GRADILLA', 'precision' => null, 'fixed' => null],
        'longcrionumb' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - NÚMERO DE CRIOBOX DONDE  SE ENCUENTRA EL MATERIAL', 'precision' => null, 'autoIncrement' => null],
        'longcriopos' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - POSICION DEL CRIOVIAL DENTRO DEL CRIOBOX', 'precision' => null, 'fixed' => null],
        'amprack' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - CODIGO DE ALMACENAMIENTO DE LA AMPOLLA', 'precision' => null, 'fixed' => null],
        'amppos' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - POSICIÓN DEL CRIOVIAL EN LA AMPOLLA', 'precision' => null, 'fixed' => null],
        'bank_micro_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'status' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'renewal_date' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - FECHA DE RENOVACIÓN', 'precision' => null],
        '_indexes' => [
            'fk_long_term_conservation_micro_bank_micro1_idx' => ['type' => 'index', 'columns' => ['bank_micro_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_long_term_conservation_micro_bank_micro1' => ['type' => 'foreign', 'columns' => ['bank_micro_id'], 'references' => ['bank_micro', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'longtermcon' => 1,
            'longtermtemp' => 'Lorem ipsum dolor sit amet',
            'longtermtime' => 'Lorem ipsum dolor sit amet',
            'criopro' => 1,
            'longtermtype' => 1,
            'criovinumb' => 1,
            'crioviminstock' => 1,
            'longstornumb' => 'Lorem ipsum dolor sit amet',
            'longstorage' => 1,
            'criolevel' => 'Lorem ipsum dolor sit amet',
            'criorack' => 'Lorem ipsum dolor sit amet',
            'longrackpos' => 'Lorem ipsum dolor sit amet',
            'longcrionumb' => 1,
            'longcriopos' => 'Lorem ipsum dolor sit amet',
            'amprack' => 'Lorem ipsum dolor sit amet',
            'amppos' => 'Lorem ipsum dolor sit amet',
            'bank_micro_id' => 1,
            'created' => '2017-08-24 12:24:07',
            'modified' => '2017-08-24 12:24:07',
            'status' => 1,
            'renewal_date' => '2017-08-24'
        ],
    ];
}
