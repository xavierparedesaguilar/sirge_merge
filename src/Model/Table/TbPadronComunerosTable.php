<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TbPadronComuneros Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Ubigeo
 * @property \Cake\ORM\Association\BelongsTo $TbCentroPoblado
 * @property \Cake\ORM\Association\BelongsTo $Zabd
 *
 * @method \App\Model\Entity\TbPadronComunero get($primaryKey, $options = [])
 * @method \App\Model\Entity\TbPadronComunero newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TbPadronComunero[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TbPadronComunero|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TbPadronComunero patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TbPadronComunero[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TbPadronComunero findOrCreate($search, callable $callback = null, $options = [])
 */
class TbPadronComunerosTable extends Table
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

        $this->setTable('tb_padron_comuneros');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Ubigeo', [
            'foreignKey' => 'ubigeo_id'
        ]);
        $this->belongsTo('TbCentroPoblado', [
            'foreignKey' => 'tb_centro_poblado_id'
        ]);
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
            ->integer('id_asignado')
            ->allowEmpty('id_asignado');

        $validator
            ->integer('numero_correlativo')
            ->allowEmpty('numero_correlativo');

        $validator
            ->integer('tipo_documento')
            ->notEmpty('tipo_documento');

        $validator
            ->notEmpty('numero_documento_identidad');

        $validator
            ->notEmpty('nombres_apellidos')
            ->containsNonAlphaNumeric('nombres_apellidos', 1, 'Valores no permitidos', '/^[a-z0-9]{3,}$/i');
            ;

        $validator
            ->allowEmpty('fecha_nacimiento');

        $validator
            ->notEmpty('genero');

        $validator
            ->notEmpty('ubigeo_id');
        $validator
            ->allowEmpty('observacion1');

        $validator
            ->allowEmpty('observacion2');

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
        $rules->add($rules->existsIn(['ubigeo_id'], 'Ubigeo'));
        $rules->add($rules->existsIn(['tb_centro_poblado_id'], 'TbCentroPoblado'));
        $rules->add($rules->existsIn(['tb_zabd_id'], 'Zabd'));
        $rules->add($rules->isUnique(['numero_documento_identidad','tb_zabd_id'], 'Registro ya existe !'));

        return $rules;
    }
}
