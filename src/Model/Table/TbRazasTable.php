<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TbRazas Model
 *
 * @property \App\Model\Table\TbDiversidadCrianzasTable|\Cake\ORM\Association\HasMany $TbDiversidadCrianzas
 *
 * @method \App\Model\Entity\TbRaza get($primaryKey, $options = [])
 * @method \App\Model\Entity\TbRaza newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TbRaza[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TbRaza|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TbRaza patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TbRaza[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TbRaza findOrCreate($search, callable $callback = null, $options = [])
 */
class TbRazasTable extends Table
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

        $this->setTable('tb_razas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('TbDiversidadCrianzas', [
            'foreignKey' => 'tb_raza_id'
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
            ->notEmpty('raza');

        $validator
            ->integer('status')
            ->allowEmpty('status');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['raza'], 'Registro ya existe !'));

        return $rules;
    }
}
