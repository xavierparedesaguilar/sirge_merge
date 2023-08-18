<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TbNombresComunes Model
 *
 * @property \Cake\ORM\Association\BelongsTo $TbTipoDiversidad
 *
 * @method \App\Model\Entity\TbNombresComunes get($primaryKey, $options = [])
 * @method \App\Model\Entity\TbNombresComunes newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TbNombresComunes[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TbNombresComunes|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TbNombresComunes patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TbNombresComunes[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TbNombresComunes findOrCreate($search, callable $callback = null, $options = [])
 */
class TbNombresComunesTable extends Table
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

        $this->setTable('tb_nombres_comunes');
        // $this->setDisplayField('id');
        // $this->setPrimaryKey('id');

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
            ->notEmpty('nombre_comun');

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
        $rules->add($rules->existsIn(['nombre_comun','tb_tipo_diversidad_id'], 'Registro ya existe !'));

        return $rules;
    }
}
