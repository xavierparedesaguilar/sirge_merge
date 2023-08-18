<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EvaluationFieldFixture
 *
 */
class EvaluationFieldFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'evaluation_field';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'evaldate' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => 'FECHA DE EVALUACION DEL EXPERIMENTO', 'precision' => null],
        'evalname' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'NOMBRE DEL RESPONSABLE DE LA EVALUACION', 'precision' => null, 'fixed' => null],
        'evalrem' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'DESCRIPCIÓN DE LA EVALUACION', 'precision' => null, 'fixed' => null],
        'prodtype' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'TIPO DE PRODUCCION CIENTIFICA - TECNICA', 'precision' => null, 'autoIncrement' => null],
        'prodrem' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'DESCRIPCION DEL PRODUCTO', 'precision' => null, 'fixed' => null],
        'harvest' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'EPOCA DEL AñO EN QUE SE COSECHA', 'precision' => null, 'fixed' => null],
        'bank_field_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'status' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_input_field_bank_field1_idx' => ['type' => 'index', 'columns' => ['bank_field_id'], 'length' => []],
            'fk_evaluation_field_bank_field1_idx' => ['type' => 'index', 'columns' => ['bank_field_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_evaluation_field_bank_field1' => ['type' => 'foreign', 'columns' => ['bank_field_id'], 'references' => ['bank_field', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'evaldate' => '2017-05-10',
            'evalname' => 'Lorem ipsum dolor sit amet',
            'evalrem' => 'Lorem ipsum dolor sit amet',
            'prodtype' => 1,
            'prodrem' => 'Lorem ipsum dolor sit amet',
            'harvest' => 'Lorem ipsum dolor sit amet',
            'bank_field_id' => 1,
            'created' => '2017-05-10 15:06:04',
            'modified' => '2017-05-10 15:06:04',
            'status' => 1
        ],
    ];
}
