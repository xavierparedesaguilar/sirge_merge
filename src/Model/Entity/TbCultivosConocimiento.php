<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TbCultivosConocimiento Entity
 *
 * @property int $id
 * @property int $tb_cultivos_id
 * @property int $tb_conocimientos_tradicionales_id
 * @property int $status
 *
 * @property \App\Model\Entity\TbCultivo $tb_cultivo
 * @property \App\Model\Entity\TbConocimientosTradicionale $tb_conocimientos_tradicionale
 */
class TbCultivosConocimiento extends Entity
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
