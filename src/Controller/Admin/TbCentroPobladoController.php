<?php

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\Datasource\ConnectionManager;


/**
 * TbCentroPoblado Controller
 *
 * @property \App\Model\Table\TbCentroPobladoTable $TbCentroPoblado
 *
 * @method \App\Model\Entity\TbCentroPoblado[] paginate($object = null, array $settings = [])
 */
class TbCentroPobladoController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Csrf');
        $this->mod_modulo = "zona de agrobiodiversidad";
        $this->mod_title = "comunidad registrada";
        $this->loadModel('OptionList');
        $this->loadModel('TbOrganizacion');
        $this->loadModel('TbComunidad');
        $this->loadModel('TbZabd');
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
    public function index($idx = null, $id = null)
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
            $idComunidad = $idx;
            $idCentroPoblado = $id;
            $TbCentroPoblado = $this->TbCentroPoblado->find()->contain(['TbOrganizacion','TbComunidad'])->where(['TbCentroPoblado.status' => 1, 'TbComunidad.tb_zabd_id' => $idComunidad,'TbCentroPoblado.tb_comunidad_id' => $idCentroPoblado])->all();
            $nombre_comunidad = "";
            foreach ($TbCentroPoblado as $rq) {
                $nombre_comunidad =  $rq['tb_comunidad']['nombre_segun_sunarp'];
            }
            //    var_dump($idComunidad, $idCentroPoblado); exit;
            $this->set(compact('TbCentroPoblado', 'idComunidad', 'idCentroPoblado', 'idZabd', 'nombre_comunidad', 'mod_modulo', 'mod_title', 'styles', 'scripts', 'permiso'));
            $this->set('_serialize', ['TbCentroPoblado']);
        } else {
            $this->Flash->error(__('Operación denegada.'));
            return $this->redirect($this->Auth->redirectUrl());
        }
    }


    /**
     * View method
     *
     * @param string|null $id TbCentroPoblado id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($idx = null, $id = null)
    {
        $id_zabd = $idx;
        if ($this->permiso['view']) {
            $TbCentroPoblado = $this->TbCentroPoblado->find()->where(['TbCentroPoblado.id' => $id])->first();
            if ($TbCentroPoblado != NULL) {
                $mod_modulo = $this->mod_modulo;
                $mod_title = $this->mod_title;
                $permiso = $this->permiso;
                $this->set(compact('TbCentroPoblado', 'id_zabd', 'mod_modulo', 'mod_title', 'permiso'));
                $this->set('_serialize', ['TbCentroPoblado']);
            } else {
                $this->Flash->error(__('Operación denegada.'));
                return $this->redirect(['action' => 'index', 'controller' => 'TbCentroPoblado', 'idx' => $idx]);
            }
        } else {
            $this->Flash->error(__('Operación denegada.'));
            return $this->redirect(['action' => 'index', 'controller' => 'TbCentroPoblado', 'idx' => $idx]);
        }
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($idx = null, $id = null)
    {
        $idComunidad = $idx;
        $idCentroPoblado = $id;
        if ($this->permiso['add']) {
            $TbCentroPoblado = $this->TbCentroPoblado->newEntity();
            if ($this->request->is('post')) {
                $data = $this->request->getData();
                $data['user_id'] = $this->Auth->User('id');
                $data['centro_poblado'] = ucwords(strtolower($data['centro_poblado']));
                $data['tb_comunidad_id'] = $idCentroPoblado;
                $TbCentroPoblado = $this->TbCentroPoblado->patchEntity($TbCentroPoblado, $data);
                if ($this->TbCentroPoblado->save($TbCentroPoblado)) {
                    $list_module = explode('/', $this->request->params['_matchedRoute']);
                    $user_id = $this->Auth->User('id');
                    $module = $list_module[(count($list_module) - 2)];
                    $action = $list_module[(count($list_module) - 1)];
                    $station_id = $TbCentroPoblado->id;
                    $recurso_id = '4';
                    $this->Functions->saveLogWeb($module, $station_id, $action, $user_id, $recurso_id);
                    $this->Flash->success(__($this->mod_title . ' creado satisfactoriamente.'));
                    return $this->redirect(['action' => 'index', 'controller' => 'TbCentroPoblado', 'idx' => $idComunidad, 'id' => $idCentroPoblado]);
                }
                $this->Flash->error(__('Hubo inconvenientes al crear ' . $this->mod_title . '. Por favor, otra vez intente.'));
            }
            $organizacion = $this->TbOrganizacion->find('list', ['keyField' => 'id', 'valueField' => 'nombre_organizacion'])->where(['TbOrganizacion.status' => '1'])->order(['nombre_organizacion ASC']);
            $mod_modulo = $this->mod_modulo;
            $mod_title = $this->mod_title;
            $scripts = ['assets/packages/jqueryvalidation/dist/jquery.validate'];
            $this->set(compact('TbCentroPoblado', 'idComunidad', 'idCentroPoblado', 'mod_modulo', 'mod_title', 'scripts', 'organizacion', 'comunidad'));
            $this->set('_serialize', ['TbCentroPoblado']);
        } else {
            $this->Flash->error(__('Operación denegada.'));
            return $this->redirect(['action' => 'index', 'controller' => 'TbCentroPoblado', 'idx' => $idComunidad, 'id' => $idCentroPoblado]);
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id TbCentroPoblado id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($idx = null, $id = null, $idy =null)
    {
        $idComunidad = $idx;
        $idCentroPoblado = $id;
        if ($this->permiso['edit']) {
            $TbCentroPoblado = $this->TbCentroPoblado->find()->where(['TbCentroPoblado.id' => $idy, 'TbCentroPoblado.status' => '1'])->first();
            if ($TbCentroPoblado != NULL) {
                if ($this->request->is(['patch', 'post', 'put'])) {
                    $data = $this->request->getData();
                    $data['centro_poblado'] = ucwords(strtolower($data['centro_poblado']));
                    $TbCentroPoblado = $this->TbCentroPoblado->patchEntity($TbCentroPoblado, $data);
                    if ($this->TbCentroPoblado->save($TbCentroPoblado)) {
                        $list_module = explode('/', $this->request->params['_matchedRoute']);
                        $user_id = $this->Auth->User('id');
                        $module = $list_module[(count($list_module) - 3)];
                        $action = $list_module[(count($list_module) - 2)];
                        $station_id = $TbCentroPoblado->id;
                        $recurso_id = '4';
                        $this->Functions->saveLogWeb($module, $station_id, $action, $user_id, $recurso_id);
                        $this->Flash->success(__($this->mod_title . ' actualizado satisfactoriamente.'));
                        return $this->redirect(['action' => 'index', 'idx' => $idComunidad, 'id' => $idCentroPoblado]);
                    }
                    $this->Flash->error(__('Hubo inconvenientes al actualizar ' . $this->mod_title . '. Por favor, otra vez intente.'));
                }
                $organizacion = $this->TbOrganizacion->find('list', ['keyField' => 'id', 'valueField' => 'nombre_organizacion'])->where(['TbOrganizacion.status' => '1'])->order(['nombre_organizacion ASC']);
                $comunidad = $this->TbComunidad->find('list', ['keyField' => 'id', 'valueField' => 'nombre_segun_sunarp'])->where(['TbComunidad.status' => '1'])->order(['nombre_segun_sunarp ASC']);
                $mod_modulo = $this->mod_modulo;
                $mod_title = $this->mod_title;
                $scripts = ['assets/packages/jqueryvalidation/dist/jquery.validate'];
                $this->set(compact('TbCentroPoblado', 'idComunidad','idCentroPoblado', 'mod_modulo', 'mod_title', 'scripts', 'organizacion', 'comunidad'));
                $this->set('_serialize', ['TbCentroPoblado']);
            } else {
                $this->Flash->error(__('Operación denegada.'));
                return $this->redirect(['action' => 'index', 'controller' => 'TbCentroPoblado', 'idx' => $idComunidad, 'id' => $idCentroPoblado]);
            }
        } else {
            $this->Flash->error(__('Operación denegada.'));
            return $this->redirect(['action' => 'index', 'controller' => 'TbCentroPoblado', 'idx' => $idComunidad, 'id' => $idCentroPoblado]);
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id TbCentroPoblado id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($idx = null, $id = null, $idy = null)
    {
        $idComunidad = $idx;
        $idCentroPoblado = $id;
        if ($this->permiso['delete']) {
            $this->request->is(['post', 'delete']);
            $TbCentroPoblado = $this->TbCentroPoblado->find()->where(['TbCentroPoblado.id' => $idy])->first();
            if ($TbCentroPoblado != NULL) {
                if ($TbCentroPoblado->validacionTbCentroPoblado > 0) {
                    $this->Flash->error(__('TbCentroPoblado ' . $TbCentroPoblado->id . ', imposible de eliminar. Tiene registros asociados.'));
                } else {
                    $TbCentroPoblado['status'] = '0';
                    if ($this->TbCentroPoblado->save($TbCentroPoblado)) {
                        $list_module = explode('/', $this->request->params['_matchedRoute']);
                        $user_id = $this->Auth->User('id');
                        $module = $list_module[(count($list_module) - 3)];
                        $action = $list_module[(count($list_module) - 2)];
                        $station_id = $TbCentroPoblado->id;
                        $recurso_id = '4';
                        $this->Functions->saveLogWeb($module, $station_id, $action, $user_id, $recurso_id);
                        $this->Flash->success(__($this->mod_title . ' eliminado satisfactoriamente.'));
                    } else {
                        $this->Flash->error(__('Hubo inconvenientes al eliminar ' . $this->mod_title . '. Por favor, otra vez intente.'));
                    }
                }
                return $this->redirect(['action' => 'index', 'idx' => $idComunidad, 'id'=> $idCentroPoblado]);
            } else {
                $this->Flash->error(__('Operación denegada.'));
                return $this->redirect(['action' => 'index', 'controller' => 'TbCentroPoblado', 'idx' => $idComunidad, 'id'=>$idCentroPoblado]);
            }
        } else {
            $this->Flash->error(__('Operación denegada.'));
            return $this->redirect(['action' => 'index', 'controller' => 'TbCentroPoblado', 'idx' => $idComunidad, 'id'=>$idCentroPoblado]);
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
