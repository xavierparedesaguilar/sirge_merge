<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TbSector Model
 *
 * @property \Cake\ORM\Association\HasMany $TbConocimientoTradicional
 *
 * @method \App\Model\Entity\TbSector get($primaryKey, $options = [])
 * @method \App\Model\Entity\TbSector newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TbSector[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TbSector|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TbSector patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TbSector[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TbSector findOrCreate($search, callable $callback = null, $options = [])
 */
class TbSectorTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('tb_sector');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('TbConocimientoTradicional', [
            'foreignKey' => 'tb_sector_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->notEmpty('sector');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['sector'], 'Registro ya existe !'));

        return $rules;
    }
}
