<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ConservationInvitroFixture
 *
 */
class ConservationInvitroFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'conservation_invitro';

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
        'bank_invitro_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'status' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'stoper' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL -  PERIODO DE CONSERVACIÓN DEL MATERIAL', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'fk_conservation_invitro_bank_invitro1_idx' => ['type' => 'index', 'columns' => ['bank_invitro_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_conservation_invitro_bank_invitro1' => ['type' => 'foreign', 'columns' => ['bank_invitro_id'], 'references' => ['bank_invitro', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'constime' => '2017-05-05',
            'consresponsible' => 'Lorem ipsum dolor sit amet',
            'consrem' => 'Lorem ipsum dolor sit amet',
            'bank_invitro_id' => 1,
            'created' => '2017-05-05 21:37:41',
            'modified' => '2017-05-05 21:37:41',
            'status' => 1,
            'stoper' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
