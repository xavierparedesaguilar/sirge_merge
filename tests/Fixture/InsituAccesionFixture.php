<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * InsituAccesionFixture
 *
 */
class InsituAccesionFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'insitu_accesion';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'accenumb' => ['type' => 'string', 'length' => 10, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'CODIGO DE ACCESIÓN (COD. PER)', 'precision' => null, 'fixed' => null],
        'othenumb' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'Código de accesión', 'precision' => null, 'fixed' => null],
        'common_name' => ['type' => 'string', 'length' => 180, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'Nombre comun.', 'precision' => null, 'fixed' => null],
        'manifold' => ['type' => 'string', 'length' => 180, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'Colector', 'precision' => null, 'fixed' => null],
        'reported_usage' => ['type' => 'string', 'length' => 150, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'Uso reportado', 'precision' => null, 'fixed' => null],
        'extension' => ['type' => 'string', 'length' => 80, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'area_cultivation' => ['type' => 'string', 'length' => 80, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'área cultivo', 'precision' => null, 'fixed' => null],
        'others' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'Otros.', 'precision' => null],
        'scientific_name' => ['type' => 'string', 'length' => 180, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'Nombre Científico.', 'precision' => null, 'fixed' => null],
        'uso' => ['type' => 'string', 'length' => 180, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'usos', 'precision' => null, 'fixed' => null],
        'local_name' => ['type' => 'string', 'length' => 200, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'Nombre de local.', 'precision' => null, 'fixed' => null],
        'habitat' => ['type' => 'string', 'length' => 100, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'reference' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'Referencia.', 'precision' => null],
        'status' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'insitu_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'passport_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'wild_relatives' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'fk_insitu_accesion_insitu1_idx' => ['type' => 'index', 'columns' => ['insitu_id'], 'length' => []],
            'fk_insitu_accesion_passport1_idx' => ['type' => 'index', 'columns' => ['passport_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_insitu_accesion_insitu1' => ['type' => 'foreign', 'columns' => ['insitu_id'], 'references' => ['insitu', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_insitu_accesion_passport1' => ['type' => 'foreign', 'columns' => ['passport_id'], 'references' => ['passport', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'accenumb' => 'Lorem ip',
            'othenumb' => 'Lorem ipsum dolor sit amet',
            'common_name' => 'Lorem ipsum dolor sit amet',
            'manifold' => 'Lorem ipsum dolor sit amet',
            'reported_usage' => 'Lorem ipsum dolor sit amet',
            'extension' => 'Lorem ipsum dolor sit amet',
            'area_cultivation' => 'Lorem ipsum dolor sit amet',
            'others' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'scientific_name' => 'Lorem ipsum dolor sit amet',
            'uso' => 'Lorem ipsum dolor sit amet',
            'local_name' => 'Lorem ipsum dolor sit amet',
            'habitat' => 'Lorem ipsum dolor sit amet',
            'reference' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'status' => 1,
            'created' => '2017-08-22 09:40:58',
            'modified' => '2017-08-22 09:40:58',
            'insitu_id' => 1,
            'passport_id' => 1,
            'wild_relatives' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
