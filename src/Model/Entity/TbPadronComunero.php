<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TbPadronComunero Entity
 *
 * @property int $id
 * @property int $id_asignado
 * @property int $numero_correlativo
 * @property int $tipo_documento
 * @property string $numero_documento_identidad
 * @property string $nombres_apellidos
 * @property string $fecha_nacimiento
 * @property string $genero
 * @property int $ubigeo_id
 * @property int $tb_centro_poblado_id
 * @property string $observacion1
 * @property string $observacion2
 * @property int $tb_zabd_id
 * @property int $status
 *
 * @property \App\Model\Entity\Ubigeo $ubigeo
 * @property \App\Model\Entity\TbCentroPoblado $tb_centro_poblado
 * @property \App\Model\Entity\TbZabd $tb_zabd
 */
class TbPadronComunero extends Entity
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
