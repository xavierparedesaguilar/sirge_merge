<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TbConocimientoTradicional Model
 *
 * @property \App\Model\Table\TbSectorTable|\Cake\ORM\Association\BelongsTo $TbSector
 * @property \App\Model\Table\tbMetodoTable|\Cake\ORM\Association\BelongsTo $tbMetodo
 * @property \App\Model\Table\ZabdTable|\Cake\ORM\Association\BelongsTo $Zabd
 *
 * @method \App\Model\Entity\TbConocimientoTradicional get($primaryKey, $options = [])
 * @method \App\Model\Entity\TbConocimientoTradicional newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TbConocimientoTradicional[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TbConocimientoTradicional|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TbConocimientoTradicional patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TbConocimientoTradicional[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TbConocimientoTradicional findOrCreate($search, callable $callback = null, $options = [])
 */
class TbConocimientoTradicionalTable extends Table
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

        $this->setTable('tb_conocimiento_tradicional');

        $this->belongsTo('TbSector', [
            'foreignKey' => 'tb_sector_id'
        ]);
        $this->belongsTo('TbMetodo', [
            'foreignKey' => 'tb_metodo_id'
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
            ->allowEmpty('id');

        $validator
            ->integer('numero_correlativo')
            ->allowEmpty('numero_correlativo');

        $validator
            ->notEmpty('nombre_tradicional_conocimiento');

        $validator
            ->notEmpty('descripcion');
            // ->containsNonAlphaNumeric('descripcion', 1, 'Valores no permitidos', '/^[a-z0-9]{3,}$/i');

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
        $rules->add($rules->existsIn(['tb_sector_id'], 'TbSector'));
        $rules->add($rules->existsIn(['tb_metodo_id'], 'TbMetodo'));
        $rules->add($rules->existsIn(['tb_zabd_id'], 'Zabd'));
        $rules->add($rules->isUnique(['nombre_tradicional_conocimiento', 'descripcion', 'tb_zabd_id'],'Registro ya existe !'));

        return $rules;
    }
}
