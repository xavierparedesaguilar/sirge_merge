<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PurityMicroFixture
 *
 */
class PurityMicroFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'purity_micro';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'isolamed_1' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - MEDIO DE CULTIVO NO DIFERNCIAL PARA EL MICROORGANIMOS', 'precision' => null, 'autoIncrement' => null],
        'reactime_1' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - TIEMPO DE REACTIVACIÓN DEL MICROORGANISMO', 'precision' => null, 'autoIncrement' => null],
        'reactemp_1' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - TEMPERATURA QUE REQUIERE EL MICROORGANISMO SU REACTIVACIÓN', 'precision' => null, 'fixed' => null],
        'bank_micro_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'status' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'isolamed_2' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - MEDIO DE CULTIVO  DIFERNCIAL PARA EL MICROORGANIMOS', 'precision' => null, 'autoIncrement' => null],
        'reactime_2' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - TIEMPO DE REACTIVACIÓN DEL MICROORGANISMO', 'precision' => null, 'autoIncrement' => null],
        'reactemp_2' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - TEMPERATURA QUE REQUIERE EL MICROORGANISMO SU REACTIVACIÓN', 'precision' => null, 'fixed' => null],
        'gramstain' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - TINCION DIFERENCIAL PARA VER SI ES UN TIPO DE MICROORGANISMO', 'precision' => null, 'autoIncrement' => null],
        'lactobluestain' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - TINCION PARA VER SI ES UN TIPO DE MICROORGANISMO', 'precision' => null, 'autoIncrement' => null],
        'datepurz' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - FECHA DE PRUEBA DE PUREZA', 'precision' => null],
        '_indexes' => [
            'fk_purity_micro_bank_micro1_idx' => ['type' => 'index', 'columns' => ['bank_micro_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_purity_micro_bank_micro1' => ['type' => 'foreign', 'columns' => ['bank_micro_id'], 'references' => ['bank_micro', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'isolamed_1' => 1,
            'reactime_1' => 1,
            'reactemp_1' => 'Lorem ipsum dolor sit amet',
            'bank_micro_id' => 1,
            'created' => '2017-06-01 14:16:53',
            'modified' => '2017-06-01 14:16:53',
            'status' => 1,
            'isolamed_2' => 1,
            'reactime_2' => 1,
            'reactemp_2' => 'Lorem ipsum dolor sit amet',
            'gramstain' => 1,
            'lactobluestain' => 1,
            'datepurz' => '2017-06-01'
        ],
    ];
}
