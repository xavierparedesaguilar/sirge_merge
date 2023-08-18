<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TbDiversidadFauna Model
 *
 * @property \App\Model\Table\TbClaseTable|\Cake\ORM\Association\BelongsTo $TbClase
 * @property \App\Model\Table\TbFamiliasTable|\Cake\ORM\Association\BelongsTo $TbFamilias
 * @property \App\Model\Table\TbNombresCientificosTable|\Cake\ORM\Association\BelongsTo $TbNombresCientificos
 * @property \App\Model\Table\TbNombresComunesTable|\Cake\ORM\Association\BelongsTo $TbNombresComunes
 * @property \App\Model\Table\TbCentroPobladoTable|\Cake\ORM\Association\BelongsTo $TbCentroPoblado
 * @property \App\Model\Table\ZabdTable|\Cake\ORM\Association\BelongsTo $Zabd
 *
 * @method \App\Model\Entity\TbDiversidadFauna get($primaryKey, $options = [])
 * @method \App\Model\Entity\TbDiversidadFauna newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TbDiversidadFauna[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TbDiversidadFauna|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TbDiversidadFauna patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TbDiversidadFauna[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TbDiversidadFauna findOrCreate($search, callable $callback = null, $options = [])
 */
class TbDiversidadFaunaTable extends Table
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

        $this->setTable('tb_diversidad_fauna');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('TbClase', [
            'foreignKey' => 'tb_clase_id'
        ]);
        $this->belongsTo('TbFamilias', [
            'foreignKey' => 'tb_familias_id'
        ]);
        $this->belongsTo('TbNombresCientificos', [
            'foreignKey' => 'tb_nombres_cientificos_id'
        ]);
        $this->belongsTo('TbNombresComunes', [
            'foreignKey' => 'tb_nombres_comunes_id'
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
            ->notEmpty('nombre_local')
            ->notBlank('nombre_local','Valor no permitido !')
            ;

        $validator
            ->allowEmpty('observacion');

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
        $rules->add($rules->existsIn(['tb_clase_id'], 'TbClase'));
        $rules->add($rules->existsIn(['tb_familias_id'], 'TbFamilias'));
        $rules->add($rules->existsIn(['tb_nombres_cientificos_id'], 'TbNombresCientificos'));
        $rules->add($rules->existsIn(['tb_nombres_comunes_id'], 'TbNombresComunes'));
        $rules->add($rules->existsIn(['tb_centro_poblado_id'], 'TbCentroPoblado'));
        $rules->add($rules->existsIn(['tb_zabd_id'], 'Zabd'));
        
        $rules->add($rules->isUnique(['tb_clase_id', 'nombre_local','tb_zabd_id','tb_centro_poblado_id'], 'Registro ya existe !'));
        
        return $rules;
    }
}
