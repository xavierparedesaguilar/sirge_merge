<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PassportZooFixture
 *
 */
class PassportZooFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'passport_zoo';

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
        'colname' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - NOMBRE DE LA COLECCIÓN QUE PERTENECE LA ACCESIÓN', 'precision' => null, 'autoIncrement' => null],
        'genus' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - NOMBRE DEL GÉNERO DEL TAXON.', 'precision' => null, 'fixed' => null],
        'species' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - PORCIÓN DEL EPITETO ESPECÍFICO DL NOMBRE CIENTÍFICO EN MINÚSCULA. SOLO ES PERMITIDO LA ABREVIACIÓN sp. ', 'precision' => null, 'fixed' => null],
        'husbname' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - NOMBRE COMÚN DE LA ESPECIE', 'precision' => null, 'fixed' => null],
        'spauthor' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - NOMBRE DEL AUTOR(es) DE LA ESPECIE ', 'precision' => null, 'fixed' => null],
        'subtaxa' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - PROVEER ALGÚN IDENTIFICADOR TAXONOMICO ADICIONAL', 'precision' => null, 'fixed' => null],
        'subtauthor' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - NOMBRE DEL AUTOR(es) DEL SUBTAXON ', 'precision' => null, 'fixed' => null],
        'racetype' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - TIPO DE RAZA DEL ANIMAL', 'precision' => null, 'fixed' => null],
        'storage' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'MULTICROP - TIPO DE PRESERVACION DEL MATERIAL', 'precision' => null, 'autoIncrement' => null],
        'acqdate' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => 'MULTICROP - FECHA DE INGRESO AL BANCO', 'precision' => null],
        'eea' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - NOMBRE DE LA ESTACIÓN EXPERIMENTAL DONDE SE CONSERVA LA ACCESION', 'precision' => null, 'autoIncrement' => null],
        'eeaproc' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - NOMBRE DE LA ESTACIÓN EXPERIMENTAL DE PROCEDENCIA', 'precision' => null, 'autoIncrement' => null],
        'availability' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - DISPONIBILIDAD DEL LOTE DE LA ACCESIÓN', 'precision' => null, 'autoIncrement' => null],
        'collsite' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - INFORMACIÓN SOBRE LA UBICACIÓN  DONDE SE RECOLECCTO LA ACCESIÓN', 'precision' => null, 'fixed' => null],
        'latitude' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - LATITUD DEL SISTIO DE RECOLECCIÓN EN COORDENADAS DECIMALES', 'precision' => null, 'fixed' => null],
        'longitude' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - LONGITUD DEL SISTIO DE RECOLECCIÓN EN COORDENADAS DECIMALES', 'precision' => null, 'fixed' => null],
        'elevation' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - ELEVACIÓN DEL SITIO DE RECOLECCIÓN', 'precision' => null, 'fixed' => null],
        'coorddatum' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'MULTICROP - TIPO DE DATOS DE SISTEMA DE REFERENCIA ESPACIAL ', 'precision' => null, 'autoIncrement' => null],
        'georefmeth' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'MULTICROP - EL MÉTODO DE GEORREFERENCIACIÓN UTILIZADO', 'precision' => null, 'autoIncrement' => null],
        'accimag1' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - FOTOGRAFIA DE LA ACCESIÓN 1', 'precision' => null, 'fixed' => null],
        'accimag2' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - FOTOGRAFIA DE LA ACCESIÓN 2', 'precision' => null, 'fixed' => null],
        'accimag3' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - FOTOGRAFIA DE LA ACCESIÓN 3', 'precision' => null, 'fixed' => null],
        'accimag4' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - FOTOGRAFIA DE LA ACCESIÓN 4', 'precision' => null, 'fixed' => null],
        'remarks1' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - DESCRIPCIÓN IMAGEN 1', 'precision' => null, 'fixed' => null],
        'remarks2' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - DESCRIPCIÓN IMAGEN 2', 'precision' => null, 'fixed' => null],
        'remarks3' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - DESCRIPCIÓN IMAGEN 3', 'precision' => null, 'fixed' => null],
        'remarks4' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - DESCRIPCIÓN IMAGEN 4', 'precision' => null, 'fixed' => null],
        'collcode' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - CÓDIGO DE IDENTIFICACIÓN QUE SE LE ASIGNA A LA INSTITUCION QUE HACE LA COLECTA', 'precision' => null, 'fixed' => null],
        'collname' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - NOMBRE DE LA INSTITUCIÓN QUE COLECTA', 'precision' => null, 'fixed' => null],
        'colladdress' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - DIRECCIÓN DE LA INSTITUCIÓN QUE COLECTA', 'precision' => null, 'fixed' => null],
        'collmissind' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - SE INDICARA SI LA COLECTA HA SIDO REALIZADA A TRAVÉZ DE UN PROYECTO O CONVENIO', 'precision' => null, 'fixed' => null],
        'localname' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - NOMBRE COMÚN CON LA QUE SE CONOCE AL MATERIAL RECOLECTADO EN SU ZONA DE COLECCIÓN', 'precision' => null, 'fixed' => null],
        'colldate' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => 'MULTICROP - FECHA EN LA QUE FUE COLECTADA EL MATERIAL GENETICO', 'precision' => null],
        'sampstat' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'MULTICROP - CONDICIÓN BIOLOGICA', 'precision' => null, 'autoIncrement' => null],
        'collsrc' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'MULTICROP - FUENTE DE RECOLECCIÓN  DEL MATERIAL', 'precision' => null, 'autoIncrement' => null],
        'collsrcdet' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - DETALLE  DE LA FUENTE DE RECOLECCIÓN', 'precision' => null, 'autoIncrement' => null],
        'groupethnic' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - NOMBRE DEL PUEBLO INDIGENA DEL LUGAR DE LA COLECTA', 'precision' => null, 'fixed' => null],
        'datebirth' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - FECHA QUE NACIÓ EL ANIMAL', 'precision' => null],
        'dateofdec' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - FECHA QUE MURIÓ EL ANIMAL', 'precision' => null],
        'samptype' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - PARTE DEL ANIMAL COLECTADA', 'precision' => null, 'fixed' => null],
        'sampling' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - METODOLOGIA DE MUESTREO QUE FUE REALIZADO AL AZAR O USANDO OTRO METODO', 'precision' => null, 'fixed' => null],
        'anuspart' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - CORRESPONDE A LAS PARTES UTILES DEL ANIMAL QUE SON UTILIZADAS POR  LOS POBLADORES CON ALGÚN FIN ESPECIFICO', 'precision' => null, 'fixed' => null],
        'uso' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - DIFERENTES USOS QUE SE REALIZA CON EL ANIMAL
SE PASO DE \'USE\' A \'USO\' POR MOTIVO DE SER PALABRA RESERVADA EN MYSQL.', 'precision' => null, 'fixed' => null],
        'pathogen' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - PRESENCIA DE PLAGAS O ENFERMEDADES QUE SE PRESENTA EN EL ANIMAL COLECTADO', 'precision' => null, 'fixed' => null],
        'poparea' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - INDICAR EL METRAJE DONDE SE ENCUETRA LA MUESTRA', 'precision' => null, 'fixed' => null],
        'humidity' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - TEMPERATURA DE LA CONDICION CLIMATICA', 'precision' => null, 'fixed' => null],
        'temp' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - HUMEDAD DE LA CONDICION CLIMATICA', 'precision' => null, 'fixed' => null],
        'presure' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - LA PRESIÓN ATMOSFÉRICA ES LA FUERZA POR UNIDAD DE ÁREA QUE EJERCE EL AIRE SOBRE LA SUPERFICIE TERRESTRE. ', 'precision' => null, 'fixed' => null],
        'precipitation' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - CAÍDA DE AGUA SÓLIDA O LÍQUIDA DEBIDO A LA CONDENSACIÓN DEL VAPOR SOBRE LA SUPERFICIE TERRESTRE', 'precision' => null, 'fixed' => null],
        'mancest' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - NUMERO DE LA ACCESIÓN DEL ANCESTRO MATERNO', 'precision' => null, 'fixed' => null],
        'pancest' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - NUMERO DE LA ACCESIÓN DEL ANCESTRO PATERNO', 'precision' => null, 'fixed' => null],
        'ancest' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - DESCRIPCIÓN QUE CONTENGA INFORMACIÓN DE LOS ANCESTROS', 'precision' => null, 'fixed' => null],
        'owname' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - NOMBRE DEL CRIADOR DEL CUAL SE OBTUVO LA ACCESIÓN COLECTADA', 'precision' => null, 'fixed' => null],
        'owaddress' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - DIRECCIÓN DELCRIADOR DEL CUAL SE OBTUVO LA ACCESIÓN COLECTADA', 'precision' => null, 'fixed' => null],
        'donorcore' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - CODIGO DADO AL INSTITUTO DONANTE', 'precision' => null, 'fixed' => null],
        'donorname' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - NOMBRE DEL DONANTE', 'precision' => null, 'fixed' => null],
        'donaddress' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - DIRECCIÓN DEL DONANTE', 'precision' => null, 'fixed' => null],
        'mlsstat' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'MULTICROP - EL ESTATUS DE UNA  ACCESIÓN CON RESPECTO AL SISTEMA MULTILATERAL (MLS)  (SI/NO)', 'precision' => null, 'autoIncrement' => null],
        'patent' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - EL ANIMAL ESTÁ REGISTRADO EN UNA PATENTE', 'precision' => null, 'fixed' => null],
        'bredcode' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - CODIGO DEL INSTITUTO EN QUE EL MATERIAL HA SIDO CRUZADO', 'precision' => null, 'fixed' => null],
        'bredname' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - NOMBRE DEL INSTITUTO (O PERSONA) QUE CRIÓ EL MATERIAL', 'precision' => null, 'fixed' => null],
        'duplinstname' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - NOMBRE  DEL CENTRO DONDE SE MANTIENEN DUPLICADOS DE SEGURIDAD DE CADA ACCESIÓN', 'precision' => null, 'fixed' => null],
        'duplsite' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - DIRECCION DEL CENTRO DONDE SE MANTIENEN DUPLICADOS DE SEGURIDAD DE CADA ACCESIÓN', 'precision' => null, 'fixed' => null],
        'bdna' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - SI LA ACCESIÓN SE CUENTRA ALMACENADA EN EL BANCO DE ADN', 'precision' => null, 'autoIncrement' => null],
        'remarks' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - PARA AÑADIR NOTAS O PARA COMPLETAR DATOS FALTANTES DE LA ACCESIÓN', 'precision' => null],
        'passport_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_passport_zoo_passport1_idx' => ['type' => 'index', 'columns' => ['passport_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_passport_zoo_passport1' => ['type' => 'foreign', 'columns' => ['passport_id'], 'references' => ['passport', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'colname' => 1,
            'genus' => 'Lorem ipsum dolor sit amet',
            'species' => 'Lorem ipsum dolor sit amet',
            'husbname' => 'Lorem ipsum dolor sit amet',
            'spauthor' => 'Lorem ipsum dolor sit amet',
            'subtaxa' => 'Lorem ipsum dolor sit amet',
            'subtauthor' => 'Lorem ipsum dolor sit amet',
            'racetype' => 'Lorem ipsum dolor sit amet',
            'storage' => 1,
            'acqdate' => '2017-08-21',
            'eea' => 1,
            'eeaproc' => 1,
            'availability' => 1,
            'collsite' => 'Lorem ipsum dolor sit amet',
            'latitude' => 'Lorem ipsum dolor sit amet',
            'longitude' => 'Lorem ipsum dolor sit amet',
            'elevation' => 'Lorem ipsum dolor sit amet',
            'coorddatum' => 1,
            'georefmeth' => 1,
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
            'colladdress' => 'Lorem ipsum dolor sit amet',
            'collmissind' => 'Lorem ipsum dolor sit amet',
            'localname' => 'Lorem ipsum dolor sit amet',
            'colldate' => '2017-08-21',
            'sampstat' => 1,
            'collsrc' => 1,
            'collsrcdet' => 1,
            'groupethnic' => 'Lorem ipsum dolor sit amet',
            'datebirth' => '2017-08-21',
            'dateofdec' => '2017-08-21',
            'samptype' => 'Lorem ipsum dolor sit amet',
            'sampling' => 'Lorem ipsum dolor sit amet',
            'anuspart' => 'Lorem ipsum dolor sit amet',
            'uso' => 'Lorem ipsum dolor sit amet',
            'pathogen' => 'Lorem ipsum dolor sit amet',
            'poparea' => 'Lorem ipsum dolor sit amet',
            'humidity' => 'Lorem ipsum dolor sit amet',
            'temp' => 'Lorem ipsum dolor sit amet',
            'presure' => 'Lorem ipsum dolor sit amet',
            'precipitation' => 'Lorem ipsum dolor sit amet',
            'mancest' => 'Lorem ipsum dolor sit amet',
            'pancest' => 'Lorem ipsum dolor sit amet',
            'ancest' => 'Lorem ipsum dolor sit amet',
            'owname' => 'Lorem ipsum dolor sit amet',
            'owaddress' => 'Lorem ipsum dolor sit amet',
            'donorcore' => 'Lorem ipsum dolor sit amet',
            'donorname' => 'Lorem ipsum dolor sit amet',
            'donaddress' => 'Lorem ipsum dolor sit amet',
            'mlsstat' => 1,
            'patent' => 'Lorem ipsum dolor sit amet',
            'bredcode' => 'Lorem ipsum dolor sit amet',
            'bredname' => 'Lorem ipsum dolor sit amet',
            'duplinstname' => 'Lorem ipsum dolor sit amet',
            'duplsite' => 'Lorem ipsum dolor sit amet',
            'bdna' => 1,
            'remarks' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'passport_id' => 1,
            'created' => '2017-08-21 14:27:22',
            'modified' => '2017-08-21 14:27:22'
        ],
    ];
}
