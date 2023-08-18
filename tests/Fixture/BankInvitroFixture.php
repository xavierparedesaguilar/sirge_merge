<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BankInvitroFixture
 *
 */
class BankInvitroFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'bank_invitro';

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
        'acqdate' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - FECHA EN LA QUE SE INCORPORO EL MATERIAL A LA COLECCIÓN IN VITRO', 'precision' => null],
        'availability' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - DISPONIBILIDAD DEL LOTE DE LA ACCESIÓN ', 'precision' => null, 'autoIncrement' => null],
        'storoom' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - LUGAR DONDE SE CONSERVA EL MATERIAL DE ACUERDO A LA TEMPERATURA', 'precision' => null, 'autoIncrement' => null],
        'temp' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - TEMPERATURA DEL LUGAR DE CONSERVACIÓN', 'precision' => null, 'fixed' => null],
        'shelving' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - UBICACIÓN DEL MATERIAL DENTRO DEL CUARTO DE CONSERVACIÓN', 'precision' => null, 'fixed' => null],
        'levelshelv' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - NIVEL DE ESTANTERIA DONDE  SE ENCUENTRA LA GRADILLA CON EL TUBO CON ACCESION', 'precision' => null, 'autoIncrement' => null],
        'rack' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - NÚMERO DE GRADILLA DONDE  SE ENCUENTRA EL TUBO DE LA ACCESION', 'precision' => null, 'autoIncrement' => null],
        'duplinstname' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP -  LUGAR DONDE SE GUARDA UNA REPLICA DEL MATERIAL DE IN VITRO', 'precision' => null, 'fixed' => null],
        'dupnumb' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ' - NUMERO DE DUPLICADOS DE UNA REPLICA DEL MATERIAL DE IN VITRO', 'precision' => null, 'autoIncrement' => null],
        'plastate' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - VIABILIDAD DEL MATERIAL MANTENIDAS EN CONDICIÓN IN VITRO', 'precision' => null, 'autoIncrement' => null],
        'necrosis' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL -  LESIONES OSCURAS EN LA YAEMA Y TALLO DEBIDO A LA PRESENCIA DE CELULAS MUERTAS', 'precision' => null, 'autoIncrement' => null],
        'defoliation' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL -  CAIDA DE HOJAS DEL MATERIAL VEGETAL ', 'precision' => null, 'autoIncrement' => null],
        'rooting' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL -  CAPACIDAD DEL MATERIAL VEGETAL DE FORMAR RAIZ EN EL MEDIO DE CULTIVO IN VITRO', 'precision' => null, 'autoIncrement' => null],
        'chlorosis' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL -  AMARILLAMIENTO DEL TEJIDO FOLIAR ', 'precision' => null, 'autoIncrement' => null],
        'phenolization' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL -  OXIDACION U OSCURECIMIENTO DEL MEDIO DE CULTIVO IN VITRO', 'precision' => null, 'autoIncrement' => null],
        'storage' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'MULTICROP -  TIPO DE MEDIO DONDE SE ALMACENA EL MATERIAL', 'precision' => null, 'autoIncrement' => null],
        'propagation' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - MEDIO PROPAGACIÓN DEL MATERIAL', 'precision' => null, 'autoIncrement' => null],
        'protime' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - TIEMPO MÁXIMO EN EL MEDIO', 'precision' => null, 'autoIncrement' => null],
        'conservation' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - MEDIO DE CONSERVACIÓN DEL MATERIAL', 'precision' => null, 'autoIncrement' => null],
        'constime' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'MULTICROP - TIEMPO DE CONSERVACIÓN DEL MATERIAL', 'precision' => null, 'autoIncrement' => null],
        'tubenumb' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - NUMERO DE TUBOS QUE SE MANTIENEN POR CADA MATERIAL', 'precision' => null, 'autoIncrement' => null],
        'explnumb' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - NUMERO DE EXPLANTES MANTENIDOS POR CADA COLECCIÓN O ESPECIE POR TUBO', 'precision' => null, 'autoIncrement' => null],
        'stock' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - CANTINDAD DE EXPLANTES QUE SE PUEDE CONSERVAR DEL MATERIAL', 'precision' => null, 'autoIncrement' => null],
        'tubesize' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - TAMAÑO Y DIAMETRO DEL TUBO PARA CONSERVAR EL MATERIAL', 'precision' => null, 'autoIncrement' => null],
        'fitostate' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - CONDICIÓN DE SALUD QUE GUARDA EL MATERIAL', 'precision' => null, 'autoIncrement' => null],
        'pathogen' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - PRESENCIA DE PLAGAS O ENFERMEDADES QUE PRESENTA EN EL MATERIAL', 'precision' => null, 'fixed' => null],
        'remarks' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - PARA AÑADIR NOTAS O PARA COMPLETAR DATOS FALTANTES ', 'precision' => null, 'fixed' => null],
        'passport_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'status' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_bank_invitro_passport1_idx' => ['type' => 'index', 'columns' => ['passport_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_bank_invitro_passport1' => ['type' => 'foreign', 'columns' => ['passport_id'], 'references' => ['passport', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'acqdate' => '2017-05-22',
            'availability' => 1,
            'storoom' => 1,
            'temp' => 'Lorem ipsum dolor sit amet',
            'shelving' => 'Lorem ipsum dolor sit amet',
            'levelshelv' => 1,
            'rack' => 1,
            'duplinstname' => 'Lorem ipsum dolor sit amet',
            'dupnumb' => 1,
            'plastate' => 1,
            'necrosis' => 1,
            'defoliation' => 1,
            'rooting' => 1,
            'chlorosis' => 1,
            'phenolization' => 1,
            'storage' => 1,
            'propagation' => 1,
            'protime' => 1,
            'conservation' => 1,
            'constime' => 1,
            'tubenumb' => 1,
            'explnumb' => 1,
            'stock' => 1,
            'tubesize' => 1,
            'fitostate' => 1,
            'pathogen' => 'Lorem ipsum dolor sit amet',
            'remarks' => 'Lorem ipsum dolor sit amet',
            'passport_id' => 1,
            'created' => '2017-05-22 07:19:17',
            'modified' => '2017-05-22 07:19:17',
            'status' => 1
        ],
    ];
}
