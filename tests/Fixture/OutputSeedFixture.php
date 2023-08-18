<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OutputSeedFixture
 *
 */
class OutputSeedFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'output_seed';

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
        'numbagexit' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - NUMERO DE BOLSAS QUE SALEN DE UNA ACCESION', 'precision' => null, 'autoIncrement' => null],
        'reason' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - MOTIVO DE SALIDA DEL MATERIAL ', 'precision' => null, 'fixed' => null],
        'remexit' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - DESCRIPCION DEL MOTIVO DE LA SALIDA DEL MATERIAL DEL BANCO', 'precision' => null, 'fixed' => null],
        'bank_seed_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'status' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_output_seed_bank_seed1_idx' => ['type' => 'index', 'columns' => ['bank_seed_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_output_seed_bank_seed1' => ['type' => 'foreign', 'columns' => ['bank_seed_id'], 'references' => ['bank_seed', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'exitdate' => '2017-05-15',
            'numbagexit' => 1,
            'reason' => 'Lorem ipsum dolor sit amet',
            'remexit' => 'Lorem ipsum dolor sit amet',
            'bank_seed_id' => 1,
            'created' => '2017-05-15 07:34:37',
            'modified' => '2017-05-15 07:34:37',
            'status' => 1
        ],
    ];
}
