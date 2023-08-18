<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PassportMicroFixture
 *
 */
class PassportMicroFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'passport_micro';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'subtype' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - SUBTIPO DE RECURSO', 'precision' => null, 'autoIncrement' => null],
        'collnumb' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - NUMERO ASIGNADO POR EL RECOLECTOR DE LA MUESTRA', 'precision' => null, 'fixed' => null],
        'colname' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - NOMBRE DE LA COLECCIÓN', 'precision' => null, 'autoIncrement' => null],
        'genus' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - NOMBRE DEL GÉNERO DADO AL TAXON', 'precision' => null, 'fixed' => null],
        'species' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - PARTE ESPECIFICA DEL NOMBRE CIENTIFICO', 'precision' => null, 'fixed' => null],
        'commonname' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - NOMBRE CÓMUN DE LA ESPECIE CULTIVADA', 'precision' => null, 'fixed' => null],
        'spauthor' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - INDICA EL NOMBRE(s) DEL AUTOR(es) DEL NOMBRE ESPECIFICO', 'precision' => null, 'fixed' => null],
        'subtaxa' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - PROVEER ALGÚN IDENTIFICADOR TAXONOMICO ADICIONAL', 'precision' => null, 'fixed' => null],
        'subtauthor' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - NOMBRE(s) del AUTOR(es) DEL SUBTAXON', 'precision' => null, 'fixed' => null],
        'strain' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - INDICAR EL NOMBRE DE LA CEPA', 'precision' => null, 'fixed' => null],
        'storage' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'MULTICROP - TIPO DE PRESERVACION DEL MATERIAL ', 'precision' => null, 'autoIncrement' => null],
        'acqdate' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => 'MULTICROP - FECHA EN LA QUE SE INCORPORO LA ACCESIÓN A LA COLECCIÓN', 'precision' => null],
        'eea' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - NOMBRE DE LA ESTACIÓN EXPERIMENTAL DONDE SE CONSERVA LA ACCESION', 'precision' => null, 'autoIncrement' => null],
        'eeaproc' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - NOMBRE DE LA ESTACIÓN EXPERIMENTAL DE PROCEDENCIA', 'precision' => null, 'autoIncrement' => null],
        'availability' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - DISPONIBILIDAD DEL LOTE DE LA ACCESIÓN ', 'precision' => null, 'autoIncrement' => null],
        'collsite' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - INFORMACIÓN SOBRE LA UBICACIÓN DEL PAIS  DONDE SE RECOLECCTO LA ACCESIÓN', 'precision' => null, 'fixed' => null],
        'latitude' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - LATITUD DEL SISTIO DE RECOLECCIÓN EN COORDENADAS DECIMALES', 'precision' => null, 'fixed' => null],
        'longitude' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - LONGITUD DEL SISTIO DE RECOLECCIÓN EN COORDENADAS DECIMALES', 'precision' => null, 'fixed' => null],
        'elevation' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - ELEVACIÓN DEL SITIO DE RECOLECCIÓN', 'precision' => null, 'fixed' => null],
        'coorddatum' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'MULTICROP - TIPO DE DATOS DE SISTEMA DE REFERENCIA ESPACIAL ', 'precision' => null, 'autoIncrement' => null],
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
        'isosrc' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - INDICAR ELTIPO DE RECURSO  DEL QUE SE AISLO EL MICROORGANISMO O ESPECIE ASOCIADA', 'precision' => null, 'autoIncrement' => null],
        'sampstat' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'MULTICROP - CONDICIÓN BIOLOGICA', 'precision' => null, 'autoIncrement' => null],
        'colldate' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => 'MULTICROP - FECHA DE RECOLECCIÓN DE LA MUESTRA', 'precision' => null],
        'localname' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - NOMBRE COMÚN CON LA QUE SE CONOCE AL MATERIAL RECOLECTADO EN SU ZONA DE COLECCIÓN', 'precision' => null, 'fixed' => null],
        'groupethnic' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - NOMBRE DEL PUEBLO INDIGENA DEL LUGAR DE LA COLECTA', 'precision' => null, 'fixed' => null],
        'samptype' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - TIPO DE PROPALUGO  COLECTADO', 'precision' => null, 'fixed' => null],
        'sampsize' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - NUMERO DE INDIVIDUOS MUESTREADOS DURANTE LA COLECTA', 'precision' => null, 'fixed' => null],
        'sampling' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - METODOLOGIA DE MUESTREO', 'precision' => null, 'fixed' => null],
        'uso' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - DIFERENTES USOS  QUE SE REALIZA CON EL MICROORGANISMO O ESPECIE ASOCIADA
Se modifico "use" a "uso", por seruna palabra reservada de mysql.', 'precision' => null, 'fixed' => null],
        'humidity' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - TEMPERATURA DE LA CONDICION CLIMATICA', 'precision' => null, 'fixed' => null],
        'temp' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - HUMEDAD DE LA CONDICION CLIMATICA', 'precision' => null, 'fixed' => null],
        'presure' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - LA PRESIÓN ATMOSFÉRICA ES LA FUERZA POR UNIDAD DE ÁREA QUE EJERCE EL AIRE SOBRE LA SUPERFICIE TERRESTRE. ', 'precision' => null, 'fixed' => null],
        'precipitation' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - CAÍDA DE AGUA SÓLIDA O LÍQUIDA DEBIDO A LA CONDENSACIÓN DEL VAPOR SOBRE LA SUPERFICIE TERRESTRE', 'precision' => null, 'fixed' => null],
        'soiltext' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - FORMA QUE SE ENCUENTRA DISTRIBUIDO EL SUELOS', 'precision' => null, 'autoIncrement' => null],
        'soilped' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - TIPO DE PEDREGOSIDAD', 'precision' => null, 'autoIncrement' => null],
        'soilcol' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - COLOR DEL SUELO', 'precision' => null, 'autoIncrement' => null],
        'soilph' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - ACIDES O LA ALCALINIDAD DEL SUELO', 'precision' => null, 'autoIncrement' => null],
        'soilfis' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - TIPO DE ASPECTO FISOGRÁFICO DEL SUELO', 'precision' => null, 'autoIncrement' => null],
        'soilrel' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - INDICAR EL TIPO DE RELIEVE DEL SUELO', 'precision' => null, 'fixed' => null],
        'soiltemp' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - GRADOS CENTIGRADO DENTRO DEL SUELO', 'precision' => null, 'fixed' => null],
        'soilodor' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - SENSACIÓN OLFATIVA DETECTADA EN LA MUESTRA DEL SUELO', 'precision' => null, 'fixed' => null],
        'watersrc' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - FUENTE DE RECOLECCIÓN  DEL MATERIAL', 'precision' => null, 'autoIncrement' => null],
        'watercol' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - EL COLOR EN EL AGUA RESULTA DE LA PRESENCIA EN SOLUCIÓN DE DIFERENTES SUSTANCIAS COMO IONES METÁLICOS NATURALES, HUMUS Y MATERIA ORGÁNICA DISUELTA.', 'precision' => null, 'autoIncrement' => null],
        'watertemp' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - GRADOS CENTIGRADO DENTRO DEL AGUA', 'precision' => null, 'fixed' => null],
        'waterodor' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - EL OLOR ES LA SENSACIÓN RESULTANTE DE LA RECEPCIÓN DE UN ESTÍMULO POR EL SISTEMA SENSORIAL ', 'precision' => null, 'autoIncrement' => null],
        'waterph' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - ACIDES O LA ALCALINIDAD DEL AGUA', 'precision' => null, 'autoIncrement' => null],
        'waterturb' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - DISPERSIÓN DE LUZ POR PARTICULA EN SUSPENCIÓN DE AGUA (NTU: Unidades Turbidez nefelometricas)', 'precision' => null, 'fixed' => null],
        'donorcore' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - CODIGO DADO AL INSTITUTO DONANTE', 'precision' => null, 'fixed' => null],
        'donorname' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - NOMBRE DEL DONANTE', 'precision' => null, 'fixed' => null],
        'donaddress' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - DIRECCIÓN DEL DONANTE', 'precision' => null, 'fixed' => null],
        'donornumb' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - CODIGO ASIGNADO A UNA ACCESIÓN POR EL DONANTE', 'precision' => null, 'fixed' => null],
        'asocgenus' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - GENERO DE LA ESPECIE ASOCIADA', 'precision' => null, 'fixed' => null],
        'asocspecies' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - ESPECIE ASOCIADA', 'precision' => null, 'fixed' => null],
        'asoclocalname' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - NOMBRE LOCAL DE LA ESPECIE ASOCIADA', 'precision' => null, 'fixed' => null],
        'mancest' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - NUMERO DE LA ACCESIÓN DEL ANCESTRO MATERNO', 'precision' => null, 'fixed' => null],
        'pancest' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - NUMERO DE LA ACCESIÓN DEL ANCESTRO PATERNO', 'precision' => null, 'fixed' => null],
        'ancest' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - DESCRIPCIÓN QUE CONTENGA INFORMACIÓN DE LOS ANCESTROS', 'precision' => null, 'fixed' => null],
        'mlsstat' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'MULTICROP - EL ESTATUS DE UNA  ACCESIÓN CON RESPECTO AL SISTEMA MULTILATERAL (MLS) ', 'precision' => null, 'autoIncrement' => null],
        'patent' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - EL MICROORGANISMO ESTÁ REGISTRADO EN UNA PATENTE', 'precision' => null, 'fixed' => null],
        'straincode' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - CODIGO DEL INSTITUTO SI  PRODUCE LA MUESTRA', 'precision' => null, 'fixed' => null],
        'strainname' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - NOMBRE DEL INSTITUTO (O PERSONA) SI  PRODUCE LA MUESTRA', 'precision' => null, 'fixed' => null],
        'duplinstname' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - NOMBRE  DEL CENTRO DONDE SE MANTIENEN DUPLICADOS DE SEGURIDAD DE CADA ACCESIÓN', 'precision' => null, 'fixed' => null],
        'duplsite' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - DIRECCION DEL CENTRO DONDE SE MANTIENEN DUPLICADOS DE SEGURIDAD DE CADA ACCESIÓN', 'precision' => null, 'fixed' => null],
        'antag' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - NOMBRE DEL MICROORGANISMO QUE NO PERMITE EL CRECIMIENTO DE LA ACCESION AISLADA ', 'precision' => null, 'fixed' => null],
        'biolrisk' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - INDICAR AL GRUPO DE RIESGO QUE PERTENECE', 'precision' => null, 'autoIncrement' => null],
        'samphist' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - DESCRIPCION DEL MOVIMIENTO DE LA ACCESION ENTRE INSTITUCIONES', 'precision' => null, 'fixed' => null],
        'asilmed' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - MEDIO DE CULTIVO QUE SE VA  AISLAR LA ACCESION', 'precision' => null, 'fixed' => null],
        'micro' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - SI LA ACCESIÓN SE CUENTRA ALMACENADA EN EL BANCO DE IN VITRO', 'precision' => null, 'autoIncrement' => null],
        'bdna' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - SI LA ACCESIÓN SE CUENTRA ALMACENADA EN EL BANCO DE ADN', 'precision' => null, 'autoIncrement' => null],
        'remarks' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - PARA AÑADIR NOTAS O PARA COMPLETAR DATOS FALTANTES DE LA ACCESIÓN', 'precision' => null],
        'passport_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_passport_micro_passport1_idx' => ['type' => 'index', 'columns' => ['passport_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_passport_micro_passport1' => ['type' => 'foreign', 'columns' => ['passport_id'], 'references' => ['passport', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'commonname' => 'Lorem ipsum dolor sit amet',
            'spauthor' => 'Lorem ipsum dolor sit amet',
            'subtaxa' => 'Lorem ipsum dolor sit amet',
            'subtauthor' => 'Lorem ipsum dolor sit amet',
            'strain' => 'Lorem ipsum dolor sit amet',
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
            'isosrc' => 1,
            'sampstat' => 1,
            'colldate' => '2017-08-21',
            'localname' => 'Lorem ipsum dolor sit amet',
            'groupethnic' => 'Lorem ipsum dolor sit amet',
            'samptype' => 'Lorem ipsum dolor sit amet',
            'sampsize' => 'Lorem ipsum dolor sit amet',
            'sampling' => 'Lorem ipsum dolor sit amet',
            'uso' => 'Lorem ipsum dolor sit amet',
            'humidity' => 'Lorem ipsum dolor sit amet',
            'temp' => 'Lorem ipsum dolor sit amet',
            'presure' => 'Lorem ipsum dolor sit amet',
            'precipitation' => 'Lorem ipsum dolor sit amet',
            'soiltext' => 1,
            'soilped' => 1,
            'soilcol' => 1,
            'soilph' => 1,
            'soilfis' => 1,
            'soilrel' => 'Lorem ipsum dolor sit amet',
            'soiltemp' => 'Lorem ipsum dolor sit amet',
            'soilodor' => 'Lorem ipsum dolor sit amet',
            'watersrc' => 1,
            'watercol' => 1,
            'watertemp' => 'Lorem ipsum dolor sit amet',
            'waterodor' => 1,
            'waterph' => 1,
            'waterturb' => 'Lorem ipsum dolor sit amet',
            'donorcore' => 'Lorem ipsum dolor sit amet',
            'donorname' => 'Lorem ipsum dolor sit amet',
            'donaddress' => 'Lorem ipsum dolor sit amet',
            'donornumb' => 'Lorem ipsum dolor sit amet',
            'asocgenus' => 'Lorem ipsum dolor sit amet',
            'asocspecies' => 'Lorem ipsum dolor sit amet',
            'asoclocalname' => 'Lorem ipsum dolor sit amet',
            'mancest' => 'Lorem ipsum dolor sit amet',
            'pancest' => 'Lorem ipsum dolor sit amet',
            'ancest' => 'Lorem ipsum dolor sit amet',
            'mlsstat' => 1,
            'patent' => 'Lorem ipsum dolor sit amet',
            'straincode' => 'Lorem ipsum dolor sit amet',
            'strainname' => 'Lorem ipsum dolor sit amet',
            'duplinstname' => 'Lorem ipsum dolor sit amet',
            'duplsite' => 'Lorem ipsum dolor sit amet',
            'antag' => 'Lorem ipsum dolor sit amet',
            'biolrisk' => 1,
            'samphist' => 'Lorem ipsum dolor sit amet',
            'asilmed' => 'Lorem ipsum dolor sit amet',
            'micro' => 1,
            'bdna' => 1,
            'remarks' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'passport_id' => 1,
            'created' => '2017-08-21 14:24:57',
            'modified' => '2017-08-21 14:24:57'
        ],
    ];
}