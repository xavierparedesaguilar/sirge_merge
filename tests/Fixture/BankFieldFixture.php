<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BankFieldFixture
 *
 */
class BankFieldFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'bank_field';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'expcode' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'bank_availability' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'sowsamptype' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - TIPO DE MUESTRA QUE SE UTILIZARA PARA LA SIEMBRA', 'precision' => null, 'autoIncrement' => null],
        'objective' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL -  FINALIDAD DEL EXPERIMENTO', 'precision' => null, 'autoIncrement' => null],
        'startdate' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - FECHA QUE SE INICIA EL EXPERIMENTO', 'precision' => null],
        'enddate' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - FECHA QUE SE TERMINA  EL EXPERIMENTO', 'precision' => null],
        'researcher' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - NOMBRE DEL INVESTIGADOR RESPONSABLE DEL PROYECTO', 'precision' => null, 'fixed' => null],
        'proyect' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - SEGÚN FUENTE DE FINANCIAMIENTO  DEL PROYECTO', 'precision' => null, 'fixed' => null],
        'design' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - DISEÑO DEL EXPERIMENTO', 'precision' => null, 'fixed' => null],
        'fieldsize' => ['type' => 'decimal', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - AREA EN M2 DE CADA PARCELA'],
        'plotsize' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - NUMERO DE PLANTAS POR PARCELA', 'precision' => null, 'autoIncrement' => null],
        'treatment' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - DETALLE DE LOS TRATAMIENTO  APLICADOS EN EL EXPERIMENTO', 'precision' => null, 'fixed' => null],
        'reps' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - NUMERO DE REPETICIONES POR TRATAMIENTO', 'precision' => null, 'autoIncrement' => null],
        'fieldmap' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - IMAGEN DEL CROQUIS DEL CAMPO', 'precision' => null, 'fixed' => null],
        'image1' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - IMAGEN DEL CAMPO', 'precision' => null, 'fixed' => null],
        'remarks1' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - DESCRIPCIÓN IMAGEN 1', 'precision' => null, 'fixed' => null],
        'dpto' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - NOMBRE DEL DEPARTAMENTO DONDE SE REALIZA EL EXPERIMENTO', 'precision' => null, 'autoIncrement' => null],
        'prov' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - NOMBRE DEL PROVINCIA DONDE SE SE REALIZA EL EXPERIMENTO', 'precision' => null, 'autoIncrement' => null],
        'dist' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - NOMBRE DEL DISTRITO DONDE SE SE REALIZA EL EXPERIMENTO', 'precision' => null, 'autoIncrement' => null],
        'locality' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - NOMBRE DE LA LOCALIDAD DONDE SE REALIZA EL EXPERIMENTO', 'precision' => null, 'fixed' => null],
        'eea' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - NOMBRE DE LA ESTACIÓN EXPERIMENTAL DONDE SE CONSERVA LA ACCESION', 'precision' => null, 'autoIncrement' => null],
        'field' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - CODIGO O DESCRIPCION DEL CAMPO', 'precision' => null, 'fixed' => null],
        'latitude' => ['type' => 'decimal', 'length' => 10, 'precision' => 5, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'MULTICROP - LATITUD DEL SISTIO DE RECOLECCIÓN EN COORDENADAS DECIMALES'],
        'longitude' => ['type' => 'decimal', 'length' => 10, 'precision' => 5, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'MULTICROP - LONGITUD DEL SISTIO DE RECOLECCIÓN EN COORDENADAS DECIMALES'],
        'elevation' => ['type' => 'decimal', 'length' => 10, 'precision' => 5, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'MULTICROP - ELEVACIÓN DEL SITIO DE RECOLECCIÓN'],
        'plotnumb' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - NUMERO DE IDENTIFICACIÓN  UNICO DE CADA MUESTRA SEMBRADA', 'precision' => null, 'autoIncrement' => null],
        'accenumb' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - CÓDIGO ACCESIÓN: CODIGO DE IDENTIFICACIÓN  LOCAL DE LA ACCESIÓN', 'precision' => null, 'fixed' => null],
        'othenumb' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - CODIGO ASIGNADO PARA EL MATERIAL', 'precision' => null, 'fixed' => null],
        'othername' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - IDENTIFICACIÓN DE LA MUESTRA', 'precision' => null, 'fixed' => null],
        'colname' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - NOMBRE DE LA COLECCIÓN', 'precision' => null, 'autoIncrement' => null],
        'genus' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - NOMBRE DEL GÉNERO DADO A LA ESPECIE', 'precision' => null, 'fixed' => null],
        'species' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'MULTICROP - PARTE ESPECIFICA DEL NOMBRE CIENTIFICO', 'precision' => null, 'autoIncrement' => null],
        'remarks' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - PARA AÑADIR NOTAS O PARA COMPLETAR DATOS FALTANTES', 'precision' => null, 'fixed' => null],
        'passport_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'status' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'detecnumb' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - CÓDIGO INTERNO PARA LA IDENTIFICACIÓN DE LA ACCESIÓN', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'fk_bank_field_passport1_idx' => ['type' => 'index', 'columns' => ['passport_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_bank_field_passport1' => ['type' => 'foreign', 'columns' => ['passport_id'], 'references' => ['passport', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'expcode' => 'Lorem ipsum dolor sit amet',
            'bank_availability' => 1,
            'sowsamptype' => 1,
            'objective' => 1,
            'startdate' => '2017-08-25',
            'enddate' => '2017-08-25',
            'researcher' => 'Lorem ipsum dolor sit amet',
            'proyect' => 'Lorem ipsum dolor sit amet',
            'design' => 'Lorem ipsum dolor sit amet',
            'fieldsize' => 1.5,
            'plotsize' => 1,
            'treatment' => 'Lorem ipsum dolor sit amet',
            'reps' => 1,
            'fieldmap' => 'Lorem ipsum dolor sit amet',
            'image1' => 'Lorem ipsum dolor sit amet',
            'remarks1' => 'Lorem ipsum dolor sit amet',
            'dpto' => 1,
            'prov' => 1,
            'dist' => 1,
            'locality' => 'Lorem ipsum dolor sit amet',
            'eea' => 1,
            'field' => 'Lorem ipsum dolor sit amet',
            'latitude' => 1.5,
            'longitude' => 1.5,
            'elevation' => 1.5,
            'plotnumb' => 1,
            'accenumb' => 'Lorem ipsum dolor sit amet',
            'othenumb' => 'Lorem ipsum dolor sit amet',
            'othername' => 'Lorem ipsum dolor sit amet',
            'colname' => 1,
            'genus' => 'Lorem ipsum dolor sit amet',
            'species' => 1,
            'remarks' => 'Lorem ipsum dolor sit amet',
            'passport_id' => 1,
            'created' => '2017-08-25 11:26:50',
            'modified' => '2017-08-25 11:26:50',
            'status' => 1,
            'detecnumb' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
