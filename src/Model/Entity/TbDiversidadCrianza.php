<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TbDiversidadCrianza Entity
 *
 * @property int $id
 * @property int $tb_crianza_id
 * @property int $tb_nombres_comunes
 * @property int $tb_raza_id
 * @property string $nombre_local
 * @property int $tb_nombres_cientificos
 * @property int $tb_familias_id
 * @property int $observacion
 * @property int $tb_centro_poblado_id
 * @property int $tb_zabd_id
 * @property int $status
 *
 * @property \App\Model\Entity\TbCrianza $tb_crianza
 * @property \App\Model\Entity\TbRaza $tb_raza
 * @property \App\Model\Entity\TbFamilia $tb_familia
 * @property \App\Model\Entity\TbCentroPoblado $tb_centro_poblado
 * @property \App\Model\Entity\TbZabd $tb_zabd
 */
class TbDiversidadCrianza extends Entity
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
