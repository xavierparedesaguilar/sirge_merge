<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TbCentroPoblado Entity
 *
 * @property int $id
 * @property string $centro_poblado
 * @property int $tb_organizacion_id
 * @property int $tb_comunidad_id
 * @property int $status
 *
 * @property \App\Model\Entity\TbOrganizacion $tb_organizacion
 * @property \App\Model\Entity\TbComunidad $tb_comunidad
 * @property \App\Model\Entity\TbDiversidadCultivo[] $tb_diversidad_cultivo
 * @property \App\Model\Entity\TbDiversidadFauna[] $tb_diversidad_fauna
 * @property \App\Model\Entity\TbDiversidadFlora[] $tb_diversidad_flora
 * @property \App\Model\Entity\TbPadronComunero[] $tb_padron_comuneros
 * @property \App\Model\Entity\TbPadronComuneros2[] $tb_padron_comuneros2
 */
class TbCentroPoblado extends Entity
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
