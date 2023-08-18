<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TbComunidad Entity
 *
 * @property int $id
 * @property string $nombre_comunidad
 * @property string $antecendente
 * @property string $nom_predio
 * @property string $folio_exp
 * @property string $pagina_exp
 * @property string $partida_ectronica
 * @property string $ficha_registral
 * @property float $superficie_pe
 * @property float $superficie_cat
 * @property float $superfice_comunidad_zabd
 * @property float $porcentaje_supeficie_zabd
 * @property int $altitud_min
 * @property int $altitud_max
 * @property int $altitud_inter
 * @property string $availability
 * @property string $status
 * @property int $tb_zabd_id
 */
class TbComunidad extends Entity
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
