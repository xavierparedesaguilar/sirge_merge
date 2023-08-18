<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TbComunidad Model
 *
 * @method \App\Model\Entity\TbComunidad get($primaryKey, $options = [])
 * @method \App\Model\Entity\TbComunidad newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TbComunidad[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TbComunidad|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TbComunidad patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TbComunidad[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TbComunidad findOrCreate($search, callable $callback = null, $options = [])
 */
class TbComunidadTable extends Table
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

        $this->setTable('tb_comunidad');
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
            ->notEmpty('nombre_comunidad');
            
        $validator
            ->notEmpty('nombre_segun_sunarp');

        $validator
            ->allowEmpty('antecendente');

        $validator
            ->allowEmpty('nom_predio');

        $validator
            ->allowEmpty('folio_exp');

        $validator
            ->allowEmpty('pagina_exp');

        $validator
            ->allowEmpty('partida_electronica');

        $validator
            ->allowEmpty('ficha_registral');

        $validator
            ->numeric('superficie_pe')
            ->allowEmpty('superficie_pe');

        $validator
            ->numeric('superficie_cat')
            ->allowEmpty('superficie_cat');

        $validator
            ->numeric('superficie_comunidad_zabd')
            ->allowEmpty('superficie_comunidad_zabd');

        $validator
            ->numeric('porcentaje_superficie_zabd')
            ->allowEmpty('porcentaje_superficie_zabd');

        $validator
            ->integer('altitud_min')
            ->allowEmpty('altitud_min');

        $validator
            ->integer('altitud_max')
            ->allowEmpty('altitud_max');

        $validator
            ->integer('altitud_inter')
            ->allowEmpty('altitud_inter');

        $validator
            ->allowEmpty('availability');

        $validator
            ->allowEmpty('status');

        $validator
            ->integer('tb_zabd_id')
            ->allowEmpty('tb_zabd_id');

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
        $rules->add($rules->isUnique(['nombre_comunidad','tb_zabd_id'], 'Registro ya existe !'));

        return $rules;
    }
}
