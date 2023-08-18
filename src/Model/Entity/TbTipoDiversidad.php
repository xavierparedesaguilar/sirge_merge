<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TbTipoDiversidad Entity
 *
 * @property int $id
 * @property string $tipo_diversidad
 * @property int $status
 *
 * @property \App\Model\Entity\TbDiversidadCultivo[] $tb_diversidad_cultivos
 * @property \App\Model\Entity\TbFamilia[] $tb_familias
 * @property \App\Model\Entity\TbNombreComun[] $tb_nombre_comun
 * @property \App\Model\Entity\TbNombresCientifico[] $tb_nombres_cientificos
 * @property \App\Model\Entity\TbParientesSilvestre[] $tb_parientes_silvestres
 * @property \App\Model\Entity\TbVariedade[] $tb_variedades
 */
class TbTipoDiversidad extends Entity
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
