<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TempBankInvitro Entity
 *
 * @property int $id
 * @property string $motivo_error
 * @property string $accenumb
 * @property string $fecha_intro
 * @property string $responsible
 * @property string $origin
 * @property string $storoom
 * @property string $temp
 * @property string $shelving
 * @property string $levelshelv
 * @property string $rack
 * @property string $tubenumb
 * @property string $explnumb
 * @property string $stock
 * @property string $tubesize
 * @property string $duplinstname
 * @property string $dupnumb
 * @property string $plastate
 * @property string $necrosis
 * @property string $defoliation 
 * @property string $rooting
 * @property string $chlorosis
 * @property string $phenolization
 * @property string $storage
 * @property string $propagation
 * @property string $conservation
 * @property string $protime
 * @property string $fitostate
 * @property string $pathogen
 * @property string $remarks
 * @property int $resource_id
 * @property int $user_id
 */
class TempBankInvitro extends Entity
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
