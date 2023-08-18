<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TbTipoDocumento Model
 *
 * @property \Cake\ORM\Association\HasMany $TbTramiteDocumentario
 *
 * @method \App\Model\Entity\TbTipoDocumento get($primaryKey, $options = [])
 * @method \App\Model\Entity\TbTipoDocumento newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TbTipoDocumento[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TbTipoDocumento|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TbTipoDocumento patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TbTipoDocumento[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TbTipoDocumento findOrCreate($search, callable $callback = null, $options = [])
 */
class TbTipoDocumentoTable extends Table
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

        $this->setTable('tb_tipo_documento');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('TbTramiteDocumentario', [
            'foreignKey' => 'tb_tipo_documento_id'
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
            ->notEmpty('tipo_documento');

        $validator
            ->integer('status')
            ->allowEmpty('status');

        return $validator;
    }
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['tipo_documento'], 'Registro ya existe !'));

        return $rules;
    }
}
