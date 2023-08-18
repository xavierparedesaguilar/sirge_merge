<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * InsituFarmerActivityFixture
 *
 */
class InsituFarmerActivityFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'insitu_farmer_activity';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'purpose' => ['type' => 'string', 'length' => 120, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'Finalidad', 'precision' => null, 'fixed' => null],
        'comunities' => ['type' => 'string', 'length' => 150, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'comunidades.', 'precision' => null, 'fixed' => null],
        'common_name' => ['type' => 'string', 'length' => 180, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'Nombre comun', 'precision' => null, 'fixed' => null],
        'description' => ['type' => 'text', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'Descripcion.', 'precision' => null],
        'input_tools' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'Insumo - Herramienta', 'precision' => null, 'autoIncrement' => null],
        'origin' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'Origen', 'precision' => null, 'autoIncrement' => null],
        'practice_know' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'practica - saber', 'precision' => null, 'autoIncrement' => null],
        'technical_category' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'tecnica - categoría', 'precision' => null, 'autoIncrement' => null],
        'status' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '1', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'insitu_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_insitu_farmer_activity_insitu1_idx' => ['type' => 'index', 'columns' => ['insitu_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_insitu_farmer_activity_insitu1' => ['type' => 'foreign', 'columns' => ['insitu_id'], 'references' => ['insitu', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'purpose' => 'Lorem ipsum dolor sit amet',
            'comunities' => 'Lorem ipsum dolor sit amet',
            'common_name' => 'Lorem ipsum dolor sit amet',
            'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'input_tools' => 1,
            'origin' => 1,
            'practice_know' => 1,
            'technical_category' => 1,
            'status' => 1,
            'created' => '2017-06-14 11:45:55',
            'modified' => '2017-06-14 11:45:55',
            'insitu_id' => 1
        ],
    ];
}
