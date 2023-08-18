<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TbCultivoConocimiento Entity
 *
 * @property int $id
 * @property int $tb_conocimiento_tradicional_id
 * @property int $tb_cultivo_id
 * @property int $status
 *
 * @property \App\Model\Entity\TbConocimientoTradicional $tb_conocimiento_tradicional
 * @property \App\Model\Entity\TbCultivo $tb_cultivo
 */
class TbCultivoConocimiento extends Entity
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
