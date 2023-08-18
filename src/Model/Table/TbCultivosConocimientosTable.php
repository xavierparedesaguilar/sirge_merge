<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TbCultivosConocimientos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $TbCultivos
 * @property \Cake\ORM\Association\BelongsTo $TbConocimientosTradicionales
 *
 * @method \App\Model\Entity\TbCultivosConocimiento get($primaryKey, $options = [])
 * @method \App\Model\Entity\TbCultivosConocimiento newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TbCultivosConocimiento[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TbCultivosConocimiento|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TbCultivosConocimiento patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TbCultivosConocimiento[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TbCultivosConocimiento findOrCreate($search, callable $callback = null, $options = [])
 */
class TbCultivosConocimientosTable extends Table
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

        $this->setTable('tb_cultivos_conocimientos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('TbCultivos', [
            'foreignKey' => 'tb_cultivos_id'
        ]);
        $this->belongsTo('TbConocimientosTradicionales', [
            'foreignKey' => 'tb_conocimientos_tradicionales_id'
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
        $rules->add($rules->existsIn(['tb_cultivos_id'], 'TbCultivos'));
        $rules->add($rules->existsIn(['tb_conocimientos_tradicionales_id'], 'TbConocimientosTradicionales'));

        return $rules;
    }
}
