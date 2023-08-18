<?php

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\Datasource\ConnectionManager;

/**
 * Insitu Controller
 *
 * @property \App\Model\Table\ZabdTable $Zabd
 *
 * @method \App\Model\Entity\Zabd[] paginate($object = null, array $settings = [])
 */
class ZabdController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Csrf');
        $this->mod_modulo = "zona de agrobiodiversidad"; //nombre que se reflejará en la vista
        $this->mod_title = "zona de agrobiodiversidad";
        $this->loadModel('Zabd');
        $this->loadModel('Ubigeo');
        $this->loadModel('OptionList');
        // $this->servidor = null;
        $this->loadModel('Module');
        $this->module = $this->Module->find()->where(['controller' => $this->name])->first();
        if (!empty($this->module))
            $this->permiso = $this->Functions->validarModulo($this->module->id);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */

    public function index()
    {
        $zabd = $this->Zabd->find()->contain(['Ubigeo'])->order(['Zabd.id DESC'])->where(['Zabd.status !=' => '0']);
        if ($zabd != NULL && $this->permiso['index']) {
            // $this->permiso['index']
            $mod_modulo = $this->mod_modulo;
            $mod_title = $this->mod_title;
            $permiso = $this->permiso;
            $styles = ['assets/css/dataTables.bootstrap', 'assets/css/select.bootstrap.min'];
            $scripts = [
                'assets/js/select2/select2',
                'assets/js/datatable/jquery.dataTables.min',
                'assets/js/datatable/dataTables.bootstrap.min',
                'assets/js/datatable/dataTables.select.min'
            ];
            echo "Loading";
  
            $this->set(compact('zabd', 'mod_modulo', 'styles', 'scripts', 'permiso'));
            $this->set('_serialize', ['zabd']);
        } else {
            $this->Flash->error(__('Operación denegada'));
            return $this->redirect($this->Auth->redirectUrl());
        }
    }

    /**
     * View method
     *
     * @param string|null $id Insitu id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        if ($this->permiso['view']) {

            // $zabd = $this->Zabd->find()->contain(['User', 'Ubigeo', 'InsituAccesion', 'InsituFarmerActivity', 'InsituPlage', 'InsituThreat'])->where(['Zabd.id' => $id])->first();
            $zabd = $this->Zabd->find()->contain(['Ubigeo'])->where(['Zabd.id' => $id])->first();

            if ($zabd != NULL) {
                $mod_modulo = $this->mod_modulo;
                $permiso = $this->permiso;
                $this->set(compact('zabd', 'mod_modulo', 'permiso'));
                // $this->set(compact('zabd'));
                $this->set('_serialize', ['zabd']);
            } else {
                $this->Flash->error(__('Operación denegada.'));
                return $this->redirect(['action' => 'index', 'controller' => 'Zabd']);
            }
        } else {
            $this->Flash->error(__('Operación denegada.'));
            return $this->redirect(['action' => 'index', 'controller' => 'Zabd']);
        }
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        if ($this->permiso['add']) {
            $zabd = $this->Zabd->newEntity();
            $scripts = ['assets/js/fileinput/fileinput.min', 'assets/packages/jqueryvalidation/dist/jquery.validate'];
            if ($this->request->is('post')) {
                $data = $this->request->getData();
                $data['status'] = '1';
                $data['cod_zabd'] = 'ZABD' . str_pad($zabd->codigo, 4, "0", STR_PAD_LEFT);
                $data['resolucion'] = $this->Functions->Mayu($data['resolucion']);

                if ($data['fec_reconocimientos'] != '' && date('Y-m-d', strtotime($data['fec_reconocimientos'])) <= date("Y-m-d", strtotime(date('Y-m-d')))) {
                    $data['fec_reconocimiento'] = date('Y-m-d', strtotime($data['fec_reconocimientos']));
                } else {
                    $data['fec_reconocimiento'] = '';
                }

                if (empty($data['provincia']) || empty($data['distrito'])) {
                    $data['ubigeo_id'] = '';
                }
                $data['user_id'] = $this->Auth->User('id');
                /****  Carga de Imagenes  ***/

                $baseUrl = WWW_ROOT . 'zabd' . DS;

                /********* Load Imagen Mapa *********/
                $newNameFile2 = 'imagen_' . $data['cod_zabd'] . '.jpg';
                $routeFile2 = $baseUrl . basename($newNameFile2);
                // var_dump(json_encode($routeFile2)); exit; 

                if (move_uploaded_file($data['file_1']['tmp_name'], $routeFile2)) {
                    $data['mapa_img'] = 'zabd/' . $newNameFile2;
                }
                if ($this->servidor) {
                    $routeIniaFile2 = '../../inia_web/modulos/es/img/zabd' . DS . $data['file_1']['name'];
                    copy($routeFile2, $routeIniaFile2);
                }
                /********* Load Resolucion PDF *********/
                $newNameFile2 = 'resolucion_' . $data['cod_zabd'] . '.pdf';
                $routeFile2 = $baseUrl . basename($newNameFile2);
                if (move_uploaded_file($data['file_2']['tmp_name'], $routeFile2)) {
                    $data['doc_resolucion'] = 'zabd/' . $newNameFile2;
                }
                if ($this->servidor) {
                    $routeIniaFile2 = '../../inia_web/modulos/es/img/zabd' . DS . $data['file_2']['name'];
                    copy($routeFile2, $routeIniaFile2);
                }
                /********* Load Resolucion PDF *********/
                $newNameFile2 = 'poligono_' . $data['cod_zabd'] . '.xlsx';
                $routeFile2 = $baseUrl . basename($newNameFile2);
                if (move_uploaded_file($data['file_3']['tmp_name'], $routeFile2)) {
                    $data['doc_georeferenciacion'] = 'zabd/' . $newNameFile2;
                }
                if ($this->servidor) {
                    $routeIniaFile2 = '../../inia_web/modulos/es/img/zabd' . DS . $data['file_3']['name'];
                    copy($routeFile2, $routeIniaFile2);
                }

                $zabd = $this->Zabd->patchEntity($zabd, $data);
                if ($this->Zabd->save($zabd)) {
                    $list_module = explode('/', $this->request->params['_matchedRoute']);
                    $user_id = $this->Auth->User('id');
                    $module = $list_module[(count($list_module) - 2)];
                    $action = $list_module[(count($list_module) - 1)];
                    $station_id = $zabd->id;
                    $recurso_id = '4';
                    // $this->Functions->saveLogWeb($module, $station_id, $action, $user_id, $recurso_id);
                    $this->Flash->success(__('zona de agrobiodiversidad creado satisfactoriamente.'));
                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('VERIFICAR CAMPOS OBLIGATORIOS  (*),  Y QUE SEAN CORRECTOS !'));
            }
            $mod_modulo = $this->mod_modulo;
            $mod_title = $this->mod_title;
            $departamento = $this->Ubigeo->find('list', ['keyField' => 'cod_dep', 'valueField' => 'nombre'])->where(['cod_pro' => 0]);
            $this->set(compact('zabd', 'mod_modulo', 'mod_title', 'departamento', 'scripts'));
            $zabd->fec_reconocimiento = ($zabd->fec_reconocimiento == NULL) ? NULL : date('d-m-Y', strtotime($zabd->fec_reconocimiento));

            $this->set('_serialize', ['zabd']);
        } else {
            $this->Flash->error(__('Operación denegada.'));
            return $this->redirect(['action' => 'index', 'controller' => 'Zabd']);
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Insitu id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */

    public function edit($id = null)
    {
        if ($this->permiso['edit']) {
            $zabd = $this->Zabd->find()->where(['Zabd.id' => $id, 'Zabd.status' => '1'])->contain(['Ubigeo'])->first();
            $scripts = ['assets/js/fileinput/fileinput.min', 'assets/packages/jqueryvalidation/dist/jquery.validate'];

            if ($zabd != NULL) {
                if ($this->request->is(['patch', 'post', 'put'])) {
                    $data = $this->request->getData();

                    if ($data['fec_reconocimientos'] != '' && date('Y-m-d', strtotime($data['fec_reconocimientos'])) <= date("Y-m-d", strtotime(date('Y-m-d')))) {

                        $data['fec_reconocimiento'] = date('Y-m-d', strtotime($data['fec_reconocimientos']));
                    } else {
                        $data['fec_reconocimiento'] = '';
                    }

                    if (empty($data['provincia']) || empty($data['distrito'])) {
                        $data['ubigeo_id'] = '';
                    }
                    /****  Carga de Imagenes  ***/
                    $baseUrl = WWW_ROOT . 'zabd' . DS;
                    /********* Load Imagen Mapa *********/
                    if (!empty($data['file_1'])) {
                        $newNameFile1 = 0;
                        if (is_null($zabd['mapa_img'])) {
                            $newNameFile1 = 'imagen_' . $zabd['cod_zabd'] . '.jpg';
                        } else {
                            $newNameFile1 = explode('/', $zabd['mapa_img']);
                            $newNameFile1 = $newNameFile1[1];
                        }
                        $data['file_1']['name'] = $newNameFile1;
                        $routeFile1 = $baseUrl . basename($data['file_1']['name']);
                        if (move_uploaded_file($data['file_1']['tmp_name'], $routeFile1)) {
                            $data['mapa_img'] = 'zabd/' . $newNameFile1;
                        }
                    }

                    /********* Load Resolucion PDF doc_resolucion pdf *********/
                    if (!empty($data['file_2'])) {
                        $newNameFile2 = 0;
                        if (is_null($zabd['doc_resolucion'])) {
                            $newNameFile2 = 'resolucion_' . $zabd['cod_zabd'] . '.pdf';
                        } else {
                            $newNameFile2 = explode('/', $zabd['doc_resolucion']);
                            $newNameFile2 = $newNameFile2[1];
                        }
                        $data['file_2']['name'] = $newNameFile2;
                        $routeFile2 = $baseUrl . basename($data['file_2']['name']);
                        if (move_uploaded_file($data['file_2']['tmp_name'], $routeFile2)) {
                            $data['doc_resolucion'] = 'zabd/' . $newNameFile2;
                        }
                    }

                    /********* Load GEORREFENCIACION XLS  doc_georeferenciacion  xlsx   *********/
                    if (!empty($data['file_3'])) {
                        $newNameFile3 = 0;
                        if (is_null($zabd['doc_georeferenciacion'])) {
                            $newNameFile3 = 'poligono_' . $zabd['cod_zabd'] . '.xlsx';
                        } else {
                            $newNameFile3 = explode('/', $zabd['doc_georeferenciacion']);
                            $newNameFile3 = $newNameFile3[1];
                        }
                        $data['file_3']['name'] = $newNameFile3;
                        $routeFile3 = $baseUrl . basename($data['file_3']['name']);
                        if (move_uploaded_file($data['file_3']['tmp_name'], $routeFile3)) {
                            $data['doc_georeferenciacion'] = 'zabd/' . $newNameFile3;
                        }
                    }


                    // if (!($zabd->doc_resolucion) && empty($data['file_2']['tmp_name'])) {
                    //     $data['doc_resolucion'] =  '';
                    // } else {
                    //     $newNameFile2 = 'resolucion_' . $data['cod_zabd'] . '.pdf';
                    //     $routeFile2 = $baseUrl . basename($newNameFile2);
                    //     if (move_uploaded_file($data['file_2']['tmp_name'], $routeFile2)) {
                    //         $data['doc_resolucion'] = 'zabd/' . $newNameFile2;
                    //     }
                    //     if ($this->servidor) {
                    //         $routeIniaFile2 = '../../inia_web/modulos/es/img/zabd' . DS . $data['file_2']['name'];
                    //         copy($routeFile2, $routeIniaFile2);
                    //     }
                    // }

                    /********* Load Resolucion PDF ***8******/
                    if ($this->servidor) {
                        if ($data['file_1']['error'] != 4) {
                            $routeIniaFile1 = '../../inia_web/modulos/es/img/zabd' . DS . $data['file_1']['name'];
                            copy($routeFile1, $routeIniaFile1);
                            $routeIniaFile1 = '../../inia_web/modulos/en/img/zabd' . DS . $data['file_1']['name'];
                            copy($routeFile1, $routeIniaFile1);
                        }
                        if ($data['file_2']['error'] != 4) {
                            $routeIniaFile2 = '../../inia_web/modulos/es/img/zabd' . DS . $data['file_2']['name'];
                            copy($routeFile2, $routeIniaFile2);
                            $routeIniaFile2 = '../../inia_web/modulos/en/img/zabd' . DS . $data['file_2']['name'];
                            copy($routeFile2, $routeIniaFile2);
                        }

                        if ($data['file_3']['error'] != 4) {
                            $routeIniaFile3 = '../../inia_web/modulos/es/img/zabd' . DS . $data['file_3']['name'];
                            copy($routeFile3, $routeIniaFile3);
                            $routeIniaFile3 = '../../inia_web/modulos/en/img/zabd' . DS . $data['file_3']['name'];
                            copy($routeFile3, $routeIniaFile3);
                        }
                    }

                    $zabd = $this->Zabd->patchEntity($zabd, $data);
                    if ($this->Zabd->save($zabd)) {
                        $list_module = explode('/', $this->request->params['_matchedRoute']);
                        $user_id = $this->Auth->User('id');
                        $module = $list_module[(count($list_module) - 3)];
                        $action = $list_module[(count($list_module) - 2)];
                        $station_id = $zabd->id;
                        $recurso_id = '4';
                        // $this->Functions->saveLogWeb($module, $station_id, $action, $user_id, $recurso_id);
                        $this->Flash->success(__('zona de agrobiodiversidad actualizado satisfactoriamente.'));
                        return $this->redirect(['action' => 'index']);
                    }
                    $this->Flash->error(__('VERIFICAR CAMPOS OBLIGATORIOS  (*),  Y QUE SEAN CORRECTOS !'));
                }
                $mod_modulo = $this->mod_modulo;
                $mod_title = $this->mod_title;
                $departamento = $this->Ubigeo->find('list', ['keyField' => 'cod_dep', 'valueField' => 'nombre'])->where(['cod_pro' => 0]);
                if ($zabd->ubigeo_id != NULL || $zabd->ubigeo_id != '') {
                    $provincias = $this->Ubigeo->find('list', ['keyField' => 'cod_pro', 'valueField' => 'nombre'])->where(['cod_dep' => $zabd['ubigeo']['cod_dep'], 'cod_pro !=' => 0, 'cod_dis' => 0]);
                    $distritos = $this->Ubigeo->find('list', ['keyField' => 'id', 'valueField' => 'nombre'])->where(['cod_dep' => $zabd['ubigeo']['cod_dep'], 'cod_pro' => $zabd['ubigeo']['cod_pro'], 'cod_dis !=' => 0]);
                } else {
                    $provincias = [];
                    $distritos = [];
                }

                $zabd->fec_reconocimiento = $zabd->fec_reconocimiento == (NULL) ? NULL : date('d-m-Y', strtotime($zabd->fec_reconocimiento));
                $this->set(compact('zabd', 'mod_modulo', 'mod_title', 'departamento', 'provincias', 'distritos', 'scripts'));
                $this->set('_serialize', ['zabd']);
            } else {
                $this->Flash->error(__('Operación denegada.'));
                return $this->redirect(['action' => 'index', 'controller' => 'Zabd']);
            }
        } else {
            $this->Flash->error(__('Operación denegada.'));
            return $this->redirect(['action' => 'index', 'controller' => 'Zabd']);
        }
    }


    /**
     * Delete method
     *
     * @param string|null $id Insitu id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        if ($this->permiso['delete']) {
            $this->request->is(['post', 'delete']);
            $zabd = $this->Zabd->find()->where(['Zabd.id' => $id])->first();
            if ($zabd != NULL) {
                // if ($zabd->validacionZabd > 0) {
                $a = count($zabd);
                if ($a < 0) {
                    $this->Flash->error(__('Zabd ' . $zabd->cod_zabd . ', imposible de eliminar. Tiene registros asociados.'));
                } else {
                    $zabd['status'] = '0';
                    if ($this->Zabd->delete($zabd)) {
                        $list_module = explode('/', $this->request->params['_matchedRoute']);
                        $user_id = $this->Auth->User('id');
                        $module = $list_module[(count($list_module) - 3)];
                        $action = $list_module[(count($list_module) - 2)];
                        $station_id = $zabd->id;
                        $recurso_id = '4';
                        // $this->Functions->saveLogWeb($module, $station_id, $action, $user_id, $recurso_id);
                        $this->Flash->success(__('zona de agrobiodiversidad eliminado satisfactoriamente.'));
                    } else {
                        $this->Flash->error(__('Hubo inconvenientes al eliminar zona de agrobiodiversidad. Por favor, otra vez intente.'));
                    }
                }
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Operación denegada.'));
                return $this->redirect(['action' => 'index', 'controller' => 'Zabd']);
            }
        } else {
            $this->Flash->error(__('Operación denegada.'));
            return $this->redirect(['action' => 'index', 'controller' => 'Zabd']);
        }
    }


    public function exportartabla()
    {

        if ($this->request->is('post')) {

            $data = $this->request->getData();

            $filePath = WWW_ROOT . 'reportes/' . $data['filename'] . '.xlsx';

            if (file_exists($filePath)) {

                $this->response->file($filePath, array('download' => true));

                return $this->response;
            } else {

                $this->Flash->error(__('No existe el archivo.'));
                return $this->redirect(['action' => 'index']);
            }
        }
    }
}
