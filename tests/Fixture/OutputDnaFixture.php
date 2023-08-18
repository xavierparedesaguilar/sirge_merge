<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OutputDnaFixture
 *
 */
class OutputDnaFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'output_dna';

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
        'exitdate' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - FECHA DE SALIDA DEL MATERIAL', 'precision' => null, 'fixed' => null],
        'numtubexit' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - NUMERO DE CRIOVIALES  QUE SALEN DE UNA CEPA', 'precision' => null, 'autoIncrement' => null],
        'object' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - MOTIVO DE SALIDA DEL MATERIAL ', 'precision' => null, 'fixed' => null],
        'remexit' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - DESCRIPCION DEL MOTIVO DE LA SALIDA DEL MATERIAL DEL BANCO', 'precision' => null, 'fixed' => null],
        'bank_dna_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'status' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_output_dna_bank_dna1_idx' => ['type' => 'index', 'columns' => ['bank_dna_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_output_dna_bank_dna1' => ['type' => 'foreign', 'columns' => ['bank_dna_id'], 'references' => ['bank_dna', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'exitdate' => 'Lorem ipsum dolor sit amet',
            'numtubexit' => 1,
            'object' => 'Lorem ipsum dolor sit amet',
            'remexit' => 'Lorem ipsum dolor sit amet',
            'bank_dna_id' => 1,
            'created' => '2017-05-15 10:18:18',
            'modified' => '2017-05-15 10:18:18',
            'status' => 1
        ],
    ];
}
