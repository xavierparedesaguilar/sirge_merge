<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TbParientesSilvestres Model
 *
 * @property \Cake\ORM\Association\BelongsTo $TbTipoDiversidads
 *
 * @method \App\Model\Entity\TbParientesSilvestre get($primaryKey, $options = [])
 * @method \App\Model\Entity\TbParientesSilvestre newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TbParientesSilvestre[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TbParientesSilvestre|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TbParientesSilvestre patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TbParientesSilvestre[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TbParientesSilvestre findOrCreate($search, callable $callback = null, $options = [])
 */
class TbParientesSilvestresTable extends Table
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

        $this->setTable('tb_parientes_silvestres');
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
            ->notEmpty('pariente_silvestre');

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
        $rules->add($rules->isUnique(['pariente_silvestre','tb_tipo_diversidad_id'], 'Registro ya existe !'));

        return $rules;
    }
}
