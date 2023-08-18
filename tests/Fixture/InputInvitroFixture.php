<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * InputInvitroFixture
 *
 */
class InputInvitroFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'input_invitro';

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
        'enterdate' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL -  FECHA DE ENTRADA DEL MATERIAL DEL DONANTE', 'precision' => null],
        'tubentnumb' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - NUMERO DE TUBO QUE ENTRAN DE UNA ACCESION IN VITRO', 'precision' => null, 'autoIncrement' => null],
        'explentnumb' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - NÚMERO DE EXPLANTES QUE ENTRAN IN VITRO DE UNA ACCESION', 'precision' => null, 'autoIncrement' => null],
        'rement' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - DESCRIPCION DEL MOTIVO DE LA ENTRADA DEL MATERIAL AL BANCO', 'precision' => null, 'fixed' => null],
        'bank_invitro_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'status' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_input_invitro_bank_invitro1_idx' => ['type' => 'index', 'columns' => ['bank_invitro_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_input_invitro_bank_invitro1' => ['type' => 'foreign', 'columns' => ['bank_invitro_id'], 'references' => ['bank_invitro', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'enterdate' => '2017-05-04',
            'tubentnumb' => 1,
            'explentnumb' => 1,
            'rement' => 'Lorem ipsum dolor sit amet',
            'bank_invitro_id' => 1,
            'created' => '2017-05-04 20:31:38',
            'modified' => '2017-05-04 20:31:38',
            'status' => 1
        ],
    ];
}
