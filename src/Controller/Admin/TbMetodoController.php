<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\Datasource\ConnectionManager;


/**
 * TbMetodo Controller
 *
 * @property \App\Model\Table\TbMetodoTable $TbMetodo
 *
 * @method \App\Model\Entity\TbMetodo[] paginate($object = null, array $settings = [])
 */
class TbMetodoController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Csrf');
        $this->mod_modulo = "zona de agrobiodiversidad";
        $this->mod_title = "método de conocimiento";
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
            $TbMetodo = $this->TbMetodo->find()->where(['TbMetodo.status' => '1'])->all();
            $this->set(compact('TbMetodo','id_zabd', 'mod_modulo','mod_title', 'styles', 'scripts', 'permiso'));
            $this->set('_serialize', ['TbMetodo']);
        } else {
            $this->Flash->error(__('Operación denegada.'));
            return $this->redirect($this->Auth->redirectUrl());
        }
    }


    /**
     * View method
     *
     * @param string|null $id TbMetodo id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($idx=null, $id = null)
    {
        $id_zabd = $idx;
        if ($this->permiso['view']) {
            $TbMetodo = $this->TbMetodo->find()->where(['TbMetodo.id' => $id])->first();
            if ($TbMetodo != NULL) {
                $mod_modulo = $this->mod_modulo;
                $mod_title = $this->mod_title;
                $permiso = $this->permiso;
                $this->set(compact('TbMetodo', 'id_zabd', 'mod_modulo', 'mod_title', 'permiso'));
                $this->set('_serialize', ['TbMetodo']);
            } else {
                $this->Flash->error(__('Operación denegada.'));
                return $this->redirect(['action' => 'index', 'controller' => 'TbMetodo','idx'=>$idx]);
            }
        } else {
            $this->Flash->error(__('Operación denegada.'));
            return $this->redirect(['action' => 'index', 'controller' => 'TbMetodo','idx'=>$idx]);
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
            $TbMetodo = $this->TbMetodo->newEntity();
            if ($this->request->is('post')) {
                $data = $this->request->getData();
                $data['user_id'] = $this->Auth->User('id');
                $TbMetodo = $this->TbMetodo->patchEntity($TbMetodo, $data);
                if ($this->TbMetodo->save($TbMetodo)) {
                    $list_module = explode('/', $this->request->params['_matchedRoute']);
                    $user_id = $this->Auth->User('id');
                    $module = $list_module[(count($list_module) - 2)];
                    $action = $list_module[(count($list_module) - 1)];
                    $station_id = $TbMetodo->id;
                    $recurso_id = '4';
                    $this->Functions->saveLogWeb($module, $station_id, $action, $user_id, $recurso_id);
                    $this->Flash->success(__('Método ó acción creado satisfactoriamente.'));
                    return $this->redirect(['action' => 'add','controller'=>'TbConocimientoTradicional','idx'=>$id_zabd]);
                }
                $this->Flash->error(__('Hubo inconvenientes al crear método ó acción. Por favor, otra vez intente.'));
            }
            $mod_modulo = $this->mod_modulo;
            $mod_title = $this->mod_title;
            $scripts = ['assets/packages/jqueryvalidation/dist/jquery.validate'];
            $this->set(compact('TbMetodo','id_zabd', 'mod_modulo', 'mod_title','scripts'));
            $this->set('_serialize', ['TbMetodo']);
        } else {
            $this->Flash->error(__('Operación denegada.'));
            return $this->redirect(['action' => 'index', 'controller' => 'TbMetodo']);
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id TbMetodo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit( $idx = null, $id = null)
    {
        $id_zabd = $idx;
        if ($this->permiso['edit']) {
            $TbMetodo = $this->TbMetodo->find()->where(['TbMetodo.id' => $id, 'TbMetodo.status' => '1'])->first();
            if ($TbMetodo != NULL) {
                if ($this->request->is(['patch', 'post', 'put'])) {
                    $data = $this->request->getData();
                    $TbMetodo = $this->TbMetodo->patchEntity($TbMetodo, $data);
                    if ($this->TbMetodo->save($TbMetodo)) {
                        $list_module = explode('/', $this->request->params['_matchedRoute']);
                        $user_id = $this->Auth->User('id');
                        $module = $list_module[(count($list_module) - 3)];
                        $action = $list_module[(count($list_module) - 2)];
                        $station_id = $TbMetodo->id;
                        $recurso_id = '4';
                        $this->Functions->saveLogWeb($module, $station_id, $action, $user_id, $recurso_id);
                        $this->Flash->success(__('método ó acción actualizado satisfactoriamente.'));
                        return $this->redirect(['action' => 'index','idx'=>$id_zabd]);
                    }
                    $this->Flash->error(__('Hubo inconvenientes al actualizar método ó acción. Por favor, otra vez intente.'));
                }
                $mod_modulo = $this->mod_modulo;
                $mod_title = $this->mod_title;
                $scripts = ['assets/packages/jqueryvalidation/dist/jquery.validate'];
                $this->set(compact('TbMetodo','id_zabd', 'mod_modulo', 'mod_title','scripts'));
                $this->set('_serialize', ['TbMetodo']);
            } else {
                $this->Flash->error(__('Operación denegada.'));
                return $this->redirect(['action' => 'index', 'controller' => 'TbMetodo','idx'=>$id_zabd]);
            }
        } else {
            $this->Flash->error(__('Operación denegada.'));
            return $this->redirect(['action' => 'index', 'controller' => 'TbMetodo','idx'=>$id_zabd]);
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id TbMetodo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($idx = null, $id = null)
    {
        $id_zabd = $idx;
        if ($this->permiso['delete']) {
            $this->request->is(['post', 'delete']);
            $TbMetodo = $this->TbMetodo->find()->where(['TbMetodo.id' => $id])->first();
            if ($TbMetodo != NULL) {
                if ($TbMetodo->validacionTbMetodo > 0) {
                    $this->Flash->error(__('TbMetodo ' . $TbMetodo->id . ', imposible de eliminar. Tiene registros asociados.'));
                } else {
                    $TbMetodo['status'] = '0';
                    if ($this->TbMetodo->save($TbMetodo)) {
                        $list_module = explode('/', $this->request->params['_matchedRoute']);
                        $user_id = $this->Auth->User('id');
                        $module = $list_module[(count($list_module) - 3)];
                        $action = $list_module[(count($list_module) - 2)];
                        $station_id = $TbMetodo->id;
                        $recurso_id = '4';
                        $this->Functions->saveLogWeb($module, $station_id, $action, $user_id, $recurso_id);
                        $this->Flash->success(__('método ó acción eliminado satisfactoriamente.'));
                    } else {
                        $this->Flash->error(__('Hubo inconvenientes al eliminar método ó acción. Por favor, otra vez intente.'));
                    }
                }
                return $this->redirect(['action' => 'index','idx'=>$id_zabd]);
            } else {
                $this->Flash->error(__('Operación denegada.'));
                return $this->redirect(['action' => 'index', 'controller' => 'TbMetodo','idx'=>$id_zabd]);
            }
        } else {
            $this->Flash->error(__('Operación denegada.'));
            return $this->redirect(['action' => 'index', 'controller' => 'TbMetodo','idx'=>$id_zabd]);
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