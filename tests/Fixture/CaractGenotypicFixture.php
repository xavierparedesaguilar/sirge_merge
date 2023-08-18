<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CaractGenotypicFixture
 *
 */
class CaractGenotypicFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'caract_genotypic';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'expnumb' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '1 - ', 'precision' => null, 'fixed' => null],
        'colname' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '2 - ', 'precision' => null, 'autoIncrement' => null],
        'accenumb' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '3 - ', 'precision' => null, 'fixed' => null],
        'molmarker' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '4 - ', 'precision' => null, 'autoIncrement' => null],
        'restenzymuse' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '5 - ', 'precision' => null, 'autoIncrement' => null],
        'restenzymname' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '6 - NOMBRES DE LAS ENZIMAS DE RESTRICCIÓN USADOS EN LA CARACTERIZACIÓN MOLECULAR', 'precision' => null, 'fixed' => null],
        'adaptrnum' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '7 - NUMERO DE ADAPTADORES QUE SE VAN A REGISTRAR', 'precision' => null, 'autoIncrement' => null],
        'project' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '8 - NOMBRE DEL PROYECTO QUE CARACTERIZA MOLECULARMENTE LA ACCESIÓN', 'precision' => null, 'fixed' => null],
        'projcode' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '9 - CÓDIGO DEL PROYECTO QUE CARACTERIZA MOLECULARMENTE LA ACCESIÓN', 'precision' => null, 'fixed' => null],
        'primernum' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '10 - NUMERO DE PRIMIERS QUE SE VANA REGISTRAR', 'precision' => null, 'autoIncrement' => null],
        'ciclonumb' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '11 - NUMERO DE CCICLOS DEL PROGRAMA PCR', 'precision' => null, 'fixed' => null],
        'seqtech' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '12 - ', 'precision' => null, 'fixed' => null],
        'accnumb' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '13 - ', 'precision' => null, 'fixed' => null],
        'othername' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '14 - ', 'precision' => null, 'fixed' => null],
        'seqsize' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '15 - NÚMERO DE NUCLEÓTIDOS QUE CONFORMAN LA SECUENCIA', 'precision' => null, 'autoIncrement' => null],
        'datamatrix' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '16 - ', 'precision' => null, 'fixed' => null],
        'fragsizemeth' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '17 - MARCADOR DE PESO MOLECULAR USADO', 'precision' => null, 'fixed' => null],
        'repnumb' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '18 - ', 'precision' => null, 'fixed' => null],
        'location' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '19 - ', 'precision' => null, 'autoIncrement' => null],
        'respname' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '20 - PERSONAL RESPONSABLE EN REALIZAR LA CARACTERIZACIÓN', 'precision' => null, 'fixed' => null],
        'markerdescrip' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '21 - POSICIÓN DEL MARCADOR, INTERVALO DE UNA SECUENCIA DENTRO DEL GENOMA O GENOMA COMPLETO', 'precision' => null, 'fixed' => null],
        'platform' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '22 - EN QUE EQUIPO SE TRABAJO LA CORRIDA DE ELECTROFORESIS', 'precision' => null, 'fixed' => null],
        'remarks' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '23 - PARA AÑADIR NOTAS, OBSERVACIÓN O PARA COMPLETAR DATOS FALTANTES ', 'precision' => null, 'fixed' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'status' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'resource_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_genotypic_resource_idx' => ['type' => 'index', 'columns' => ['resource_id'], 'length' => []],
            'fk_genotypic_collection1_idx' => ['type' => 'index', 'columns' => ['colname'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_genotypic_collection1' => ['type' => 'foreign', 'columns' => ['colname'], 'references' => ['collection', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_genotypic_resource1' => ['type' => 'foreign', 'columns' => ['resource_id'], 'references' => ['resource', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'accenumb' => 'Lorem ipsum dolor sit amet',
            'molmarker' => 1,
            'restenzymuse' => 1,
            'restenzymname' => 'Lorem ipsum dolor sit amet',
            'adaptrnum' => 1,
            'project' => 'Lorem ipsum dolor sit amet',
            'projcode' => 'Lorem ipsum dolor sit amet',
            'primernum' => 1,
            'ciclonumb' => 'Lorem ipsum dolor sit amet',
            'seqtech' => 'Lorem ipsum dolor sit amet',
            'accnumb' => 'Lorem ipsum dolor sit amet',
            'othername' => 'Lorem ipsum dolor sit amet',
            'seqsize' => 1,
            'datamatrix' => 'Lorem ipsum dolor sit amet',
            'fragsizemeth' => 'Lorem ipsum dolor sit amet',
            'repnumb' => 'Lorem ipsum dolor sit amet',
            'location' => 1,
            'respname' => 'Lorem ipsum dolor sit amet',
            'markerdescrip' => 'Lorem ipsum dolor sit amet',
            'platform' => 'Lorem ipsum dolor sit amet',
            'remarks' => 'Lorem ipsum dolor sit amet',
            'created' => '2017-07-07 04:09:13',
            'modified' => '2017-07-07 04:09:13',
            'status' => 1,
            'resource_id' => 1
        ],
    ];
}
