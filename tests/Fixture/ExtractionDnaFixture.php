<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ExtractionDnaFixture
 *
 */
class ExtractionDnaFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'extraction_dna';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'extmethod' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - INDICA EL METODO DE EXTRACIÓN DE ADN', 'precision' => null, 'autoIncrement' => null],
        'extdate' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - INDICA LA FECHA DE EXTRACCIÓN DE ADN', 'precision' => null],
        'extres' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - INDICA EL NOMBRE DEL PERSONAL ENCARGADO DE REALIZAR LA EXTRACCIÓN', 'precision' => null, 'fixed' => null],
        'buffer' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - INDICA EL BUFFER DE  DILUCIÓN PARA EL ADN ', 'precision' => null, 'autoIncrement' => null],
        'volumen' => ['type' => 'decimal', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - INDICA EL VOLUMEN  PARA RESUSPENDER EL ADN '],
        'dnaqty' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - INDICA LA CANTIDAD  TOTAL DEL ADN EXTRAIDO', 'precision' => null, 'autoIncrement' => null],
        'conadnpur' => ['type' => 'decimal', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - INDICA LA CONCENTRACION DE ADN EN UNA MUESTRA'],
        'leca260_280' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - PRIMER RANGO ESPECTROFOTOMETRICO PARA  LA CONCENTRACION Y PUREZA DE ADN  ', 'precision' => null, 'fixed' => null],
        'leca260_230' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - SEGUNDO RANGO ESPECTROFOTOMETRICO PARA  LA CONCENTRACION Y PUREZA DE ADN  ', 'precision' => null, 'fixed' => null],
        'conadnint' => ['type' => 'decimal', 'length' => 10, 'precision' => 2, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - INDICA LA CONCENTRACIÒN DEL ADN PARA MEDIR INTEGRIDAD '],
        'din' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - INDICE DE INTEGRIDAD DE ADN ', 'precision' => null, 'fixed' => null],
        'agaelec' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - CALIDAD DEL ADN COMPARADO CON UNA BANDA PADRON O CON UN MARCADOR CONOCIDO ', 'precision' => null, 'autoIncrement' => null],
        'shortermtemp' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - DEFINE LA TEMPERATURA SE DEBE CONSERVAR LA MUESTRA', 'precision' => null, 'fixed' => null],
        'shortermtime' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - DEFINE EL TIEMPO QUE SE DEBE CONSERVARLA MUESTRA', 'precision' => null, 'fixed' => null],
        'shorconstime' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - FECHA QUE SE REALIZA LA CONSERVACIÓN DEL MATERIAL', 'precision' => null],
        'shortmatnumb' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - NUMERO DE MATERIAL QUE SE MANTIENEN POR CADA MUESTRA ', 'precision' => null, 'autoIncrement' => null],
        'shortminstock' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - STOCK MINIMO QUE SE DEBE MANTENER DEL MATERIAL', 'precision' => null, 'autoIncrement' => null],
        'shortstornumb' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - CODIGO DEL EQUIPO DE ALAMACENAMIENTO', 'precision' => null, 'fixed' => null],
        'shortstorage' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - LUGARES DE ALMACENAMIENTO DONDE SE MANTIENE EL MATERIAL', 'precision' => null, 'autoIncrement' => null],
        'shortlevsh' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - NIVEL DE ESTANTERIA DONDE SE ENCUENTRA LA GRADILLA CON EL TUBO O PLACA CON LA MUESTRA', 'precision' => null, 'fixed' => null],
        'shortrack' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - NÚMERO DE GRADILLA DONDE SE ENCUENTRA EL TUBO O PLACA', 'precision' => null, 'fixed' => null],
        'shortrackpos' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - POSICION DEL CRIOBOX DENTRO DE LA GRADILLA', 'precision' => null, 'fixed' => null],
        'shortcrionumb' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - NÚMERO DE CRIOBOX DONDE  SE ENCUENTRA EL MATERIAL', 'precision' => null, 'autoIncrement' => null],
        'shortcriopos' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - POSICION DEL CRIOVIAL DENTRO DEL CRIOBOX', 'precision' => null, 'fixed' => null],
        'longtermtemp' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - DEFINE LA TEMPERATURA SE DEBE CONSERVAR LA MUESTRA', 'precision' => null, 'fixed' => null],
        'longtermtime' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - DEFINE EL TIEMPO L SE DEBE CONSERVAR LA MUESTRA', 'precision' => null, 'fixed' => null],
        'longconstime' => ['type' => 'date', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'longtermtype' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - TIPO DE CONSERVACIÓN A LARGO PLAZO ', 'precision' => null, 'autoIncrement' => null],
        'criovinumb' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - NUMERO DE CRIOVIALES QUE SE MANTIENEN POR CADA MATERIAL ', 'precision' => null, 'autoIncrement' => null],
        'crioviminstock' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - STOCK MINIMO DE CRIOVIALES QUE SE DEBE MANTENER DEL MATERIAL DE LIOFILIZADOS Y CRIOPERSERVADOS', 'precision' => null, 'autoIncrement' => null],
        'longstornumb' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - CODIGO DEL EQUIPO DE ALAMACENAMIENTO', 'precision' => null, 'fixed' => null],
        'longstorage' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - LUGARES DE ALMACENAMIENTO DONDE SE MANTIENE EL MATERIAL', 'precision' => null, 'autoIncrement' => null],
        'longlevsh' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - NIVEL DE ESTANTERIA DONDE SE ENCUENTRA LA GRADILLA CON EL CRIOBOX', 'precision' => null, 'fixed' => null],
        'longrack' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - CODIGO DE ALMACENAMIENTO DEL CRIOBOX', 'precision' => null, 'fixed' => null],
        'longrackpos' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - POSICION DEL CRIOBOX DENTRO DE LA GRADILLA', 'precision' => null, 'fixed' => null],
        'longcrionumb' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'ADICIONAL - NÚMERO DE CRIOBOX DONDE  SE ENCUENTRA EL MATERIAL', 'precision' => null, 'autoIncrement' => null],
        'longcriopos' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - POSICION DEL CRIOVIAL DENTRO DEL CRIOBOX', 'precision' => null, 'fixed' => null],
        'status' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'bank_dna_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'remarks' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'ADICIONAL - NOTAS O PARA COMPLETAR DATOS FALTANTES ', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'fk_extraction_dna_bank_dna1_idx' => ['type' => 'index', 'columns' => ['bank_dna_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_extraction_dna_bank_dna1' => ['type' => 'foreign', 'columns' => ['bank_dna_id'], 'references' => ['bank_dna', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'extmethod' => 1,
            'extdate' => '2017-07-31',
            'extres' => 'Lorem ipsum dolor sit amet',
            'buffer' => 1,
            'volumen' => 1.5,
            'dnaqty' => 1,
            'conadnpur' => 1.5,
            'leca260_280' => 'Lorem ipsum dolor sit amet',
            'leca260_230' => 'Lorem ipsum dolor sit amet',
            'conadnint' => 1.5,
            'din' => 'Lorem ipsum dolor sit amet',
            'agaelec' => 1,
            'shortermtemp' => 'Lorem ipsum dolor sit amet',
            'shortermtime' => 'Lorem ipsum dolor sit amet',
            'shorconstime' => '2017-07-31',
            'shortmatnumb' => 1,
            'shortminstock' => 1,
            'shortstornumb' => 'Lorem ipsum dolor sit amet',
            'shortstorage' => 1,
            'shortlevsh' => 'Lorem ipsum dolor sit amet',
            'shortrack' => 'Lorem ipsum dolor sit amet',
            'shortrackpos' => 'Lorem ipsum dolor sit amet',
            'shortcrionumb' => 1,
            'shortcriopos' => 'Lorem ipsum dolor sit amet',
            'longtermtemp' => 'Lorem ipsum dolor sit amet',
            'longtermtime' => 'Lorem ipsum dolor sit amet',
            'longconstime' => '2017-07-31',
            'longtermtype' => 1,
            'criovinumb' => 1,
            'crioviminstock' => 1,
            'longstornumb' => 'Lorem ipsum dolor sit amet',
            'longstorage' => 1,
            'longlevsh' => 'Lorem ipsum dolor sit amet',
            'longrack' => 'Lorem ipsum dolor sit amet',
            'longrackpos' => 'Lorem ipsum dolor sit amet',
            'longcrionumb' => 1,
            'longcriopos' => 'Lorem ipsum dolor sit amet',
            'status' => 1,
            'created' => '2017-07-31 12:27:58',
            'modified' => '2017-07-31 12:27:58',
            'bank_dna_id' => 1,
            'remarks' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
