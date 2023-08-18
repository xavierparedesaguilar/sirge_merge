<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CaractPhysicalChemistryFixture
 *
 */
class CaractPhysicalChemistryFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'caract_physical_chemistry';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'expnumb' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => ' - NÚMERO DEL EXPERIMENT', 'precision' => null, 'fixed' => null],
        'colname' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ' - LISTA DE COLECCIONES', 'precision' => null, 'autoIncrement' => null],
        'samplelist' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => ' - LISTA DE ACCESIONES ', 'precision' => null, 'fixed' => null],
        'project' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => ' - NOMBRE DEL PROYECTO QUE CARACTERIZA FISICOQUIMICO LA ACCESIÓN', 'precision' => null, 'fixed' => null],
        'projcode' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => ' - CÓDIGO DEL PROYECTO QUE CARACTERIZA FISICOQUIMICO LA ACCESIÓN', 'precision' => null, 'fixed' => null],
        'datamatrix' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => ' - MATRIZ DE DATOS', 'precision' => null, 'fixed' => null],
        'traitlist' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '8 - LISTA DE VARIABLES EVALUADAS', 'precision' => null, 'fixed' => null],
        'respname' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '29 - PERSONAL RESPONSABLE EN REALIZAR LA CARACTERIZACIÓN', 'precision' => null, 'fixed' => null],
        'remarks' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '30 - PARA AÑADIR NOTAS, OBSERVACIÓN O PARA COMPLETAR DATOS FALTANTES ', 'precision' => null, 'fixed' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'status' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
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
            'expnumb' => 'Lorem ipsum dolor sit amet',
            'colname' => 1,
            'samplelist' => 'Lorem ipsum dolor sit amet',
            'project' => 'Lorem ipsum dolor sit amet',
            'projcode' => 'Lorem ipsum dolor sit amet',
            'datamatrix' => 'Lorem ipsum dolor sit amet',
            'traitlist' => 'Lorem ipsum dolor sit amet',
            'respname' => 'Lorem ipsum dolor sit amet',
            'remarks' => 'Lorem ipsum dolor sit amet',
            'created' => '2017-06-06 23:45:11',
            'modified' => '2017-06-06 23:45:11',
            'status' => 1
        ],
    ];
}
