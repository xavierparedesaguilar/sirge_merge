<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * DescriptorValue Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Passport
 * @property \Cake\ORM\Association\BelongsTo $Descriptor
 *
 * @method \App\Model\Entity\DescriptorValue get($primaryKey, $options = [])
 * @method \App\Model\Entity\DescriptorValue newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\DescriptorValue[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\DescriptorValue|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\DescriptorValue patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\DescriptorValue[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\DescriptorValue findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DescriptorValueTable extends Table
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

        $this->setTable('descriptor_value');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Passport', [
            'foreignKey' => 'passport_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Descriptor', [
            'foreignKey' => 'descriptor_id',
            'joinType' => 'INNER'
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
            ->allowEmpty('value');

        $validator
            ->integer('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

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
        $rules->add($rules->existsIn(['passport_id'], 'Passport'));
        $rules->add($rules->existsIn(['descriptor_id'], 'Descriptor'));

        return $rules;
    }
}
