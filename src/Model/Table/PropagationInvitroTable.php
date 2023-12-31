<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PropagationInvitro Model
 *
 * @property \Cake\ORM\Association\BelongsTo $BankInvitro
 *
 * @method \App\Model\Entity\PropagationInvitro get($primaryKey, $options = [])
 * @method \App\Model\Entity\PropagationInvitro newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PropagationInvitro[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PropagationInvitro|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PropagationInvitro patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PropagationInvitro[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PropagationInvitro findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PropagationInvitroTable extends Table
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

        $this->setTable('propagation_invitro');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('BankInvitro', [
            'foreignKey' => 'bank_invitro_id',
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
            ->date('prodate')
            ->allowEmpty('prodate');

        $validator
            ->allowEmpty('propagator');

        $validator
            ->allowEmpty('prorem');

        $validator
            ->allowEmpty('proinicial');

        $validator
            ->integer('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        $validator
            ->allowEmpty('proper');

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
        $rules->add($rules->existsIn(['bank_invitro_id'], 'BankInvitro'));

        return $rules;
    }
}
