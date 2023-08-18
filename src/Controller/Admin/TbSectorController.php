<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\Datasource\ConnectionManager;


/**
 * TbSector Controller
 *
 * @property \App\Model\Table\TbSectorTable $TbSector
 *
 * @method \App\Model\Entity\TbSector[] paginate($object = null, array $settings = [])
 */
class TbSectorController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Csrf');
        $this->mod_modulo = "zona de agrobiodiversidad";
        $this->mod_title = "sector de conocimiento";
        $this->loadModel('OptionList');
        $this->loadModel('Passport');

        $this->loadModel('Module');
        // $this->loadModel('Zabd');

        $this->module = $this->Module->find()->where(['controller' => 'Zabd'])->first();
        if (!empty($this->module))
            $this->permiso = $this->Functions->validarModulo($this->module->id);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index($idx = null)
    {
        // $Zabd = $this->Zabd->find()->where(['Zabd.id' => $idx, 'Zabd.status' => '1'])->first();
        if ($this->permiso['index']) {
            // echo("Hola, mi love");exit;
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
            // $Zabd = $this->Zabd->find()->contain(['Ubigeo'])->where(['Zabd.status'=>1])->all();
            $id_zabd = $idx;
            $TbSector = $this->TbSector->find()->where(['TbSector.status' => '1'])->all();
            $this->set(compact('TbSector','id_zabd', 'mod_modulo','mod_title', 'styles', 'scripts', 'permiso'));
            $this->set('_serialize', ['TbSector']);
        } else {
            $this->Flash->error(__('Operación denegada.'));
            return $this->redirect($this->Auth->redirectUrl());
        }
    }


    /**
     * View method
     *
     * @param string|null $id TbSector id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($idx=null, $id = null)
    {
        $id_zabd = $idx;
        if ($this->permiso['view']) {
            $TbSector = $this->TbSector->find()->where(['TbSector.id' => $id])->first();
            if ($TbSector != NULL) {
                $mod_modulo = $this->mod_modulo;
                $mod_title = $this->mod_title;
                $permiso = $this->permiso;
                $this->set(compact('TbSector', 'id_zabd', 'mod_modulo', 'mod_title', 'permiso'));
                $this->set('_serialize', ['TbSector']);
            } else {
                $this->Flash->error(__('Operación denegada.'));
                return $this->redirect(['action' => 'index', 'controller' => 'TbSector','idx'=>$idx]);
            }
        } else {
            $this->Flash->error(__('Operación denegada.'));
            return $this->redirect(['action' => 'index', 'controller' => 'TbSector','idx'=>$idx]);
        }
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($idx = null)
    {
        $id_zabd = $idx;
        if ($this->permiso['add']) {
            $TbSector = $this->TbSector->newEntity();
            if ($this->request->is('post')) {
                $data = $this->request->getData();
                $data['user_id'] = $this->Auth->User('id');
                $TbSector = $this->TbSector->patchEntity($TbSector, $data);
                if ($this->TbSector->save($TbSector)) {
                    $list_module = explode('/', $this->request->params['_matchedRoute']);
                    $user_id = $this->Auth->User('id');
                    $module = $list_module[(count($list_module) - 2)];
                    $action = $list_module[(count($list_module) - 1)];
                    $station_id = $TbSector->id;
                    $recurso_id = '4';
                    $this->Functions->saveLogWeb($module, $station_id, $action, $user_id, $recurso_id);
                    $this->Flash->success(__('sector ó area creado satisfactoriamente.'));
                    return $this->redirect(['action' => 'add','controller'=>'TbConocimientoTradicional','idx'=>$id_zabd]);
                }
                $this->Flash->error(__('Hubo inconvenientes al crear sector ó area. Por favor, otra vez intente.'));
            }
            $mod_modulo = $this->mod_modulo;
            $mod_title = $this->mod_title;
            $scripts = ['assets/packages/jqueryvalidation/dist/jquery.validate'];
            $this->set(compact('TbSector','id_zabd', 'mod_modulo', 'mod_title','scripts'));
            $this->set('_serialize', ['TbSector']);
        } else {
            $this->Flash->error(__('Operación denegada.'));
            return $this->redirect(['action' => 'index', 'controller' => 'TbSector']);
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id TbSector id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit( $idx = null, $id = null)
    {
        $id_zabd = $idx;
        if ($this->permiso['edit']) {
            $TbSector = $this->TbSector->find()->where(['TbSector.id' => $id, 'TbSector.status' => '1'])->first();
            if ($TbSector != NULL) {
                if ($this->request->is(['patch', 'post', 'put'])) {
                    $data = $this->request->getData();
                    $TbSector = $this->TbSector->patchEntity($TbSector, $data);
                    if ($this->TbSector->save($TbSector)) {
                        $list_module = explode('/', $this->request->params['_matchedRoute']);
                        $user_id = $this->Auth->User('id');
                        $module = $list_module[(count($list_module) - 3)];
                        $action = $list_module[(count($list_module) - 2)];
                        $station_id = $TbSector->id;
                        $recurso_id = '4';
                        $this->Functions->saveLogWeb($module, $station_id, $action, $user_id, $recurso_id);
                        $this->Flash->success(__('sector ó area actualizado satisfactoriamente.'));
                        return $this->redirect(['action' => 'index','idx'=>$id_zabd]);
                    }
                    $this->Flash->error(__('Hubo inconvenientes al actualizar sector ó area. Por favor, otra vez intente.'));
                }
                $mod_modulo = $this->mod_modulo;
                $mod_title = $this->mod_title;
                $scripts = ['assets/packages/jqueryvalidation/dist/jquery.validate'];
                $this->set(compact('TbSector','id_zabd', 'mod_modulo', 'mod_title','scripts'));
                $this->set('_serialize', ['TbSector']);
            } else {
                $this->Flash->error(__('Operación denegada.'));
                return $this->redirect(['action' => 'index', 'controller' => 'TbSector','idx'=>$id_zabd]);
            }
        } else {
            $this->Flash->error(__('Operación denegada.'));
            return $this->redirect(['action' => 'index', 'controller' => 'TbSector','idx'=>$id_zabd]);
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id TbSector id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($idx = null, $id = null)
    {
        $id_zabd = $idx;
        if ($this->permiso['delete']) {
            $this->request->is(['post', 'delete']);
            $TbSector = $this->TbSector->find()->where(['TbSector.id' => $id])->first();
            if ($TbSector != NULL) {
                if ($TbSector->validacionTbSector > 0) {
                    $this->Flash->error(__('TbSector ' . $TbSector->id . ', imposible de eliminar. Tiene registros asociados.'));
                } else {
                    $TbSector['status'] = '0';
                    if ($this->TbSector->save($TbSector)) {
                        $list_module = explode('/', $this->request->params['_matchedRoute']);
                        $user_id = $this->Auth->User('id');
                        $module = $list_module[(count($list_module) - 3)];
                        $action = $list_module[(count($list_module) - 2)];
                        $station_id = $TbSector->id;
                        $recurso_id = '4';
                        $this->Functions->saveLogWeb($module, $station_id, $action, $user_id, $recurso_id);
                        $this->Flash->success(__('sector ó area eliminado satisfactoriamente.'));
                    } else {
                        $this->Flash->error(__('Hubo inconvenientes al eliminar sector ó area. Por favor, otra vez intente.'));
                    }
                }
                return $this->redirect(['action' => 'index','idx'=>$id_zabd]);
            } else {
                $this->Flash->error(__('Operación denegada.'));
                return $this->redirect(['action' => 'index', 'controller' => 'TbSector','idx'=>$id_zabd]);
            }
        } else {
            $this->Flash->error(__('Operación denegada.'));
            return $this->redirect(['action' => 'index', 'controller' => 'TbSector','idx'=>$id_zabd]);
        }
    }

    public function exportartabla($idx = null)
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