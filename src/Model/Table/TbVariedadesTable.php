<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TbVariedades Model
 *
 * @property \Cake\ORM\Association\BelongsTo $TbTipoDiversidads
 *
 * @method \App\Model\Entity\TbVariedade get($primaryKey, $options = [])
 * @method \App\Model\Entity\TbVariedade newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TbVariedade[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TbVariedade|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TbVariedade patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TbVariedade[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TbVariedade findOrCreate($search, callable $callback = null, $options = [])
 */
class TbVariedadesTable extends Table
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

        $this->setTable('tb_variedades');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('TbTipoDiversidad', [
            'foreignKey' => 'tb_tipo_diversidad_id'
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
            ->notEmpty('variedad');

        $validator
            ->integer('status')
            ->allowEmpty('status');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['tb_tipo_diversidad_id'], 'TbTipoDiversidad'));

        return $rules;
    }
}
