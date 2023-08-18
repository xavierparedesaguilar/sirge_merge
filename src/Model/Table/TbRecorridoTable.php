<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TbRecorrido Model
 *
 * @property \Cake\ORM\Association\BelongsTo $TbZabds
 *
 * @method \App\Model\Entity\TbRecorrido get($primaryKey, $options = [])
 * @method \App\Model\Entity\TbRecorrido newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TbRecorrido[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TbRecorrido|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TbRecorrido patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TbRecorrido[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TbRecorrido findOrCreate($search, callable $callback = null, $options = [])
 */
class TbRecorridoTable extends Table
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

        $this->setTable('tb_recorrido');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Zabd', [
            'foreignKey' => 'tb_zabd_id'
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
            ->notEmpty('ruta_recorrido');

        $validator
            ->integer('distancia_recorrido')
            ->allowEmpty('distancia_recorrido');

        $validator
            ->time('tiempo_recorrido_particular')
            ->allowEmpty('tiempo_recorrido_particular');

        $validator
            ->time('tiempo_recorrido_popular')
            ->allowEmpty('tiempo_recorrido_popular');

        $validator
            ->allowEmpty('referencia_recorrido');

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
        $rules->add($rules->existsIn(['tb_zabd_id'], 'Zabd'));
        $rules->add($rules->isUnique(['ruta_recorrido','tb_zabd_id'], 'Registro ya existe !'));

        return $rules;
    }
}
