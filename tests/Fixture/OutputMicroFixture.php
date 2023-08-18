<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OutputMicroFixture
 *
 */
class OutputMicroFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'output_micro';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'reqcode' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - CODIGO DADO AL INSTITUTO SOLICITANTE', 'precision' => null, 'fixed' => null],
        'reqname' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - NOMBRE DEL SOLICITANTE', 'precision' => null, 'fixed' => null],
        'exitdate' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - FECHA DE SALIDA DEL MATERIAL', 'precision' => null],
        'numtubexit' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - NUMERO DE TUBO QUE SALEN DE UNA ACCESION IN VITRO', 'precision' => null, 'autoIncrement' => null],
        'object' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - MOTIVO DE SALIDA DEL MATERIAL ', 'precision' => null, 'fixed' => null],
        'remexit' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - DESCRIPCION DEL MOTIVO DE LA SALIDA DEL MATERIAL DEL BANCO', 'precision' => null, 'fixed' => null],
        'matersta' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - DESCRIPCION DEL ESTADO EN EL QUE SALE EL MICROORGANISMO', 'precision' => null, 'autoIncrement' => null],
        'bank_micro_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'status' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_output_micro_bank_micro1_idx' => ['type' => 'index', 'columns' => ['bank_micro_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_output_micro_bank_micro1' => ['type' => 'foreign', 'columns' => ['bank_micro_id'], 'references' => ['bank_micro', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'reqcode' => 'Lorem ipsum dolor sit amet',
            'reqname' => 'Lorem ipsum dolor sit amet',
            'exitdate' => '2017-05-31',
            'numtubexit' => 1,
            'object' => 'Lorem ipsum dolor sit amet',
            'remexit' => 'Lorem ipsum dolor sit amet',
            'matersta' => 1,
            'bank_micro_id' => 1,
            'created' => '2017-05-31 15:13:18',
            'modified' => '2017-05-31 15:13:18',
            'status' => 1
        ],
    ];
}
