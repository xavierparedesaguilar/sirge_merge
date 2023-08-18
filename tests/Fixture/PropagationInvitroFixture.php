<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PropagationInvitroFixture
 *
 */
class PropagationInvitroFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'propagation_invitro';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'prodate' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - FECHA QUE SE REALIZA LA RENOVACIÓN O PROPAGACIÓN DEL MATERIAL', 'precision' => null],
        'propagator' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - NOMBRE DEL PERSONAL QUE REALIZO LA RENOVACIÓN DEL MATERIAL', 'precision' => null, 'fixed' => null],
        'prorem' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - MOTIVO QUE ESTA REALIZANDO LA PROPAGACIÓN', 'precision' => null, 'fixed' => null],
        'bank_invitro_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'status' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'proper' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL -  PERIODO DE PROPAGACIÓN DEL MATERIAL', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'fk_propagation_invitro_bank_invitro1_idx' => ['type' => 'index', 'columns' => ['bank_invitro_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_propagation_invitro_bank_invitro1' => ['type' => 'foreign', 'columns' => ['bank_invitro_id'], 'references' => ['bank_invitro', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'prodate' => '2017-05-05',
            'propagator' => 'Lorem ipsum dolor sit amet',
            'prorem' => 'Lorem ipsum dolor sit amet',
            'bank_invitro_id' => 1,
            'created' => '2017-05-05 21:38:09',
            'modified' => '2017-05-05 21:38:09',
            'status' => 1,
            'proper' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
