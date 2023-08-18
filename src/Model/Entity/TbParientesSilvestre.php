<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TbParientesSilvestre Entity
 *
 * @property int $id
 * @property string $pariente_silvestre
 * @property int $tb_tipo_diversidad_id
 * @property int $status
 *
 * @property \App\Model\Entity\TbTipoDiversidad $tb_tipo_diversidad
 */
class TbParientesSilvestre extends Entity
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
