<?php

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

use PhpMyAdmin\ShapeFile\ShapeFile;
use PhpMyAdmin\ShapeFile\ShapeRecord;
use App\Model\Entity\Pdf;

/**
 * Collection Controller
 *
 * @property \App\Model\Table\CollectionTable $Collection
 */
class GestionMapasZooController extends AppController
{
    public $helpers = array('GoogleMap');

    public function initialize()
    {
        parent::initialize(); // TODO: Change the autogenerated stub
        $this->loadComponent('Csrf');
        $this->mod_modulo = "Gestión de Mapas";
        $this->loadModel('Collection');
        $this->loadModel('Passport');
        $this->loadModel('PassportZoo');
        $this->loadModel('Specie');
        $this->loadModel('GestionMapas');

        $this->loadModel('Module');
        $this->module = $this->Module->find()->where(['controller' => $this->name])->first();
        if(!empty($this->module))
          $this->permiso=$this->Functions->validarModulo($this->module->id);
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {

        if($this->permiso['index']){

            $mod_modulo = $this->mod_modulo;

            $scripts = ['assets/packages/jqueryvalidation/dist/jquery.validate'];

            $collection = $this->Collection->find('list', ['keyField' => 'id', 'valueField' => 'colname'])
                                           ->where(['status' => '1', 'resource_id' => 2, 'availability' => '1'])->order(['colname' => 'ASC']);

            if ($this->request->is('post')) {

                $data = $this->request->getData();

                if(!empty($data['especie'])){

                    return $this->redirect(['action' => 'buscar', 'id' => '1'.$data['especie'] ]);

                } else {

                    return $this->redirect(['action' => 'buscar', 'id' => '2'.$data['coleccion'] ]);
                }
            }

            $this->set(compact('collection', 'mod_modulo', 'scripts'));
            $this->set('_serialize', ['collection']);

        } else {

            $this->Flash->error(__('Operación denegada.'));
            return $this->redirect($this->Auth->redirectUrl());

        }
    }

    public function buscar( $id = NULL )
    {
        $mod_modulo = $this->mod_modulo;

        $scripts = ['assets/packages/jqueryvalidation/dist/jquery.validate'];

        $collection = $this->Collection->find('list', ['keyField' => 'id', 'valueField' => 'colname'])
                                       ->where(['status' => '1', 'resource_id' => 2, 'availability' => 1])->order(['colname' => 'ASC']);

        if(substr($id, 0,1) == '1'){

            $model_especie = $this->Specie->get( substr($id, 1,10000));

            $passport = $this->PassportZoo->find()->contain('Passport.Specie')->innerJoinWith('Passport.Specie')
                                         ->select(['id'        => 'Passport.id',
												   'accname'   => 'Passport.accname',
												   'genus'     => 'Specie.genus',
												   'species'   => 'Specie.species',
												   'accenumb'  => 'Passport.accenumb',
												   'othenumb'  => 'Passport.othenumb',
												   'cropname'  => 'Specie.cropname',
												   'latitude'  => 'PassportZoo.latitude',
												   'longitude' => 'PassportZoo.longitude'])
                                         ->where(['Passport.status' => '1', 'Passport.specie_id' => $model_especie->id,
                                                  'Specie.collection_id' => $model_especie->collection_id, 'Passport.resource_id' => '2'])
                                         ->order(['Passport.accenumb' => 'ASC'])->all();

            $especies    = $this->Specie->find('list', ['keyField' => 'id', 'valueField' => function ($row) {
                                                                            return mb_strtoupper($row['genus'],'UTF-8') . ' ' . mb_strtoupper($row['species'],'UTF-8');
                                                                        }])
                                        ->where(['collection_id' => $model_especie->collection_id , 'status' => '1'])->order(['genus' => 'ASC']);

            $especie_idx   = $model_especie;
            $coleccion_idx = $model_especie->collection_id;

        } else if(substr($id, 0,1) == '2'){

            $model_coleccion = $this->Collection->get( substr($id, 1,10000));

            $passport = $this->PassportZoo->find()->contain('Passport.Specie')->innerJoinWith('Passport.Specie')
                             ->select(['id'        => 'Passport.id',
                                       'accenumb'  => 'Passport.accenumb',
                                       'othenumb'  => 'Passport.othenumb',
                                       'cropname'  => 'Specie.cropname',
                                       'latitude'  => 'PassportZoo.latitude',
                                       'longitude' => 'PassportZoo.longitude'])
                             ->where(['Passport.status' => '1', 'Specie.collection_id' => $model_coleccion->id,
                                      'Passport.resource_id' => '2'])->order(['Passport.accenumb' => 'ASC'])->all();

            $especies = $this->Specie->find('list', ['keyField' => 'id', 'valueField' => function ($row) {
                                                                            return mb_strtoupper($row['genus'],'UTF-8') . ' ' . mb_strtoupper($row['species'],'UTF-8');
                                                                        }])
                                     ->where(['collection_id' => $model_coleccion->id , 'status' => '1'])->order(['genus' => 'ASC']);

            $coleccion_idx = $model_coleccion->id;

        } else {

            $this->Flash->error(__('Hubo un error en la búsqueda. Por favor otra vez intente.'));
            return $this->redirect(['action' => 'index']);
        }

        $contador=0;

        foreach ($passport as $key => $value) {
          if($value->latitude != '' && $value->longitude != '') $contador++;
        }

        $this->set(compact('mod_modulo', 'collection', 'especie_idx', 'coleccion_idx', 'especies', 'passport', 'scripts','contador'));
    }


    public function ver()
    {
        $mod_modulo = $this->mod_modulo;

        if ($this->request->is('post')) {

            $data = $this->request->getData();
			$porciones = explode(",", $data['ids']);

            $x_longitud        = [];
            $y_latitude        = [];
            $list_passport     = [];
            $nombre_cientifico = [];
			
			foreach ($porciones as $a){
				$model = $this->PassportZoo->find()->contain(['Passport.Specie'])->innerJoinWith('Passport.Specie')
                              ->select(['accenumb' => 'Passport.accenumb',
                                        'latitude' => 'PassportZoo.latitude',
                                        'longitude' => 'PassportZoo.longitude',
                                        'id' => 'PassportZoo.id',
                                        'genero' => 'UPPER(Specie.genus)', 'especie' => 'UPPER(Specie.species)',
										'accname' => 'Passport.accname',
										'cropname'  => 'Specie.cropname'
										])
                              ->where([ 'PassportZoo.passport_id' => $a ])->first();

                $rutas[] = [
                                $model->accenumb,
                                floatval($model->latitude),
                                floatval($model->longitude),
                                $model->id,
                                mb_strtoupper($model->genero.' '.$model->especie, 'UTF-8'),
								$model->accname,
								$model->cropname
                            ];

                array_push($x_longitud, $model->longitude);
                array_push($y_latitude, $model->latitude);
                array_push($list_passport, $model->accenumb);
                array_push($nombre_cientifico, mb_strtoupper($model->genero.' '.$model->especie, 'UTF-8'));
				
			}

            /*foreach ($data['passport'] as $key => $value) {

                $model = $this->PassportZoo->find()->contain(['Passport.Specie'])
                              ->select(['accenumb' => 'Passport.accenumb',
                                        'latitude' => 'PassportZoo.latitude',
                                        'longitude' => 'PassportZoo.longitude',
                                        'id' => 'PassportZoo.id',
                                        'genero' => 'UPPER(Specie.genus)', 'especie' => 'UPPER(Specie.species)'])
                              ->where([ 'PassportZoo.passport_id' => $value['passport_id'] ])->first();

                $rutas[] = [
                                $model->accenumb,
                                floatval($model->latitude),
                                floatval($model->longitude),
                                $model->id,
                                mb_strtoupper($model->genero.' '.$model->especie, 'UTF-8')
                            ];

                array_push($x_longitud, $model->longitude);
                array_push($y_latitude, $model->latitude);
                array_push($list_passport, $model->accenumb);
                array_push($nombre_cientifico, mb_strtoupper($model->genero.' '.$model->especie, 'UTF-8'));
            }*/

            ///************************ CREACION DE ARCHIVOS DE SHAPEFILE ************************///
            $shp = new ShapeFile(1, array('xmin' => round(min($x_longitud)), 'ymin' => round(min($y_latitude)), 'xmax' => round(max($x_longitud)), 'ymax' => round(max($y_latitude)) ));

            for ($i=0; $i < count($x_longitud); $i++) {

                $record0 = new ShapeRecord(1);
                $record0->addPoint(array('x' => $x_longitud[$i], 'y' => $y_latitude[$i]));
                $shp->addRecord($record0);
            }

            $shp->setDBFHeader(
                array(
                    array('COD_PER','C', 27, 0 ),
                    array('RECURSO','C', 42, 0 ),
                    array('NAME_CTF','C', 39, 0 ),
                    array('LATITUD','C', 35, 0 ),
                    array('LONGITUD','C', 29, 0 ),
                )
            );

            for ($i=0; $i < count($list_passport); $i++) {

                $shp->records[$i]->DBFData['COD_PER']  = $list_passport[$i];
                $shp->records[$i]->DBFData['RECURSO']  = 'ZOOGENÉTICO';
                $shp->records[$i]->DBFData['NAME_CTF'] = $nombre_cientifico[$i];
                $shp->records[$i]->DBFData['LATITUD']  = $y_latitude[$i];
                $shp->records[$i]->DBFData['LONGITUD'] = $x_longitud[$i];
            }

            $shp->saveToFile(WWW_ROOT.'pass_zoogenetico'.DS.'gestion_mapas'.DS.'shapefile/shp_zoo.*');

            ///******************  COMPRIMIR EN FORMATO ZIP LOS ARCHIVOS CREADOS  *******************//
            $zip = new \ZipArchive();

            $user_id = $this->Auth->User('id');
            $filename = WWW_ROOT.'pass_zoogenetico'.DS.'gestion_mapas'.DS.'shapefile/shp_zoo_'.$user_id.'.zip';
            $directorio = 'pass_zoogenetico'.DS.'gestion_mapas'.DS.'shapefile'.DS;

            if($zip->open($filename, \ZIPARCHIVE::CREATE)===true) {
                    $zip->addFile($directorio.'shp_zoo.dbf');
                    $zip->addFile($directorio.'shp_zoo.shp');
                    $zip->addFile($directorio.'shp_zoo.shx');
                    $zip->close();
            }

            $this->set(compact('mod_modulo', 'rutas'));

        } else {

            return $this->redirect(['action' => 'index']);
        }
    }

    public function importarImagen()
    {
        if ($this->request->is('post')) {

            $data = $this->request->getData();

            if(isset($_POST['boton_1'])){

                header('Content-Type: image/jpeg');

                $src = $data['url_mapa'];
                $desFolder = 'pass_zoogenetico/gestion_mapas/';
                $imageName = 'google_map.jpg';
                $imagePath = $desFolder.$imageName;
                file_put_contents($imagePath,file_get_contents($src));

                $filePath = WWW_ROOT .'pass_zoogenetico'. DS . 'gestion_mapas'. DS .'google_map.jpg';

                if(file_exists($filePath)){

                    $this->response->file($filePath , array('download'=> true));
                    return $this->response;

                } else {

                    $this->Flash->error(__('No existe el archivo. Por favor otra vez intente.'));
                    return $this->redirect(['action' => 'index']);
                }
            }

            if(isset($_POST['boton_2'])){

                header('Content-Type: image/jpeg');

                $src = $data['url_mapa'];
                $desFolder = 'pass_zoogenetico/gestion_mapas/';
                $imageName = 'google_map.tiff';
                $imagePath = $desFolder.$imageName;
                file_put_contents($imagePath,file_get_contents($src));

                $filePath = WWW_ROOT .'pass_zoogenetico'. DS . 'gestion_mapas'. DS .'google_map.tiff';

                if(file_exists($filePath)){

                    $this->response->file($filePath , array('download'=> true));
                    return $this->response;

                } else {

                    $this->Flash->error(__('No existe el archivo. Por favor otra vez intente.'));
                    return $this->redirect(['action' => 'index']);
                }
            }

            if(isset($_POST['boton_3'])){

                header('Content-Type: image/png');

                $src = $data['url_mapa'];
                $desFolder = 'pass_zoogenetico/gestion_mapas/';
                $imageName = 'google_map.png';
                $imagePath = $desFolder.$imageName;
                file_put_contents($imagePath,file_get_contents($src));

                $filePath = WWW_ROOT .'pass_zoogenetico'. DS . 'gestion_mapas'. DS .'google_map.png';

                if(file_exists($filePath)){

                    $header = '';
                    $pdf = new Pdf();
                    $pdf->AliasNbPages();
                    $pdf->AddPage('L');
                    $pdf->SetFont('Arial','',6);

                    $pdf->Image($filePath,25,50,250);

                    $pdf->Output();

                    $this->response->file($filePath , array('download'=> true));
                    return $this->response;

                } else {

                    $this->Flash->error(__('No existe el archivo. Por favor otra vez intente.'));
                    return $this->redirect(['action' => 'index']);
                }
            }

            if(isset($_POST['boton_4'])){

                $user_id = $this->Auth->User('id');

                $filePath = WWW_ROOT.'pass_zoogenetico'.DS.'gestion_mapas'.DS.'shapefile'.DS.'shp_zoo_'.$user_id.'.zip';

                if(file_exists($filePath)){

                    $this->response->file($filePath , array('download'=> true));
                    return $this->response;

                } else {

                    $this->Flash->error(__('No existe el archivo. Por favor otra vez intente.'));
                    return $this->redirect(['action' => 'index']);
                }
            }

        } else {

            return $this->redirect(['action' => 'index']);
        }
    }


}