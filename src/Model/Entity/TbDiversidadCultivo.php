<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TbDiversidadCultivo Entity
 *
 * @property int $id
 * @property int $id_asignado
 * @property string $numero_correlativo
 * @property int $tb_centro_poblado_id
 * @property int $tb_cultivo_id
 * @property int $tb_variedades_id
 * @property int $tb_parientes_silvestres_id
 * @property int $tb_nombres_comunes_id
 * @property string $nombre_local
 * @property int $tb_nombres_cientificos_id
 * @property int $tb_familias_id
 * @property string $codigo_zabd_adicional
 * @property int $codigo_accesion_adicional
 * @property string $denominacion_lista_adicional
 * @property string $observacion
 * @property int $tb_tipo_diversidades_id
 * @property int $tb_zabd_id
 * @property int $status
 * @property int $available
 *
 * @property \App\Model\Entity\TbCentroPoblado $tb_centro_poblado
 * @property \App\Model\Entity\TbCultivo $tb_cultivo
 * @property \App\Model\Entity\TbVariedade $tb_variedade
 * @property \App\Model\Entity\TbParientesSilvestre $tb_parientes_silvestre
 * @property \App\Model\Entity\TbNombresComunes $tb_nombres_comunes
 * @property \App\Model\Entity\TbNombresCientifico $tb_nombres_cientifico
 * @property \App\Model\Entity\TbFamilia $tb_familia
 * @property \App\Model\Entity\TbTipoDiversidade $tb_tipo_diversidade
 * @property \App\Model\Entity\TbZabd $tb_zabd
 */
class TbDiversidadCultivo extends Entity
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
