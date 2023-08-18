<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PassportFitoFixture
 *
 */
class PassportFitoFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'passport_fito';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'subtype' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - SUBTIPO DE RECURSO', 'precision' => null, 'autoIncrement' => null],
        'collnumb' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - CÓDIGO ASIGNADO POR EL RECOLECTOR DE LA MUESTRA', 'precision' => null, 'fixed' => null],
        'spauthor' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - INDICA EL NOMBRE DEL AUTOR DE LA ESPECIE', 'precision' => null, 'fixed' => null],
        'subtaxa' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - PROVEER ALGÚN IDENTIFICADOR TAXONOMICO ADICIONAL', 'precision' => null, 'fixed' => null],
        'subtauthor' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - NOMBRE(s) del AUTOR(es) DEL SUBTAXON', 'precision' => null, 'fixed' => null],
        'storage' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'MULTICROP - TIPO DE ALMACENAMIENTOS DEL MATERIAL', 'precision' => null, 'autoIncrement' => null],
        'acqdate' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => 'MULTICROP - FECHA EN LA QUE SE INCORPORO LA ACCESIÓN A LA COLECCIÓN', 'precision' => null],
        'availability' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - DISPONIBILIDAD DEL LOTE DE LA ACCESIÓN (SI/NO)', 'precision' => null, 'autoIncrement' => null],
        'collsite' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - INFORMACIÓN SOBRE LA UBICACIÓN DEL LUGAR  DONDE SE RECOLECCTO LA ACCESIÓN', 'precision' => null, 'fixed' => null],
        'latitude' => ['type' => 'decimal', 'length' => 10, 'precision' => 5, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'MULTICROP - LATITUD DEL SISTIO DE RECOLECCIÓN EN COORDENADAS DECIMALES'],
        'longitude' => ['type' => 'decimal', 'length' => 10, 'precision' => 5, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'MULTICROP - LONGITUD DEL SISTIO DE RECOLECCIÓN EN COORDENADAS DECIMALES'],
        'elevation' => ['type' => 'decimal', 'length' => 10, 'precision' => 5, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'MULTICROP - ELEVACIÓN DEL SITIO DE RECOLECCIÓN'],
        'coorddatum' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'MULTICROP - TIPO DE DATOS DE SISTEMA DE REFERENCIA ESPACIAL', 'precision' => null, 'autoIncrement' => null],
        'georefmeth' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'MULTICROP - EL MÉTODO DE GEORREFERENCIACIÓN UTILIZADO', 'precision' => null, 'autoIncrement' => null],
        'coorduncert' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - INCERTIDUMBRE ASOCIADA A LAS COORDENADAS EN METROS.', 'precision' => null, 'fixed' => null],
        'accimag1' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - FOTOGRAFIA DE LA ACCESIÓN 1', 'precision' => null, 'fixed' => null],
        'accimag2' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - FOTOGRAFIA DE LA ACCESIÓN 2', 'precision' => null, 'fixed' => null],
        'accimag3' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - FOTOGRAFIA DE LA ACCESIÓN 3', 'precision' => null, 'fixed' => null],
        'accimag4' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - FOTOGRAFIA DE LA ACCESIÓN 4', 'precision' => null, 'fixed' => null],
        'remarks1' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - DESCRIPCIÓN IMAGEN 1', 'precision' => null, 'fixed' => null],
        'remarks2' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - DESCRIPCIÓN IMAGEN 2', 'precision' => null, 'fixed' => null],
        'remarks3' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - DESCRIPCIÓN IMAGEN 3', 'precision' => null, 'fixed' => null],
        'remarks4' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - DESCRIPCIÓN IMAGEN 4', 'precision' => null, 'fixed' => null],
        'collcode' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - CODIGO DEL INSTITUTO QUE RECOLECTA LA MUESTRA', 'precision' => null, 'fixed' => null],
        'collname' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - NOMBRE DEL INSTITUTO QUE RECOLECTA LA MUESTRA', 'precision' => null, 'fixed' => null],
        'collinstaddress' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - DIRECCIÓN DEL INSTITUTO QUE RECOGE LA MUESTRA', 'precision' => null, 'fixed' => null],
        'collmissind' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - IDENTIFICADOR DE LA MISIÓN DE RECOLECCIÓN UTILIZADA POR EL INSTITUTO DE RECOLECCIÓN', 'precision' => null, 'fixed' => null],
        'collsrc' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'MULTICROP - FUENTE DE RECOLECCIÓN  DEL MATERIAL', 'precision' => null, 'autoIncrement' => null],
        'collsrcdet' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - DETALLE  DE LA FUENTE DE RECOLECCIÓN', 'precision' => null, 'autoIncrement' => null],
        'sampstat' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'MULTICROP - CONDICIÓN BIOLOGICA', 'precision' => null, 'autoIncrement' => null],
        'colldate' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => 'MULTICROP - FECHA DE RECOLECCIÓN DE LA MUESTRA', 'precision' => null],
        'localname' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - NOMBRE COMÚN CON LA QUE SE CONOCE AL MATERIAL RECOLECTADO EN SU ZONA DE COLECCIÓN', 'precision' => null, 'fixed' => null],
        'groupethnic' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - NOMBRE DEL PUEBLO INDIGENA DEL LUGAR DE LA COLECTA', 'precision' => null, 'fixed' => null],
        'samptype' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - PARTE DE LA PLANTA COLECTADA', 'precision' => null, 'autoIncrement' => null],
        'sampsize' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - NUMERO DE PLANTAS MUESTREADAS', 'precision' => null, 'autoIncrement' => null],
        'sampling' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - SI EL MUESTREO FUE REALIZADO AL AZAR O USANDO OTRO METODO', 'precision' => null, 'fixed' => null],
        'plauspart' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - PARTES UTILES DE LA PLANTA QUE SON UTILIZADAS POR LOS POBLADORES', 'precision' => null, 'autoIncrement' => null],
        'uso' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - USOS  QUE SE REALIZA CON LA PLANTA (ANTERIOR USE, SE MODIFICO POR CONFLICTO POR SER PALABRA RESERVADA).', 'precision' => null, 'autoIncrement' => null],
        'poparea' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - INDICAR EL AREA DONDE SE ENCUETRA LA MUESTRA (M2)', 'precision' => null, 'fixed' => null],
        'pathogen' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - PRESENCIA DE PLAGAS O ENFERMEDADES QUE PRESENTE EN LA MUESTRA', 'precision' => null, 'fixed' => null],
        'donorcore' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - CODIGO DADO AL INSTITUTO DONANTE', 'precision' => null, 'fixed' => null],
        'donorname' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - NOMBRE DEL DONANTE', 'precision' => null, 'fixed' => null],
        'donaddress' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - DIRECCIÓN DEL DONANTE', 'precision' => null, 'fixed' => null],
        'donornumb' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - CODIGO  ASIGNADO A UNA ACCESIÓN POR EL DONANTE', 'precision' => null, 'fixed' => null],
        'humidity' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - TEMPERATURA DE LA CONDICION CLIMATICA', 'precision' => null, 'fixed' => null],
        'temp' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - HUMEDAD DE LA CONDICION CLIMATICA', 'precision' => null, 'fixed' => null],
        'presure' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - LA PRESIÓN ATMOSFÉRICA ES LA FUERZA POR UNIDAD DE ÁREA QUE EJERCE EL AIRE SOBRE LA SUPERFICIE TERRESTRE. ', 'precision' => null, 'fixed' => null],
        'precipitation' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - CAÍDA DE AGUA SÓLIDA O LÍQUIDA DEBIDO A LA CONDENSACIÓN DEL VAPOR SOBRE LA SUPERFICIE TERRESTRE', 'precision' => null, 'fixed' => null],
        'soiltext' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - FORMA QUE SE ENCUENTRA DISTRIBUIDO EL SUELOS', 'precision' => null, 'autoIncrement' => null],
        'soilped' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - TIPO DE PEDREGOSIDAD', 'precision' => null, 'autoIncrement' => null],
        'soilcol' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - COLOR DEL SUELO', 'precision' => null, 'autoIncrement' => null],
        'soilph' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - ACIDEZ O LA ALCALINIDAD DEL SUELO', 'precision' => null, 'autoIncrement' => null],
        'soilrel' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - INDICAR EL TIPO DE RELIEVE DEL SUELO', 'precision' => null, 'fixed' => null],
        'mancest' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - NUMERO DE LA ACCESIÓN DEL ANCESTRO MATERNO', 'precision' => null, 'fixed' => null],
        'pancest' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - NUMERO DE LA ACCESIÓN DEL ANCESTRO PATERNO', 'precision' => null, 'fixed' => null],
        'ancest' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - DESCRIPCIÓN QUE CONTENGA INFORMACIÓN DE LOS ANCESTROS', 'precision' => null, 'fixed' => null],
        'mlsstat' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'MULTICROP - EL ESTATUS DE UNA  ACCESIÓN CON RESPECTO AL SISTEMA MULTILATERAL (MLS)  (SI/NO)', 'precision' => null, 'autoIncrement' => null],
        'patent' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - LA PLANTA ESTÁ REGISTRADO EN UNA PATENTE', 'precision' => null, 'fixed' => null],
        'bredcode' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - CODIGO DEL INSTITUTO EN QUE EL MATERIAL HA SIDO CRUZADO', 'precision' => null, 'fixed' => null],
        'bredname' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - NOMBRE DEL INSTITUTO (O PERSONA) QUE CRIÓ EL MATERIAL', 'precision' => null, 'fixed' => null],
        'duplinstname' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - NOMBRE DEL INSTITUTO DONDE SE CONSERVA UN NDUPLICADO DE SEGURIDAD DE LA ACCESIÓN', 'precision' => null, 'fixed' => null],
        'duplsite' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - DIRECCION DEL INSTITUTO DONDE SE MANTIENE UN DUPLICADO DE SEGURIDAD DE LA ACCESIÓN ', 'precision' => null, 'fixed' => null],
        'invitro' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - SI LA ACCESIÓN SE CUENTRA ALMACENADA EN EL BANCO DE IN VITRO', 'precision' => null, 'autoIncrement' => null],
        'bseed' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - SI LA ACCESIÓN SE CUENTRA ALMACENADA EN EL BANCO DE SEMILLAS', 'precision' => null, 'autoIncrement' => null],
        'bfield' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - SI LA ACCESIÓN SE CUENTRA ALMACENADA EN EL BANCO DE CAMPO', 'precision' => null, 'autoIncrement' => null],
        'insitu' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - SI LA ACCESIÓN SE CUENTRA ALMACENADA EN CONSERVACIÓN IN SITU', 'precision' => null, 'fixed' => null],
        'bdna' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - SI LA ACCESIÓN SE CUENTRA ALMACENADA EN EL BANCO DE ADN', 'precision' => null, 'autoIncrement' => null],
        'remarks' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - PARA AÑADIR NOTAS, OBSERVACIÓN O PARA COMPLETAR DATOS FALTANTES DE LA ACCESIÓN', 'precision' => null],
        'passport_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_passport_fito_passport1_idx' => ['type' => 'index', 'columns' => ['passport_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_passport_fito_passport1' => ['type' => 'foreign', 'columns' => ['passport_id'], 'references' => ['passport', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'subtype' => 1,
            'collnumb' => 'Lorem ipsum dolor sit amet',
            'spauthor' => 'Lorem ipsum dolor sit amet',
            'subtaxa' => 'Lorem ipsum dolor sit amet',
            'subtauthor' => 'Lorem ipsum dolor sit amet',
            'storage' => 1,
            'acqdate' => '2017-08-21',
            'availability' => 1,
            'collsite' => 'Lorem ipsum dolor sit amet',
            'latitude' => 1.5,
            'longitude' => 1.5,
            'elevation' => 1.5,
            'coorddatum' => 1,
            'georefmeth' => 1,
            'coorduncert' => 'Lorem ipsum dolor sit amet',
            'accimag1' => 'Lorem ipsum dolor sit amet',
            'accimag2' => 'Lorem ipsum dolor sit amet',
            'accimag3' => 'Lorem ipsum dolor sit amet',
            'accimag4' => 'Lorem ipsum dolor sit amet',
            'remarks1' => 'Lorem ipsum dolor sit amet',
            'remarks2' => 'Lorem ipsum dolor sit amet',
            'remarks3' => 'Lorem ipsum dolor sit amet',
            'remarks4' => 'Lorem ipsum dolor sit amet',
            'collcode' => 'Lorem ipsum dolor sit amet',
            'collname' => 'Lorem ipsum dolor sit amet',
            'collinstaddress' => 'Lorem ipsum dolor sit amet',
            'collmissind' => 'Lorem ipsum dolor sit amet',
            'collsrc' => 1,
            'collsrcdet' => 1,
            'sampstat' => 1,
            'colldate' => '2017-08-21',
            'localname' => 'Lorem ipsum dolor sit amet',
            'groupethnic' => 'Lorem ipsum dolor sit amet',
            'samptype' => 1,
            'sampsize' => 1,
            'sampling' => 'Lorem ipsum dolor sit amet',
            'plauspart' => 1,
            'uso' => 1,
            'poparea' => 'Lorem ipsum dolor sit amet',
            'pathogen' => 'Lorem ipsum dolor sit amet',
            'donorcore' => 'Lorem ipsum dolor sit amet',
            'donorname' => 'Lorem ipsum dolor sit amet',
            'donaddress' => 'Lorem ipsum dolor sit amet',
            'donornumb' => 'Lorem ipsum dolor sit amet',
            'humidity' => 'Lorem ipsum dolor sit amet',
            'temp' => 'Lorem ipsum dolor sit amet',
            'presure' => 'Lorem ipsum dolor sit amet',
            'precipitation' => 'Lorem ipsum dolor sit amet',
            'soiltext' => 1,
            'soilped' => 1,
            'soilcol' => 1,
            'soilph' => 1,
            'soilrel' => 'Lorem ipsum dolor sit amet',
            'mancest' => 'Lorem ipsum dolor sit amet',
            'pancest' => 'Lorem ipsum dolor sit amet',
            'ancest' => 'Lorem ipsum dolor sit amet',
            'mlsstat' => 1,
            'patent' => 'Lorem ipsum dolor sit amet',
            'bredcode' => 'Lorem ipsum dolor sit amet',
            'bredname' => 'Lorem ipsum dolor sit amet',
            'duplinstname' => 'Lorem ipsum dolor sit amet',
            'duplsite' => 'Lorem ipsum dolor sit amet',
            'invitro' => 1,
            'bseed' => 1,
            'bfield' => 1,
            'insitu' => 'Lorem ipsum dolor sit amet',
            'bdna' => 1,
            'remarks' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'passport_id' => 1,
            'created' => '2017-08-21 12:45:46',
            'modified' => '2017-08-21 12:45:46'
        ],
    ];
}
