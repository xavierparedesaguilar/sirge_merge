<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\Datasource\ConnectionManager;


/**
 * TbConocimiento Controller
 *
 * @property \App\Model\Table\TbConocimientoTable $TbConocimiento
 *
 * @method \App\Model\Entity\TbConocimiento[] paginate($object = null, array $settings = [])
 */
class TbConocimientoController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Csrf');
        $this->mod_modulo = "zona de agrobiodiversidad";
        $this->mod_title = "conocimiento de agrobiodiversidad";
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
            $TbConocimiento = $this->TbConocimiento->find()->where(['TbConocimiento.status' => '1'])->all();
            $this->set(compact('TbConocimiento','id_zabd', 'mod_modulo','mod_title', 'styles', 'scripts', 'permiso'));
            $this->set('_serialize', ['TbConocimiento']);
        } else {
            $this->Flash->error(__('Operación denegada.'));
            return $this->redirect($this->Auth->redirectUrl());
        }
    }


    /**
     * View method
     *
     * @param string|null $id TbConocimiento id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($idx=null, $id = null)
    {
        $id_zabd = $idx;
        if ($this->permiso['view']) {
            $TbConocimiento = $this->TbConocimiento->find()->where(['TbConocimiento.id' => $id])->first();
            if ($TbConocimiento != NULL) {
                $mod_modulo = $this->mod_modulo;
                $mod_title = $this->mod_title;
                $permiso = $this->permiso;
                $this->set(compact('TbConocimiento', 'id_zabd', 'mod_modulo', 'mod_title', 'permiso'));
                $this->set('_serialize', ['TbConocimiento']);
            } else {
                $this->Flash->error(__('Operación denegada.'));
                return $this->redirect(['action' => 'index', 'controller' => 'TbConocimiento','idx'=>$idx]);
            }
        } else {
            $this->Flash->error(__('Operación denegada.'));
            return $this->redirect(['action' => 'index', 'controller' => 'TbConocimiento','idx'=>$idx]);
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
            $TbConocimiento = $this->TbConocimiento->newEntity();
            if ($this->request->is('post')) {
                $data = $this->request->getData();
                $data['user_id'] = $this->Auth->User('id');
                $TbConocimiento = $this->TbConocimiento->patchEntity($TbConocimiento, $data);
                if ($this->TbConocimiento->save($TbConocimiento)) {
                    $list_module = explode('/', $this->request->params['_matchedRoute']);
                    $user_id = $this->Auth->User('id');
                    $module = $list_module[(count($list_module) - 2)];
                    $action = $list_module[(count($list_module) - 1)];
                    $station_id = $TbConocimiento->id;
                    $recurso_id = '4';
                    $this->Functions->saveLogWeb($module, $station_id, $action, $user_id, $recurso_id);
                    $this->Flash->success(__('Conocimiento creado satisfactoriamente.'));
                    return $this->redirect(['action' => 'add','controller'=>'TbConocimientoTradicional','idx'=>$id_zabd]);
                }
                $this->Flash->error(__('Hubo inconvenientes al crear conocimiento. Por favor, otra vez intente.'));
            }
            $mod_modulo = $this->mod_modulo;
            $mod_title = $this->mod_title;
            $scripts = ['assets/packages/jqueryvalidation/dist/jquery.validate'];
            $this->set(compact('TbConocimiento','id_zabd', 'mod_modulo', 'mod_title','scripts'));
            $this->set('_serialize', ['TbConocimiento']);
        } else {
            $this->Flash->error(__('Operación denegada.'));
            return $this->redirect(['action' => 'index', 'controller' => 'TbConocimiento']);
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id TbConocimiento id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit( $idx = null, $id = null)
    {
        $id_zabd = $idx;
        if ($this->permiso['edit']) {
            $TbConocimiento = $this->TbConocimiento->find()->where(['TbConocimiento.id' => $id, 'TbConocimiento.status' => '1'])->first();
            if ($TbConocimiento != NULL) {
                if ($this->request->is(['patch', 'post', 'put'])) {
                    $data = $this->request->getData();
                    $TbConocimiento = $this->TbConocimiento->patchEntity($TbConocimiento, $data);
                    if ($this->TbConocimiento->save($TbConocimiento)) {
                        $list_module = explode('/', $this->request->params['_matchedRoute']);
                        $user_id = $this->Auth->User('id');
                        $module = $list_module[(count($list_module) - 3)];
                        $action = $list_module[(count($list_module) - 2)];
                        $station_id = $TbConocimiento->id;
                        $recurso_id = '4';
                        $this->Functions->saveLogWeb($module, $station_id, $action, $user_id, $recurso_id);
                        $this->Flash->success(__('Conocimiento actualizado satisfactoriamente.'));
                        return $this->redirect(['action' => 'index','idx'=>$id_zabd]);
                    }
                    $this->Flash->error(__('Hubo inconvenientes al actualizar conocimiento. Por favor, otra vez intente.'));
                }
                $mod_modulo = $this->mod_modulo;
                $mod_title = $this->mod_title;
                $scripts = ['assets/packages/jqueryvalidation/dist/jquery.validate'];
                $this->set(compact('TbConocimiento','id_zabd', 'mod_modulo', 'mod_title','scripts'));
                $this->set('_serialize', ['TbConocimiento']);
            } else {
                $this->Flash->error(__('Operación denegada.'));
                return $this->redirect(['action' => 'index', 'controller' => 'TbConocimiento','idx'=>$id_zabd]);
            }
        } else {
            $this->Flash->error(__('Operación denegada.'));
            return $this->redirect(['action' => 'index', 'controller' => 'TbConocimiento','idx'=>$id_zabd]);
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id TbConocimiento id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($idx = null, $id = null)
    {
        $id_zabd = $idx;
        if ($this->permiso['delete']) {
            $this->request->is(['post', 'delete']);
            $TbConocimiento = $this->TbConocimiento->find()->where(['TbConocimiento.id' => $id])->first();
            if ($TbConocimiento != NULL) {
                if ($TbConocimiento->validacionTbConocimiento > 0) {
                    $this->Flash->error(__('TbConocimiento ' . $TbConocimiento->id . ', imposible de eliminar. Tiene registros asociados.'));
                } else {
                    $TbConocimiento['status'] = '0';
                    if ($this->TbConocimiento->save($TbConocimiento)) {
                        $list_module = explode('/', $this->request->params['_matchedRoute']);
                        $user_id = $this->Auth->User('id');
                        $module = $list_module[(count($list_module) - 3)];
                        $action = $list_module[(count($list_module) - 2)];
                        $station_id = $TbConocimiento->id;
                        $recurso_id = '4';
                        $this->Functions->saveLogWeb($module, $station_id, $action, $user_id, $recurso_id);
                        $this->Flash->success(__('Conocimiento eliminado satisfactoriamente.'));
                    } else {
                        $this->Flash->error(__('Hubo inconvenientes al eliminar conocimiento. Por favor, otra vez intente.'));
                    }
                }
                return $this->redirect(['action' => 'index','idx'=>$id_zabd]);
            } else {
                $this->Flash->error(__('Operación denegada.'));
                return $this->redirect(['action' => 'index', 'controller' => 'TbConocimiento','idx'=>$id_zabd]);
            }
        } else {
            $this->Flash->error(__('Operación denegada.'));
            return $this->redirect(['action' => 'index', 'controller' => 'TbConocimiento','idx'=>$id_zabd]);
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