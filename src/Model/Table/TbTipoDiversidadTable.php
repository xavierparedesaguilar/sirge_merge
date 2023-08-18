<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TbTipoDiversidad Model
 *
 * @property \Cake\ORM\Association\HasMany $TbDiversidadCultivos
 * @property \Cake\ORM\Association\HasMany $TbFamilias
 * @property \Cake\ORM\Association\HasMany $TbNombreComun
 * @property \Cake\ORM\Association\HasMany $TbNombresCientificos
 * @property \Cake\ORM\Association\HasMany $TbParientesSilvestres
 * @property \Cake\ORM\Association\HasMany $TbVariedades
 *
 * @method \App\Model\Entity\TbTipoDiversidad get($primaryKey, $options = [])
 * @method \App\Model\Entity\TbTipoDiversidad newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TbTipoDiversidad[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TbTipoDiversidad|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TbTipoDiversidad patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TbTipoDiversidad[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TbTipoDiversidad findOrCreate($search, callable $callback = null, $options = [])
 */
class TbTipoDiversidadTable extends Table
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

        $this->setTable('tb_tipo_diversidad');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('TbDiversidadCultivos', [
            'foreignKey' => 'tb_tipo_diversidad_id'
        ]);
        $this->hasMany('TbFamilias', [
            'foreignKey' => 'tb_tipo_diversidad_id'
        ]);
        $this->hasMany('TbNombreComun', [
            'foreignKey' => 'tb_tipo_diversidad_id'
        ]);
        $this->hasMany('TbNombresCientificos', [
            'foreignKey' => 'tb_tipo_diversidad_id'
        ]);
        $this->hasMany('TbParientesSilvestres', [
            'foreignKey' => 'tb_tipo_diversidad_id'
        ]);
        $this->hasMany('TbVariedades', [
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
            ->notEmpty('tipo_diversidad');

        $validator
            ->integer('status')
            ->allowEmpty('status');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['tipo_diversidad'], 'Registro ya existe !'));

        return $rules;
    }
}
