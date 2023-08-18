<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BankDnaFixture
 *
 */
class BankDnaFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'bank_dna';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'type_resource' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - TIPO DE RECURSO', 'precision' => null, 'autoIncrement' => null],
        'bank_availability' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'MULTICROP - CODIGO DE IDENTIFICACIÓN EXCLUSIVO DE LAS ACCESIONES : CODIGO PER', 'precision' => null, 'autoIncrement' => null],
        'lotnumb' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - NUMERO DE IDENTIFICACIÓN  UNICO DE LA MUESTRA', 'precision' => null, 'fixed' => null],
        'acqdate' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - FECHA EN LA QUE SE INCORPORO LA ACCESIÓN A LA COLECCIÓN', 'precision' => null],
        'availability' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - DISPONIBILIDAD DEL LOTE DE LA ACCESIÓN (SI/NO)', 'precision' => null, 'autoIncrement' => null],
        'remarks' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - PARA AÑADIR NOTAS O PARA COMPLETAR DATOS FALTANTES ', 'precision' => null, 'fixed' => null],
        'passport_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'status' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_bank_dna_passport1_idx' => ['type' => 'index', 'columns' => ['passport_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_bank_dna_passport1' => ['type' => 'foreign', 'columns' => ['passport_id'], 'references' => ['passport', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'type_resource' => 1,
            'bank_availability' => 1,
            'lotnumb' => 'Lorem ipsum dolor sit amet',
            'acqdate' => '2017-05-23',
            'availability' => 1,
            'remarks' => 'Lorem ipsum dolor sit amet',
            'passport_id' => 1,
            'created' => '2017-05-23 08:40:29',
            'modified' => '2017-05-23 08:40:29',
            'status' => 1
        ],
    ];
}
