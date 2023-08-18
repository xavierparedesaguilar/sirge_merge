<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TbCrianzas Model
 *
 * @property \App\Model\Table\TbDiversidadCrianzasTable|\Cake\ORM\Association\HasMany $TbDiversidadCrianzas
 *
 * @method \App\Model\Entity\TbCrianza get($primaryKey, $options = [])
 * @method \App\Model\Entity\TbCrianza newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TbCrianza[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TbCrianza|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TbCrianza patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TbCrianza[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TbCrianza findOrCreate($search, callable $callback = null, $options = [])
 */
class TbCrianzasTable extends Table
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

        $this->setTable('tb_crianzas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('TbDiversidadCrianzas', [
            'foreignKey' => 'tb_crianza_id'
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
            ->notEmpty('crianza');

        $validator
            ->integer('status')
            ->allowEmpty('status');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['crianza'], 'Registro ya existe !'));

        return $rules;
    }
}
