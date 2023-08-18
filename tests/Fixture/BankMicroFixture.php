<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BankMicroFixture
 *
 */
class BankMicroFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'bank_micro';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'bank_availability' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'lotnumb' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - NUMERO DE IDENTIFICACIÓN  UNICO DE LA MUESTRA', 'precision' => null, 'fixed' => null],
        'acqdate' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - FECHA EN LA QUE SE INCORPORO EL MATERIAL ', 'precision' => null, 'fixed' => null],
        'availability' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - DISPONIBILIDAD DEL LOTE DE LA ACCESIÓN (SI/NO)', 'precision' => null, 'autoIncrement' => null],
        'risk' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - GRUPOS DE RIESGO DE LA COLECCIÓN DE  MICROORGANISMOS', 'precision' => null, 'autoIncrement' => null],
        'lablevel' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - INDICA EL NIVEL DE LABORATORIO PARA UN DETERMINADO GRUPO DE RIESGO', 'precision' => null, 'autoIncrement' => null],
        'quarplace' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - INDICA EL LUGAR DE DEPOSITO TRANSITORIO DE LA NUESTRA ', 'precision' => null, 'fixed' => null],
        'quartime' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - TIEMPO EN EL CUAL LA MUESTRA ESTARÁ EN CUARENTENA ', 'precision' => null, 'fixed' => null],
        'reactivation' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - MEDIO DE REACTIVACIÓN DEL MICROORGANISMO', 'precision' => null, 'autoIncrement' => null],
        'reactime' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - TIEMPO DE REACTIVACIÓN DEL MICROORGANISMO', 'precision' => null, 'fixed' => null],
        'reactemp' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - TEMPERATURA QUE REQUIERE EL MICROORGANISMO SU REACTIVACIÓN ', 'precision' => null, 'fixed' => null],
        'reacdate' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - FECHA QUE SE REALIZA LA REACTIVACIÓN DEL MATERIAL', 'precision' => null, 'fixed' => null],
        'reacresponsible' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - NOMBRE DEL PERSONAL RESPONSABLE DEL MATERIAL', 'precision' => null, 'fixed' => null],
        'reacrem' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - MOTIVO QUE ESTA REALIZANDO LA REACTIVACIÓN', 'precision' => null, 'fixed' => null],
        'isolamed_1' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - MEDIO DE CULTIVO NO DIFERNCIAL PARA EL MICROORGANIMOS', 'precision' => null, 'autoIncrement' => null],
        'reactime_1' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - TIEMPO DE REACTIVACIÓN DEL MICROORGANISMO', 'precision' => null, 'fixed' => null],
        'reactemp_1' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - TEMPERATURA QUE REQUIERE EL MICROORGANISMO SU REACTIVACIÓN ', 'precision' => null, 'fixed' => null],
        'isolamed_2' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - MEDIO DE CULTIVO  DIFERNCIAL PARA EL MICROORGANIMOS', 'precision' => null, 'autoIncrement' => null],
        'reactime_2' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - TIEMPO DE REACTIVACIÓN DEL MICROORGANISMO', 'precision' => null, 'fixed' => null],
        'reactemp_2' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - TEMPERATURA QUE REQUIERE EL MICROORGANISMO SU REACTIVACIÓN ', 'precision' => null, 'fixed' => null],
        'gramstain' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - TINCION DIFERENCIAL PARA VER SI ES UN TIPO DE MICROORGANISMO ', 'precision' => null, 'autoIncrement' => null],
        'lactobluestain' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - TINCION PARA VER SI ES UN TIPO DE MICROORGANISMO ', 'precision' => null, 'autoIncrement' => null],
        'datepurz' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - FECHA DE PRUEBA DE PUREZA', 'precision' => null, 'fixed' => null],
        'remarks' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - PARA AÑADIR NOTAS O PARA COMPLETAR DATOS FALTANTES ', 'precision' => null, 'fixed' => null],
        'passport_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'status' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_bank_micro_passport1_idx' => ['type' => 'index', 'columns' => ['passport_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_bank_micro_passport1' => ['type' => 'foreign', 'columns' => ['passport_id'], 'references' => ['passport', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'bank_availability' => 1,
            'lotnumb' => 'Lorem ipsum dolor sit amet',
            'acqdate' => 'Lorem ipsum dolor sit amet',
            'availability' => 1,
            'risk' => 1,
            'lablevel' => 1,
            'quarplace' => 'Lorem ipsum dolor sit amet',
            'quartime' => 'Lorem ipsum dolor sit amet',
            'reactivation' => 1,
            'reactime' => 'Lorem ipsum dolor sit amet',
            'reactemp' => 'Lorem ipsum dolor sit amet',
            'reacdate' => 'Lorem ipsum dolor sit amet',
            'reacresponsible' => 'Lorem ipsum dolor sit amet',
            'reacrem' => 'Lorem ipsum dolor sit amet',
            'isolamed_1' => 1,
            'reactime_1' => 'Lorem ipsum dolor sit amet',
            'reactemp_1' => 'Lorem ipsum dolor sit amet',
            'isolamed_2' => 1,
            'reactime_2' => 'Lorem ipsum dolor sit amet',
            'reactemp_2' => 'Lorem ipsum dolor sit amet',
            'gramstain' => 1,
            'lactobluestain' => 1,
            'datepurz' => 'Lorem ipsum dolor sit amet',
            'remarks' => 'Lorem ipsum dolor sit amet',
            'passport_id' => 1,
            'status' => 1,
            'created' => '2017-05-30 19:41:25',
            'modified' => '2017-05-30 19:41:25'
        ],
    ];
}
