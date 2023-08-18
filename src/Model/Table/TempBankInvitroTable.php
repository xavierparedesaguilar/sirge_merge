<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TempBankInvitro Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Passport
 * @property \Cake\ORM\Association\BelongsTo $Resources
 * @property \Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\TempBankInvitro get($primaryKey, $options = [])
 * @method \App\Model\Entity\TempBankInvitro newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TempBankInvitro[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TempBankInvitro|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TempBankInvitro patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TempBankInvitro[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TempBankInvitro findOrCreate($search, callable $callback = null, $options = [])
 *

 */
class TempBankInvitroTable extends Table
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

        $this->setTable('temp_bankinvitro');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        // $this->belongsTo('StationCurrents', [
        //     'foreignKey' => 'station_current_id'
        // ]);
        // $this->belongsTo('StationOrigins', [
        //     'foreignKey' => 'station_origin_id'
        // ]);
        // $this->belongsTo('Resources', [
        //     'foreignKey' => 'resource_id',
        //     'joinType' => 'INNER'
        // ]);
        // $this->belongsTo('Users', [
        //     'foreignKey' => 'user_id',
        //     'joinType' => 'INNER'
        // ]);
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
            ->allowEmpty('motivo_error');

        $validator
            ->allowEmpty('accenumb');

        $validator
            ->allowEmpty('fecha_intro');

        $validator
            ->allowEmpty('responsible');

        $validator
            ->allowEmpty('origin');

        $validator
            ->allowEmpty('storoom');

        $validator
            ->allowEmpty('temp');

        $validator
            ->allowEmpty('shelving');

        $validator
            ->allowEmpty('levelshelv');

        $validator
            ->allowEmpty('rack');

        $validator
            ->allowEmpty('tubenumb');

        $validator
            ->allowEmpty('explnumb');

        $validator
            ->allowEmpty('stock');

        $validator
            ->allowEmpty('tubesize');

        $validator
            ->allowEmpty('duplinstname');

        $validator
            ->allowEmpty('dupnumb');

        $validator
            ->allowEmpty('plastate');

        $validator
            ->allowEmpty('necrosis');

        $validator
            ->allowEmpty('defoliation');

        $validator
            ->allowEmpty('rooting');

        $validator
            ->allowEmpty('chlorosis');

        $validator
            ->allowEmpty('phenolization');

        $validator
            ->allowEmpty('storage');

        $validator
            ->allowEmpty('propagation');

        $validator
            ->allowEmpty('conservation');

        $validator
            ->allowEmpty('protime');

        $validator
            ->allowEmpty('fitostate');

        $validator
            ->allowEmpty('pathogen');

        $validator
            ->allowEmpty('remarks');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    // public function buildRules(RulesChecker $rules)
    // {
    //     $rules->add($rules->existsIn(['station_current_id'], 'StationCurrents'));
    //     $rules->add($rules->existsIn(['station_origin_id'], 'StationOrigins'));
    //     $rules->add($rules->existsIn(['resource_id'], 'Resources'));
    //     $rules->add($rules->existsIn(['user_id'], 'Users'));

    //     return $rules;
    // }
}
