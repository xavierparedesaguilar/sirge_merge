<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TbClase Entity
 *
 * @property int $id
 * @property string $clase
 * @property int $tb_tipo_diversidad_id
 * @property int $status
 *
 * @property \App\Model\Entity\TbTipoDiversidad $tb_tipo_diversidad
 * @property \App\Model\Entity\TbDiversidadFauna[] $tb_diversidad_fauna
 */
class TbClase extends Entity
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
