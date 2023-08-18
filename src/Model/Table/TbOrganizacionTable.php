<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TbOrganizacion Model
 *
 * @property \Cake\ORM\Association\HasMany $TbCentroPoblado
 *
 * @method \App\Model\Entity\TbOrganizacion get($primaryKey, $options = [])
 * @method \App\Model\Entity\TbOrganizacion newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TbOrganizacion[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TbOrganizacion|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TbOrganizacion patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TbOrganizacion[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TbOrganizacion findOrCreate($search, callable $callback = null, $options = [])
 */
class TbOrganizacionTable extends Table
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

        $this->setTable("tb_organizacion");
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('TbCentroPoblado', [
            'foreignKey' => 'tb_organizacion_id'
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
            ->notEmpty('nombre_organizacion');

        $validator
            ->integer('status')
            ->allowEmpty('status');

        return $validator;
    }
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['nombre_organizacion'], 'Registro ya existe !'));

        return $rules;
    }
    
}
