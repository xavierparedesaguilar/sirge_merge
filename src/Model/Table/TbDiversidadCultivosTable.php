<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TbDiversidadCultivos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $TbCentroPoblados
 * @property \Cake\ORM\Association\BelongsTo $TbCultivos
 * @property \Cake\ORM\Association\BelongsTo $TbVariedades
 * @property \Cake\ORM\Association\BelongsTo $TbParientesSilvestres
 * @property \Cake\ORM\Association\BelongsTo $TbNombresComunes
 * @property \Cake\ORM\Association\BelongsTo $TbNombresCientificos
 * @property \Cake\ORM\Association\BelongsTo $TbFamilias
 * @property \Cake\ORM\Association\BelongsTo $TbTipoDiversidades
 * @property \Cake\ORM\Association\BelongsTo $TbZabds
 *
 * @method \App\Model\Entity\TbDiversidadCultivo get($primaryKey, $options = [])
 * @method \App\Model\Entity\TbDiversidadCultivo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TbDiversidadCultivo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TbDiversidadCultivo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TbDiversidadCultivo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TbDiversidadCultivo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TbDiversidadCultivo findOrCreate($search, callable $callback = null, $options = [])
 */
class TbDiversidadCultivosTable extends Table
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

        $this->setTable('tb_diversidad_cultivos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('TbCentroPoblado', [
            'foreignKey' => 'tb_centro_poblado_id'
        ]);
        $this->belongsTo('TbCultivo', [
            'foreignKey' => 'tb_cultivo_id'
        ]);
        $this->belongsTo('TbVariedades', [
            'foreignKey' => 'tb_variedades_id'
        ]);
        $this->belongsTo('TbParientesSilvestres', [
            'foreignKey' => 'tb_parientes_silvestres_id'
        ]);
        $this->belongsTo('TbNombresComunes', [
            'foreignKey' => 'tb_nombres_comunes_id'
        ]);
        $this->belongsTo('TbNombresCientificos', [
            'foreignKey' => 'tb_nombres_cientificos_id'
        ]);
        $this->belongsTo('TbFamilias', [
            'foreignKey' => 'tb_familias_id'
        ]);
        $this->belongsTo('TbTipoDiversidad', [
            'foreignKey' => 'tb_tipo_diversidad_id'
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
            ->notEmpty('id', 'create');

        $validator
            ->integer('id_asignado')
            ->allowEmpty('id_asignado');

        $validator
            ->allowEmpty('numero_correlativo')
            ->notBlank('numero_correlativo','Valor no permitido !')
            ;

        $validator
            ->notBlank('nombre_local','Valor no permitido !')
            ->notEmpty('nombre_local')
            ;

        $validator
            ->allowEmpty('codigo_zabd_adicional')
            ->notBlank('codigo_zabd_adicional','Valor no permitido !')
            ;

        $validator
            ->integer('codigo_accesion_adicional')
            ->notBlank('codigo_accesion_adicional','Valor no permitido !')
            ->allowEmpty('codigo_accesion_adicional');

        $validator
            ->allowEmpty('denominacion_lista_adicional')
            ->notBlank('denominacion_lista_adicional','Valor no permitido !')
            ;

        $validator
            ->allowEmpty('observacion');

        $validator
            ->integer('status')
            ->allowEmpty('status');

        $validator
            ->integer('available')
            ->allowEmpty('available');

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
        $rules->add($rules->existsIn(['tb_centro_poblado_id'], 'TbCentroPoblado'));
        $rules->add($rules->existsIn(['tb_cultivo_id'], 'TbCultivo'));
        $rules->add($rules->existsIn(['tb_variedades_id'], 'TbVariedades'));
        $rules->add($rules->existsIn(['tb_parientes_silvestres_id'], 'TbParientesSilvestres'));
        $rules->add($rules->existsIn(['tb_nombres_comunes_id'], 'TbNombresComunes'));
        $rules->add($rules->existsIn(['tb_nombres_cientificos_id'], 'TbNombresCientificos'));
        $rules->add($rules->existsIn(['tb_familias_id'], 'TbFamilias'));
        $rules->add($rules->existsIn(['tb_tipo_diversidad_id'], 'TbTipoDiversidad'));
        $rules->add($rules->existsIn(['tb_zabd_id'], 'Zabd'));

        $rules->add($rules->isUnique(['tb_centro_poblado_id','tb_cultivo_id','tb_nombres_comunes_id','nombre_local','tb_zabd_id','tb_nombres_cientificos_id'], 'Registro ya existe !'));
        $rules->add($rules->isUnique(['tb_centro_poblado_id','tb_cultivo_id','tb_variedades_id','tb_parientes_silvestres_id','tb_nombres_comunes_id','nombre_local','tb_zabd_id','tb_nombres_cientificos_id','tb_familias_id'], 'Todo este registro, Ya existe !'));

        return $rules;
    }
}
