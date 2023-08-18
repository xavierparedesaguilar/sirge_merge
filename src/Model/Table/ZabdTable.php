<?php

namespace App\Model\Table;

use Cake\Database\Type\StringType;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Insitu Model
 *
 * @property \Cake\ORM\Association\BelongsTo $User
 * @property \Cake\ORM\Association\BelongsTo $Ubigeo
 * @property \Cake\ORM\Association\HasMany $InsituAccesion
 * @property \Cake\ORM\Association\HasMany $InsituFarmerActivity
 * @property \Cake\ORM\Association\HasMany $InsituPlage
 * @property \Cake\ORM\Association\HasMany $InsituThreat
 *
 * @method \App\Model\Entity\TbZabd get($primaryKey, $options = [])
 * @method \App\Model\Entity\TbZabd newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TbZabd[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TbZabd|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TbZabd patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TbZabd[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TbZabd findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ZabdTable extends Table
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

        $this->setTable('tb_zabd');
        parent::initialize($config);

        $this->setTable('tb_zabd');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
        $this->belongsTo('Ubigeo', [
            'foreignKey' => 'ubigeo_id',
            'joinType' => 'INNER'
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
            ->allowEmpty('cod_zabd');

        $validator->notEmpty('nombre');
            // ->containsNonAlphaNumeric('nombre', 1, '', '/^[a-z]{3,}$/i ');
            
        $validator
            ->notEmpty('resolucion')
            ->containsNonAlphaNumeric('resolucion', 1, 'Valores no permitidos', '/^[a-z0-9]{3,}$/i');

        $validator
            ->allowEmpty('doc_resolucion');

        $validator
            ->notEmpty('fec_reconocimiento')
            ->date('fec_reconocimiento');

        $validator
            ->integer('ubigeo_id')
            ->notEmpty('ubigeo_id');

        $validator
            ->numeric('area')
            ->allowEmpty('area');

        $validator
            ->numeric('latitud')
            ->allowEmpty('latitud');

        $validator
            ->numeric('longitud')
            ->allowEmpty('longitud');

        $validator
            ->integer('altitud_max')
            ->allowEmpty('altitud_max');

        $validator
            ->integer('altitud_min')
            ->allowEmpty('altitud_min');

        $validator
            ->allowEmpty('doc_georeferenciacion');

        $validator
            ->allowEmpty('mapa_img');

        $validator
            ->allowEmpty('observacion')
            ;

        $validator
            ->allowEmpty('availability');

        $validator
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
        // $rules->add($rules->existsIn(['user_id'], 'User'));
        $rules->add($rules->existsIn(['ubigeo_id'], 'Ubigeo'));
        $rules->add($rules->isUnique(['nombre', 'resolucion', 'ubigeo_id', 'fec_reconocimiento'], 'Registro ya existe !'));
        $rules->add($rules->isUnique(['resolucion'],'Ya existe esta resolución !'));

        return $rules;
    }
}
