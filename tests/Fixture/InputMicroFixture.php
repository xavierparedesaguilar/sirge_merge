<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * InputMicroFixture
 *
 */
class InputMicroFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'input_micro';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'donorcore' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - CODIGO DADO AL INSTITUTO DONANTE', 'precision' => null, 'fixed' => null],
        'donorname' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - NOMBRE DEL DONANTE', 'precision' => null, 'fixed' => null],
        'donornumb' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - CODIGO  ASIGNADO A UNA ACCESIÓN POR EL DONANTE', 'precision' => null, 'fixed' => null],
        'enterdate' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - FECHA DE ENTRADA DEL MATERIAL DEL DONANTE', 'precision' => null],
        'numtubent' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - NUMERO DE TUBOS/VIALES QUE ENTRAN DE UNA MUESTRA DE MICROORGANISMO', 'precision' => null, 'autoIncrement' => null],
        'rement' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - DESCRIPCION DEL MOTIVO DE LA ENTRADA DEL MATERIAL AL BANCO', 'precision' => null, 'fixed' => null],
        'sampstat' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - CONDICIÓN BIOLOGICA', 'precision' => null, 'fixed' => null],
        'tipdep' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - INDICA LA CATEGORIA DE DEPOSITO DEL MICROORGANISMO', 'precision' => null, 'autoIncrement' => null],
        'estmuestra' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - INDICA LA CONDICION DE RECEPCION DE LA MUESTRA ', 'precision' => null, 'autoIncrement' => null],
        'bank_micro_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'status' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_input_micro_bank_micro1_idx' => ['type' => 'index', 'columns' => ['bank_micro_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_input_micro_bank_micro1' => ['type' => 'foreign', 'columns' => ['bank_micro_id'], 'references' => ['bank_micro', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'donorcore' => 'Lorem ipsum dolor sit amet',
            'donorname' => 'Lorem ipsum dolor sit amet',
            'donornumb' => 'Lorem ipsum dolor sit amet',
            'enterdate' => '2017-05-30',
            'numtubent' => 1,
            'rement' => 'Lorem ipsum dolor sit amet',
            'sampstat' => 'Lorem ipsum dolor sit amet',
            'tipdep' => 1,
            'estmuestra' => 1,
            'bank_micro_id' => 1,
            'created' => '2017-05-30 21:32:45',
            'modified' => '2017-05-30 21:32:45',
            'status' => 1
        ],
    ];
}
