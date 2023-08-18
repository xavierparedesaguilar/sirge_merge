<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TbRecorrido Entity
 *
 * @property int $id
 * @property string $ruta_recorrido
 * @property int $distancia_recorrido
 * @property float $tiempo_recorrido_particular
 * @property float $tiempo_recorrido_popular
 * @property string $referencia_recorrido
 * @property int $tb_zabd_id
 *
 * @property \App\Model\Entity\TbZabd $tb_zabd
 */
class TbRecorrido extends Entity
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
