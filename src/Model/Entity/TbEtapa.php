<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TbEtapa Entity
 *
 * @property int $id
 * @property string $etapa
 * @property int $status
 *
 * @property \App\Model\Entity\TbEtapaConocimiento[] $tb_etapa_conocimiento
 */
class TbEtapa extends Entity
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
