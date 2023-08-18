<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TbEtapaConocimiento Model
 *
 * @property \Cake\ORM\Association\BelongsTo $TbConocimientoTradicionals
 * @property \Cake\ORM\Association\BelongsTo $TbEtapas
 *
 * @method \App\Model\Entity\TbEtapaConocimiento get($primaryKey, $options = [])
 * @method \App\Model\Entity\TbEtapaConocimiento newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TbEtapaConocimiento[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TbEtapaConocimiento|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TbEtapaConocimiento patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TbEtapaConocimiento[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TbEtapaConocimiento findOrCreate($search, callable $callback = null, $options = [])
 */
class TbEtapaConocimientoTable extends Table
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

        $this->setTable('tb_etapa_conocimiento');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('TbConocimientoTradicional', [
            'foreignKey' => 'tb_conocimiento_tradicional_id'
        ]);
        $this->belongsTo('TbEtapa', [
            'foreignKey' => 'tb_etapa_id'
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
        $rules->add($rules->existsIn(['tb_etapa_id'], 'TbEtapa'));
        $rules->add($rules->isUnique(['tb_conocimiento_tradicional_id','tb_etapa_id'], 'Registro ya existe !'));

        return $rules;
    }
}
