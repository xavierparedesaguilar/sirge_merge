<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

use Cake\Datasource\ConnectionManager;
use Cake\Database\StatementInterface;
use PDO;
/**
 * TbConocimientoTradicional Entity
 *
 * @property int $id
 * @property int $numero_correlativo
 * @property string $nombre_tradicional_conocimiento
 * @property int $tb_sector_id
 * @property int $tb_metodo_id
 * @property string $descripcion
 * @property int $zabd_id
 *
 * @property \App\Model\Entity\TbSector $tbSector
 * @property \App\Model\Entity\TbMetodo $tbMetodo
 * @property \App\Model\Entity\Zabd $zabd
 */
class TbConocimientoTradicional extends Entity
{
    protected function _getCodigo()
    {
        $total = TableRegistry::get('TbConocimientoTradicional')->find()->count();
        if ($total > 0) {
            $result = $total + 1;
        } else {
            $result = 1;
        }
        return $result;
    }
    // protected function _getId()
    // {
    //     $total = TableRegistry::get('TbConocimientoTradicional')->find('list',['keyField' => 'id', 'valueField' => 'id'])->limit(1)->orderDesc('id')->first();

    //     if ($total > 0) {
    //         $result = $total + 1;
    //     } else {
    //         $result = 1;
    //     }
    //     return $result;
    // }
}
