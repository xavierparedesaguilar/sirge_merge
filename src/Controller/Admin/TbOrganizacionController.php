<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\Datasource\ConnectionManager;


/**
 * TbOrganizacion Controller
 *
 * @property \App\Model\Table\TbOrganizacionTable $TbOrganizacion
 *
 * @method \App\Model\Entity\TbOrganizacion[] paginate($object = null, array $settings = [])
 */
class TbOrganizacionController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Csrf');
        $this->mod_modulo = "zona de agrobiodiversidad";
        $this->mod_title = "organización";
        $this->loadModel('OptionList');
        $this->loadModel('TbOrganizacion');
        $this->loadModel('TbComunidad');
        $this->loadModel('Module');
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
        if ($this->permiso['index']) {
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
            $id_zabd = $idx;
            $TbOrganizacion = $this->TbOrganizacion->find()->contain([])->where(['TbOrganizacion.status' => '1'])->order(['TbOrganizacion.id'=> 'DESC'])->all();
            // var_dump($TbOrganizacion); exit;
            $this->set(compact('TbOrganizacion','id_zabd', 'mod_modulo','mod_title', 'styles', 'scripts', 'permiso'));
            $this->set('_serialize', ['TbOrganizacion']);
        } else {
            $this->Flash->error(__('Operación denegada.'));
            return $this->redirect($this->Auth->redirectUrl());
        }
    }


    /**
     * View method
     *
     * @param string|null $id TbOrganizacion id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($idx=null, $id = null)
    {
        $id_zabd = $idx;
        if ($this->permiso['view']) {
            $TbOrganizacion = $this->TbOrganizacion->find()->where(['TbOrganizacion.id' => $id])->first();
            if ($TbOrganizacion != NULL) {
                $mod_modulo = $this->mod_modulo;
                $mod_title = $this->mod_title;
                $permiso = $this->permiso;
                $this->set(compact('TbOrganizacion', 'id_zabd', 'mod_modulo', 'mod_title', 'permiso'));
                $this->set('_serialize', ['TbOrganizacion']);
            } else {
                $this->Flash->error(__('Operación denegada.'));
                return $this->redirect(['action' => 'index', 'controller' => 'TbOrganizacion','idx'=>$idx]);
            }
        } else {
            $this->Flash->error(__('Operación denegada.'));
            return $this->redirect(['action' => 'index', 'controller' => 'TbOrganizacion','idx'=>$idx]);
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
            $TbOrganizacion = $this->TbOrganizacion->newEntity();
            if ($this->request->is('post')) {
                $data = $this->request->getData();
                $data['user_id'] = $this->Auth->User('id');
                $data['nombre_organizacion'] = ucwords(strtolower($data['nombre_organizacion']));
                $TbOrganizacion = $this->TbOrganizacion->patchEntity($TbOrganizacion, $data);
                if ($this->TbOrganizacion->save($TbOrganizacion)) {
                    $list_module = explode('/', $this->request->params['_matchedRoute']);
                    $user_id = $this->Auth->User('id');
                    $module = $list_module[(count($list_module) - 2)];
                    $action = $list_module[(count($list_module) - 1)];
                    $station_id = $TbOrganizacion->id;
                    $recurso_id = '4';
                    $this->Functions->saveLogWeb($module, $station_id, $action, $user_id, $recurso_id);
                    $this->Flash->success(__($this->mod_title.' creado satisfactoriamente.'));
                    return $this->redirect(['action' => 'index','controller'=>'TbOrganizacion','idx'=>$id_zabd]);
                }
                $this->Flash->error(__('Hubo inconvenientes al crear '.$this->mod_title.'. Por favor, otra vez intente.'));
            }
            // $organizacion = $this->TbOrganizacion->find('list',['keyField'=>'id','valueField'=>'nombre_organizacion'])->where(['TbOrganizacion.status' => '1'])->order(['nombre_organizacion ASC']);
            // $comunidad = $this->TbComunidad->find('list',['keyField'=>'id','valueField'=>'nombre_segun_sunarp'])->where(['TbComunidad.status' => '1'])->order(['nombre_segun_sunarp ASC']);
            $mod_modulo = $this->mod_modulo;
            $mod_title = $this->mod_title;
            $scripts = ['assets/packages/jqueryvalidation/dist/jquery.validate'];
            $this->set(compact('TbOrganizacion','id_zabd', 'mod_modulo', 'mod_title','scripts','organizacion','comunidad'));
            $this->set('_serialize', ['TbOrganizacion']);
        } else {
            // var_dump("asdf"); exit;
            $this->Flash->error(__('Operación denegada.'));
            return $this->redirect(['action' => 'index', 'controller' => 'TbOrganizacion']);
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id TbOrganizacion id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit( $idx = null, $id = null)
    {
        $id_zabd = $idx;
        if ($this->permiso['edit']) {
            $TbOrganizacion = $this->TbOrganizacion->find()->where(['TbOrganizacion.id' => $id, 'TbOrganizacion.status' => '1'])->first();
            if ($TbOrganizacion != NULL) {
                if ($this->request->is(['patch', 'post', 'put'])) {
                    $data = $this->request->getData();
                    $data['nombre_organizacion'] = ucwords(strtolower($data['nombre_organizacion']));
                    $TbOrganizacion = $this->TbOrganizacion->patchEntity($TbOrganizacion, $data);
                    if ($this->TbOrganizacion->save($TbOrganizacion)) {
                        $list_module = explode('/', $this->request->params['_matchedRoute']);
                        $user_id = $this->Auth->User('id');
                        $module = $list_module[(count($list_module) - 3)];
                        $action = $list_module[(count($list_module) - 2)];
                        $station_id = $TbOrganizacion->id;
                        $recurso_id = '4';
                        $this->Functions->saveLogWeb($module, $station_id, $action, $user_id, $recurso_id);
                        $this->Flash->success(__($this->mod_title.' actualizado satisfactoriamente.'));
                        return $this->redirect(['action' => 'index','idx'=>$id_zabd]);
                    }
                    $this->Flash->error(__('Hubo inconvenientes al actualizar '.$this->mod_title.'. Por favor, otra vez intente.'));
                }
                $organizacion = $this->TbOrganizacion->find('list',['keyField'=>'id','valueField'=>'nombre_organizacion'])->where(['TbOrganizacion.status' => '1'])->order(['nombre_organizacion ASC']);
                $comunidad = $this->TbComunidad->find('list',['keyField'=>'id','valueField'=>'nombre_segun_sunarp'])->where(['TbComunidad.status' => '1'])->order(['nombre_segun_sunarp ASC']);
                $mod_modulo = $this->mod_modulo;
                $mod_title = $this->mod_title;
                $scripts = ['assets/packages/jqueryvalidation/dist/jquery.validate'];
                $this->set(compact('TbOrganizacion','id_zabd', 'mod_modulo', 'mod_title','scripts','organizacion', 'comunidad'));
                $this->set('_serialize', ['TbOrganizacion']);
            } else {
                $this->Flash->error(__('Operación denegada.'));
                return $this->redirect(['action' => 'index', 'controller' => 'TbOrganizacion','idx'=>$id_zabd]);
            }
        } else {
            $this->Flash->error(__('Operación denegada.'));
            return $this->redirect(['action' => 'index', 'controller' => 'TbOrganizacion','idx'=>$id_zabd]);
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id TbOrganizacion id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($idx = null, $id = null)
    {
        $id_zabd = $idx;
        if ($this->permiso['delete']) {
            $this->request->is(['post', 'delete']);
            $TbOrganizacion = $this->TbOrganizacion->find()->where(['TbOrganizacion.id' => $id])->first();
            if ($TbOrganizacion != NULL) {
                if ($TbOrganizacion->validacionTbOrganizacion > 0) {
                    $this->Flash->error(__('TbOrganizacion ' . $TbOrganizacion->id . ', imposible de eliminar. Tiene registros asociados.'));
                } else {
                    $TbOrganizacion['status'] = '0';
                    if ($this->TbOrganizacion->save($TbOrganizacion)) {
                        $list_module = explode('/', $this->request->params['_matchedRoute']);
                        $user_id = $this->Auth->User('id');
                        $module = $list_module[(count($list_module) - 3)];
                        $action = $list_module[(count($list_module) - 2)];
                        $station_id = $TbOrganizacion->id;
                        $recurso_id = '4';
                        $this->Functions->saveLogWeb($module, $station_id, $action, $user_id, $recurso_id);
                        $this->Flash->success(__($this->mod_title.' eliminado satisfactoriamente.'));
                    } else {
                        $this->Flash->error(__('Hubo inconvenientes al eliminar '.$this->mod_title.'. Por favor, otra vez intente.'));
                    }
                }
                return $this->redirect(['action' => 'index','idx'=>$id_zabd]);
            } else {
                $this->Flash->error(__('Operación denegada.'));
                return $this->redirect(['action' => 'index', 'controller' => 'TbOrganizacion','idx'=>$id_zabd]);
            }
        } else {
            $this->Flash->error(__('Operación denegada.'));
            return $this->redirect(['action' => 'index', 'controller' => 'TbOrganizacion','idx'=>$id_zabd]);
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