<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TbTipoDocumento Entity
 *
 * @property int $id
 * @property string $tipo_documento
 * @property int $status
 *
 * @property \App\Model\Entity\TbTramiteDocumentario[] $tb_tramite_documentario
 */
class TbTipoDocumento extends Entity
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
