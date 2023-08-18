<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * InputFieldFixture
 *
 */
class InputFieldFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'input_field';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'donorcore' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - CODIGO DADO A LA INSTITUCION DONANTE', 'precision' => null, 'fixed' => null],
        'donorname' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - NOMBRE DEL INSTITUCION DONANTE', 'precision' => null, 'fixed' => null],
        'donornumb' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - CODIGO  ASIGNADO A UNA ACCESIÓN POR EL DONANTE', 'precision' => null, 'fixed' => null],
        'enterdate' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - FECHA DE ENTRADA DEL MATERIAL DEL DONANTE', 'precision' => null],
        'numtubent' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - NUMERO DE MATERIALES QUE ENTRAN DE UNA MUESTRA', 'precision' => null, 'autoIncrement' => null],
        'rement' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - DESCRIPCION DEL MOTIVO DE LA ENTRADA DEL MATERIAL AL BANCO', 'precision' => null, 'fixed' => null],
        'bank_field_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'muestratype' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - INDICA EL TIPO DE LA MUESTRA', 'precision' => null, 'autoIncrement' => null],
        'estmuestra' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - INDICA EL ESTADO DE LA MUESTRA', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'status' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_input_field_bank_field1_idx' => ['type' => 'index', 'columns' => ['bank_field_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_input_field_bank_field1' => ['type' => 'foreign', 'columns' => ['bank_field_id'], 'references' => ['bank_field', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'enterdate' => '2017-05-10',
            'numtubent' => 1,
            'rement' => 'Lorem ipsum dolor sit amet',
            'bank_field_id' => 1,
            'muestratype' => 1,
            'estmuestra' => 1,
            'created' => '2017-05-10 15:04:27',
            'modified' => '2017-05-10 15:04:27',
            'status' => 1
        ],
    ];
}
