<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BankSeedFixture
 *
 */
class BankSeedFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'bank_seed';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'bank_availability' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'othenumb' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - IDENTIFICACIÓN DE ESTA ACCESIÓN QUE SE HAYA ENCONTRADO EN OTRAS COLECCIONES -  (COD INTERNO)', 'precision' => null, 'fixed' => null],
        'detecnumb' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - CÓDIGO INTERNO PARA LA IDENTIFICACIÓN DE LA ACCESIÓN', 'precision' => null, 'fixed' => null],
        'lotnumb' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - NUMERO DE IDENTIFICACIÓN  UNICO DE LA MUESTRA', 'precision' => null, 'fixed' => null],
        'acqdate' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - FECHA EN LA QUE SE INCORPORO LA ACCESIÓN A LA COLECCIÓN', 'precision' => null],
        'origin' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - LUGAR DE PROCEDENCIA DEL MATERIAL', 'precision' => null, 'fixed' => null],
        'availability' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - DISPONIBILIDAD DEL LOTE DE LA ACCESIÓN (SI/NO)', 'precision' => null, 'autoIncrement' => null],
        'accimag1' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - FOTOGRAFIA DE LA SEMILLA 1', 'precision' => null, 'fixed' => null],
        'accimag2' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - FOTOGRAFIA DE LA SEMILLA 2', 'precision' => null, 'fixed' => null],
        'remarks1' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - DESCRIPCIÓN IMAGEN 1', 'precision' => null, 'fixed' => null],
        'remarks2' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - DESCRIPCIÓN IMAGEN 2', 'precision' => null, 'fixed' => null],
        'harvestdate' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - FECHA DE COSECHA DE LA SEMILLA', 'precision' => null, 'autoIncrement' => null],
        'bags' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - CANTIDAD DE BOLSAS POR ACCESIÓN ', 'precision' => null, 'autoIncrement' => null],
        'seeweight' => ['type' => 'decimal', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - PESO TOTAL DE LA SEMILLAS'],
        'seednumb' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - NUMERO DE SEMILLAS ', 'precision' => null, 'autoIncrement' => null],
        'seedpro' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - MEDIO PROPAGACIÓN QUE SE MANTIENE LA SEMILLA', 'precision' => null, 'autoIncrement' => null],
        'seedsto' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - MEDIO CONSERVACIÓN QUE SE MANTIENE LA SEMILLA', 'precision' => null, 'autoIncrement' => null],
        'color' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - IDENTICACIÓN DEL COLOR DE LA SEMILLA', 'precision' => null, 'fixed' => null],
        'size' => ['type' => 'decimal', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - TAMAÑO DE LA SEMILLA'],
        'shape' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - IDENTIFICACIÓN EXTERNA DE LA SEMILLA', 'precision' => null, 'fixed' => null],
        'typeref' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - RENOVACIÓN DE LA SEMILLA', 'precision' => null, 'autoIncrement' => null],
        'typemat' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - TIPO DE MATERIAL QUE SE ENCUENTRA EN EL BANCO', 'precision' => null, 'autoIncrement' => null],
        'germination' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - PORCENTAJES DE GERMINACIÓN DE LA SEMILLA', 'precision' => null, 'autoIncrement' => null],
        'seedhum' => ['type' => 'decimal', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - PORCENTAJE DE HUMEDAD DE LA SEMILLA'],
        'viability' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - MONITOREO DEL PORCENTAJE DE GERMINACIÓN DE LA SEMILLA CONSERVADA', 'precision' => null, 'fixed' => null],
        'discweight' => ['type' => 'decimal', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - PESO DE SEMILLA EXCLUIDA POR PROBLEMAS DE PATOGENOS U OTROS'],
        'discnumb' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - NUMERO DE SEMILLAS EXCLUIDAD POR DEFECTO', 'precision' => null, 'autoIncrement' => null],
        'p1' => ['type' => 'decimal', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - PESO DE LAS SEMILLAS POR CONTENEDOR '],
        'n1' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - NUMERO DE SEMILLAS DE POR CONTENEDOR', 'precision' => null, 'autoIncrement' => null],
        'p2' => ['type' => 'decimal', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - PESO DE LAS SEMILLAS POR CONTENEDOR '],
        'n2' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - NUMERO DE SEMILLAS DE POR CONTENEDOR', 'precision' => null, 'autoIncrement' => null],
        'p3' => ['type' => 'decimal', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - PESO DE LAS SEMILLAS POR CONTENEDOR '],
        'n3' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - NUMERO DE SEMILLAS DE POR CONTENEDOR', 'precision' => null, 'autoIncrement' => null],
        'p4' => ['type' => 'decimal', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - PESO DE LAS SEMILLAS POR CONTENEDOR '],
        'n4' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - NUMERO DE SEMILLAS DE POR CONTENEDOR', 'precision' => null, 'autoIncrement' => null],
        'p5' => ['type' => 'decimal', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - PESO DE LAS SEMILLAS POR CONTENEDOR '],
        'n5' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - NUMERO DE SEMILLAS DE POR CONTENEDOR', 'precision' => null, 'autoIncrement' => null],
        'realweight' => ['type' => 'decimal', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - PESO RESTANTE DE LA BOLSA ORIGINAL'],
        'storage' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - TIPO DE ALMACENAMIENTOS DEL MATERIAL', 'precision' => null, 'autoIncrement' => null],
        'temp' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - TEMPERATURA DONDE SE CONSERVA EL MATERIAL', 'precision' => null, 'autoIncrement' => null],
        'humidity' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - PORCENTAJE DE HUMEDAD DEL MATERIAL', 'precision' => null, 'autoIncrement' => null],
        'shelving' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - UBICACIÓN DEL MATERIAL DENTRO DEL CUARTO DE CONSERVACIÓN', 'precision' => null, 'fixed' => null],
        'resistance' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - RESISTENCIA DEL MATERIAL A PATOGENOS O ENFERMEDADES', 'precision' => null, 'fixed' => null],
        'tolerancia' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - TOLERANTE DEL MATERIAL A PATOGENOS O ENFERMEDADES', 'precision' => null, 'fixed' => null],
        'susceptibility' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - SUSCEPTIBLE DEL MATERIAL A PATOGENOS O ENFERMEDADES', 'precision' => null, 'fixed' => null],
        'ciclo' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - ES EL DESARROLLO DEL CULTIVO', 'precision' => null, 'autoIncrement' => null],
        'time' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - TIEMPO (cantidad de días) DEL CICLO VEGETATIVO', 'precision' => null, 'autoIncrement' => null],
        'performance' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - CANTIDAD DE SEMILLAS POR TONELADA', 'precision' => null, 'autoIncrement' => null],
        'responsible' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - NOMBRE DEL PERSONAL RESPONSABLE DEL MATERIAL', 'precision' => null, 'fixed' => null],
        'remarks' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'MULTICROP - PARA AÑADIR NOTAS O PARA COMPLETAR DATOS FALTANTES', 'precision' => null, 'fixed' => null],
        'passport_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'status' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_bank_seed_passport1_idx' => ['type' => 'index', 'columns' => ['passport_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_bank_seed_passport1' => ['type' => 'foreign', 'columns' => ['passport_id'], 'references' => ['passport', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'created' => '2017-08-02 17:54:13',
            'modified' => '2017-08-02 17:54:13',
            'othenumb' => 'Lorem ipsum dolor sit amet',
            'detecnumb' => 'Lorem ipsum dolor sit amet',
            'lotnumb' => 'Lorem ipsum dolor sit amet',
            'acqdate' => '2017-08-02',
            'origin' => 'Lorem ipsum dolor sit amet',
            'availability' => 1,
            'accimag1' => 'Lorem ipsum dolor sit amet',
            'accimag2' => 'Lorem ipsum dolor sit amet',
            'remarks1' => 'Lorem ipsum dolor sit amet',
            'remarks2' => 'Lorem ipsum dolor sit amet',
            'harvestdate' => 1,
            'bags' => 1,
            'seeweight' => 1.5,
            'seednumb' => 1,
            'seedpro' => 1,
            'seedsto' => 1,
            'color' => 'Lorem ipsum dolor sit amet',
            'size' => 1.5,
            'shape' => 'Lorem ipsum dolor sit amet',
            'typeref' => 1,
            'typemat' => 1,
            'germination' => 1,
            'seedhum' => 1.5,
            'viability' => 'Lorem ipsum dolor sit amet',
            'discweight' => 1.5,
            'discnumb' => 1,
            'p1' => 1.5,
            'n1' => 1,
            'p2' => 1.5,
            'n2' => 1,
            'p3' => 1.5,
            'n3' => 1,
            'p4' => 1.5,
            'n4' => 1,
            'p5' => 1.5,
            'n5' => 1,
            'realweight' => 1.5,
            'storage' => 1,
            'temp' => 1,
            'humidity' => 1,
            'shelving' => 'Lorem ipsum dolor sit amet',
            'resistance' => 'Lorem ipsum dolor sit amet',
            'tolerancia' => 'Lorem ipsum dolor sit amet',
            'susceptibility' => 'Lorem ipsum dolor sit amet',
            'ciclo' => 1,
            'time' => 1,
            'performance' => 1,
            'responsible' => 'Lorem ipsum dolor sit amet',
            'remarks' => 'Lorem ipsum dolor sit amet',
            'passport_id' => 1,
            'status' => 1
        ],
    ];
}
