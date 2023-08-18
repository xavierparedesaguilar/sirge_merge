<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TbEtapa Model
 *
 * @property \App\Model\Table\TbEtapaConocimientoTable|\Cake\ORM\Association\HasMany $TbEtapaConocimiento
 *
 * @method \App\Model\Entity\TbEtapa get($primaryKey, $options = [])
 * @method \App\Model\Entity\TbEtapa newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TbEtapa[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TbEtapa|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TbEtapa patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TbEtapa[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TbEtapa findOrCreate($search, callable $callback = null, $options = [])
 */
class TbEtapaTable extends Table
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

        $this->setTable('tb_etapa');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('TbEtapaConocimiento', [
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
            ->notEmpty('etapa')
            ->notBlank('etapa','Valor no permitido !')
            ;

        $validator
            ->integer('status')
            ->allowEmpty('status');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['etapa'], 'Registro ya existe !'));

        return $rules;
    }
}
