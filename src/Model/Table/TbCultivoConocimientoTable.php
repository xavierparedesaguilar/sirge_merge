<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TbCultivoConocimiento Model
 *
 * @property \App\Model\Table\TbConocimientoTradicionalsTable|\Cake\ORM\Association\BelongsTo $TbConocimientoTradicionals
 * @property \App\Model\Table\TbCultivosTable|\Cake\ORM\Association\BelongsTo $TbCultivos
 *
 * @method \App\Model\Entity\TbCultivoConocimiento get($primaryKey, $options = [])
 * @method \App\Model\Entity\TbCultivoConocimiento newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TbCultivoConocimiento[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TbCultivoConocimiento|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TbCultivoConocimiento patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TbCultivoConocimiento[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TbCultivoConocimiento findOrCreate($search, callable $callback = null, $options = [])
 */
class TbCultivoConocimientoTable extends Table
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

        $this->setTable('tb_cultivo_conocimiento');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('TbConocimientoTradicional', [
            'foreignKey' => 'tb_conocimiento_tradicional_id'
        ]);
        $this->belongsTo('TbCultivo', [
            'foreignKey' => 'tb_cultivo_id'
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
        $rules->add($rules->existsIn(['tb_conocimiento_tradicional_id'], 'TbConocimientoTradicional'));
        $rules->add($rules->existsIn(['tb_cultivo_id'], 'TbCultivo'));

        return $rules;
    }
}
