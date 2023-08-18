<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TbTramiteDocumentario Entity
 *
 * @property int $id
 * @property string $numero_correlativo
 * @property int $tb_tipo_documento_id
 * @property int $numero_documento
 * @property \Cake\I18n\FrozenTime $fecha_salida
 * @property \Cake\I18n\FrozenTime $fecha_ingreso
 * @property string $dirigido_a
 * @property string $asunto_tramite
 * @property string $referencia_tramite
 * @property string $numero_folio_expediente
 * @property int $numero_pagina_expediente
 * @property string $descripcion_documentos_adjuntos
 * @property string $numero_folio_expediente_1
 * @property int $numero_pagina_expediente_2
 * @property string $descripcion_tramite
 * @property int $tb_zabd_id
 * @property int $status
 *
 * @property \App\Model\Entity\TbTipoDocumento $tb_tipo_documento
 * @property \App\Model\Entity\TbZabd $tb_zabd
 */
class TbTramiteDocumentario extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
