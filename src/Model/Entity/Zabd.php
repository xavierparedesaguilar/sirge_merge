<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

use Cake\ORM\TableRegistry;

use Cake\Datasource\ConnectionManager;
use Cake\Database\StatementInterface;
use PDO;

 /**
  * Zabd Entity

* @property int $id
* @property string $cod_zabd
* @property string $nombre
* @property string $resolucion
* @property string $doc_resolucion
* @property \Cake\I18n\FrozenDate $fec_reconocimiento
* @property int $ubigeo_id
* @property int $area
* @property float $latitud
* @property float $longitud
* @property int $altitud_max
* @property int $altitud_min
* @property string $doc_georeferenciacion
* @property string $mapa_img
* @property string $observacion
* @property string $availability
* @property string $status
*
* @property \App\Model\Entity\User $user
* @property \App\Model\Entity\Ubigeo $ubigeo
* @property \App\Model\Entity\Station $station
* @property \App\Model\Entity\InsituAccesion[] $insitu_accesion
* @property \App\Model\Entity\InsituFarmerActivity[] $insitu_farmer_activity
* @property \App\Model\Entity\InsituPlage[] $insitu_plage
* @property \App\Model\Entity\InsituThreat[] $insitu_threat
*/


class Zabd extends Entity
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
        // 'distrito' => true
    ];

    /**  Obtiene el codigo autogenerado para insitu **/
    protected function _getCodigo()
    {
        $total = TableRegistry::get('Zabd')->find()->count();
        if ($total > 0) {
            $result = $total + 1;
        } else {
            $result = 1;
        }
        return $result;
    }

    /**  OBTIENE GRADO DE INSTRUCCION **/
    protected function _getGradoInstruccion()
    {
        $result = TableRegistry::get('OptionList')->find()->where(['id' => $this->_properties['degree_instruction']])->first();

        return $result;
    }

    /**  OBTIENE TIPO SUELO **/
    protected function _getTipoSuelo()
    {
        $result = TableRegistry::get('OptionList')->find()->where(['id' => $this->_properties['type_soil']])->first();

        return $result;
    }

    /********************** VALIDACION QUE NO TENGA REGISTROS ASOCIADOS  ***********************/
    protected function _getValidacionInsitu()
    {
        $conn = ConnectionManager::get('default');
        $stmt = $conn->prepare('
            SELECT SUM(s.total) AS total FROM (
                SELECT COUNT(*) AS total FROM zabd_accesion AS a WHERE a.zabd_id = :id AND a.status = 1
                UNION ALL
                SELECT COUNT(*) AS total FROM zabd_farmer_activity AS a WHERE a.zabd_id = :id AND a.status = 1
                UNION ALL
                SELECT COUNT(*) AS total FROM zabd_plage AS a WHERE a.zabd_id = :id AND a.status = 1
                UNION ALL
                SELECT COUNT(*) AS total FROM zabd_threat AS a WHERE a.zabd_id = :id AND a.status = 1
            ) s;');

        $stmt->bindValue(':id', $this->_properties['id'], PDO::PARAM_INT);
        $stmt->execute();
        $valor = $stmt->fetch('assoc');

        return $valor['total'];
    }

    protected function getZabd()
    {
        $this->connection = ConnectionManager::get('default');
        $meritlists = $this->connection->execute("SELECT * FROM vw_listar_las_zabd;")->fetchAll('assoc');
        return $meritlists;
    }
}
