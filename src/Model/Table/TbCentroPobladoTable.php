<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TbCentroPoblado Model
 *
 * @property \Cake\ORM\Association\BelongsTo $TbOrganizacions
 * @property \Cake\ORM\Association\BelongsTo $TbComunidads
 * @property \Cake\ORM\Association\HasMany $TbDiversidadCultivo
 * @property \Cake\ORM\Association\HasMany $TbDiversidadFauna
 * @property \Cake\ORM\Association\HasMany $TbDiversidadFlora
 * @property \Cake\ORM\Association\HasMany $TbPadronComuneros
 * @property \Cake\ORM\Association\HasMany $TbPadronComuneros2
 * @property \Cake\ORM\Association\HasMany $TbPadronComuneros2
 *
 * @method \App\Model\Entity\TbCentroPoblado get($primaryKey, $options = [])
 * @method \App\Model\Entity\TbCentroPoblado newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TbCentroPoblado[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TbCentroPoblado|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TbCentroPoblado patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TbCentroPoblado[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TbCentroPoblado findOrCreate($search, callable $callback = null, $options = [])
 */
class TbCentroPobladoTable extends Table
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

        $this->setTable('tb_centro_poblado');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('TbOrganizacion', [
            'foreignKey' => 'tb_organizacion_id'
        ]);
        $this->belongsTo('TbComunidad', [
            'foreignKey' => 'tb_comunidad_id'
        ]);
        $this->hasMany('TbDiversidadCultivo', [
            'foreignKey' => 'tb_centro_poblado_id'
        ]);
        $this->hasMany('TbDiversidadFauna', [
            'foreignKey' => 'tb_centro_poblado_id'
        ]);
        $this->hasMany('TbDiversidadFlora', [
            'foreignKey' => 'tb_centro_poblado_id'
        ]);
        $this->hasMany('TbPadronComuneros', [
            'foreignKey' => 'tb_centro_poblado_id'
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
        ->requirePresence('centro_poblado', 'create')
        ->notEmpty('centro_poblado');

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
        $rules->add($rules->existsIn(['tb_organizacion_id'], 'TbOrganizacion'));
        $rules->add($rules->existsIn(['tb_comunidad_id'], 'TbComunidad'));
        $rules->add($rules->isUnique(['centro_poblado','tb_organizacion_id','tb_comunidad_id'],'Registro ya existe !'));

        return $rules;
    }
}
