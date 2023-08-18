<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TbClase Model
 *
 * @property \App\Model\Table\TbTipoDiversidadsTable|\Cake\ORM\Association\BelongsTo $TbTipoDiversidads
 * @property \App\Model\Table\TbDiversidadFaunaTable|\Cake\ORM\Association\HasMany $TbDiversidadFauna
 *
 * @method \App\Model\Entity\TbClase get($primaryKey, $options = [])
 * @method \App\Model\Entity\TbClase newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TbClase[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TbClase|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TbClase patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TbClase[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TbClase findOrCreate($search, callable $callback = null, $options = [])
 */
class TbClaseTable extends Table
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

        $this->setTable('tb_clase');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('TbTipoDiversidad', [
            'foreignKey' => 'tb_tipo_diversidad_id'
        ]);
        $this->hasMany('TbDiversidadFauna', [
            'foreignKey' => 'tb_clase_id'
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
            ->notEmpty('clase');

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
        $rules->add($rules->isUnique(['clase','tb_tipo_diversidad_id'], 'TbTipoDiversidad'));

        return $rules;
    }
}
