<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OutputFieldFixture
 *
 */
class OutputFieldFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'output_field';

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
        'samptype' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - TIPO DE MUESTRA SEGÚN EL OBJETIVO DEL PROYECTO', 'precision' => null, 'autoIncrement' => null],
        'samplamount' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - CANTIDAD DE MUESTRA', 'precision' => null, 'autoIncrement' => null],
        'destiny' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - LUGAR A DONDE SE ENVIA LA MUESTRA', 'precision' => null, 'fixed' => null],
        'object' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - MOTIVO DE SALIDA DEL MATERIAL ', 'precision' => null, 'fixed' => null],
        'remexit' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - DESCRIPCION DEL MOTIVO DE LA SALIDA DEL MATERIAL DEL BANCO', 'precision' => null, 'fixed' => null],
        'sampres' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - INVESTIGADOR QUE RECIBE LA MUESTRA', 'precision' => null, 'fixed' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'status' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'bank_field_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_output_field_bank_field1_idx' => ['type' => 'index', 'columns' => ['bank_field_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_output_field_bank_field1' => ['type' => 'foreign', 'columns' => ['bank_field_id'], 'references' => ['bank_field', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'exitdate' => '2017-05-23',
            'samptype' => 1,
            'samplamount' => 1,
            'destiny' => 'Lorem ipsum dolor sit amet',
            'object' => 'Lorem ipsum dolor sit amet',
            'remexit' => 'Lorem ipsum dolor sit amet',
            'sampres' => 'Lorem ipsum dolor sit amet',
            'created' => '2017-05-23 08:09:01',
            'modified' => '2017-05-23 08:09:01',
            'status' => 1,
            'bank_field_id' => 1
        ],
    ];
}
