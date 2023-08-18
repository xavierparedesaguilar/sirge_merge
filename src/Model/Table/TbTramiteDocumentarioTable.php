<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TbTramiteDocumentario Model
 *
 * @property \Cake\ORM\Association\BelongsTo $TbTipoDocumentos
 * @property \Cake\ORM\Association\BelongsTo $TbZabds
 *
 * @method \App\Model\Entity\TbTramiteDocumentario get($primaryKey, $options = [])
 * @method \App\Model\Entity\TbTramiteDocumentario newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\TbTramiteDocumentario[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TbTramiteDocumentario|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TbTramiteDocumentario patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TbTramiteDocumentario[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\TbTramiteDocumentario findOrCreate($search, callable $callback = null, $options = [])
 */
class TbTramiteDocumentarioTable extends Table
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

        $this->setTable('tb_tramite_documentario');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('TbTipoDocumento', [
            'foreignKey' => 'tb_tipo_documento_id'
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
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('numero_correlativo');

        $validator
            ->notEmpty('numero_documento', 'Campo obligatorio !')
            ->containsNonAlphaNumeric('numero_documento', 1, 'Valores no permitidos !', '/^[a-z0-9]{3,}$/i');

        $validator
            ->date('fecha_salida')
            ->notEmpty('fecha_salida', 'Campo obligatorio !');

        $validator
            ->date('fecha_ingreso')
            ->allowEmpty('fecha_ingreso');

        $validator
            ->allowEmpty('dirigido_a')
            ->containsNonAlphaNumeric('dirigido_a', 1, 'Valores no permitidos !', '/^[a-z0-9]{3,}$/i')
            ;

        $validator
            ->allowEmpty('asunto_tramite')
            ->containsNonAlphaNumeric('asunto_tramite', 1, 'Valores no permitidos !', '/^[a-z0-9]{3,}$/i')
            ;

        $validator
            ->allowEmpty('referencia_tramite')
            ->containsNonAlphaNumeric('referencia_tramite', 1, 'Valores no permitidos !', '/^[a-z0-9]{3,}$/i')
            ;

        $validator
            ->allowEmpty('numero_folio_expediente');

        $validator
            ->allowEmpty('numero_pagina_expediente');

        $validator
            ->allowEmpty('documentos_adjuntos');

        $validator
            ->allowEmpty('numero_folio_expediente_adjunto');

        $validator
            ->allowEmpty('numero_pagina_expediente_adjunto');

        $validator
            ->allowEmpty('descripcion_tramite');

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
        $rules->add($rules->existsIn(['tb_tipo_documento_id'], 'TbTipoDocumento'));
        $rules->add($rules->existsIn(['tb_zabd_id'], 'Zabd'));

        $rules->add($rules->isUnique(['numero_documento','tb_zabd_id'], 'Registro ya existe !'));

        return $rules;
    }
}
