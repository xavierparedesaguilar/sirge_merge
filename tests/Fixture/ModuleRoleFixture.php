<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ModuleRoleFixture
 *
 */
class ModuleRoleFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'module_role';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'module_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'role_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'permissions' => ['type' => 'string', 'length' => 80, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'fk_module_has_role_rol1_idx' => ['type' => 'index', 'columns' => ['role_id'], 'length' => []],
            'fk_module_has_role_module1_idx' => ['type' => 'index', 'columns' => ['module_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_module_role_module1' => ['type' => 'foreign', 'columns' => ['module_id'], 'references' => ['module', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_module_role_role1' => ['type' => 'foreign', 'columns' => ['role_id'], 'references' => ['role', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'module_id' => 1,
            'role_id' => 1,
            'permissions' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
