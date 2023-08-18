<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TbCultivo Model
 *
 * @method \App\Model\Entity\TbCultivo get($primaryKey, $options = [])
 * @method \App\Model\Entity\TbCultivo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TbCultivo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TbCultivo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TbCultivo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TbCultivo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TbCultivo findOrCreate($search, callable $callback = null, $options = [])
 */
class TbCultivoTable extends Table
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

        $this->setTable('tb_cultivo');
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
            ->allowEmpty('id');

        $validator
            ->notEmpty('cultivo');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['cultivo'], 'Registro ya existe !'));

        return $rules;
    }
}
