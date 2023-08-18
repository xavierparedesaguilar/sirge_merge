<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TbFamilias Model
 *
 * @property \Cake\ORM\Association\BelongsTo $TbTipoDiversidads
 * @property \Cake\ORM\Association\HasMany $TbNombresCientificos
 *
 * @method \App\Model\Entity\TbFamilia get($primaryKey, $options = [])
 * @method \App\Model\Entity\TbFamilia newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TbFamilia[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TbFamilia|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TbFamilia patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TbFamilia[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TbFamilia findOrCreate($search, callable $callback = null, $options = [])
 */
class TbFamiliasTable extends Table
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

        $this->setTable('tb_familias');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('TbTipoDiversidad', [
            'foreignKey' => 'tb_tipo_diversidad_id'
        ]);
        $this->hasMany('TbNombresCientificos', [
            'foreignKey' => 'tb_familia_id'
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
            ->notEmpty('familia');

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
        $rules->add($rules->existsIn(['tb_tipo_diversidad_id'], 'TbTipoDiversidads'));
        $rules->add($rules->existsIn(['familia','tb_tipo_diversidad_id'], 'Registro ya existe !'));

        return $rules;
    }
}
