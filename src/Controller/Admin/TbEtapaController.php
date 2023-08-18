<?php

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\Datasource\ConnectionManager;


/**
 * TbEtapa Controller
 *
 * @property \App\Model\Table\TbEtapaTable $TbEtapa
 *
 * @method \App\Model\Entity\TbEtapa[] paginate($object = null, array $settings = [])
 */
class TbEtapaController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Csrf');
        $this->mod_modulo = "zona de agrobiodiversidad";
        $this->mod_title = "etapas del cultivo";
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
            $Idx = $idx;
            $Id = $id;
            $TbEtapa = $this->TbEtapa->find()->where(['TbEtapa.status' => 1])->all();
            if ($id == 0) {
                $action = 'add';
            }
            else{
                $action = 'edit';
            }
            $father_name = "";
            foreach ($TbEtapa as $rq) {
                $father_name =  $rq['tb_comunidad']['nombre_segun_sunarp'];
            }
            //    var_dump($Idx, $Id); exit;
            $this->set(compact('TbEtapa', 'Idx', 'Id', 'idZabd', 'father_name','action', 'mod_modulo', 'mod_title', 'styles', 'scripts', 'permiso'));
            $this->set('_serialize', ['TbEtapa']);
        } else {
            $this->Flash->error(__('Operación denegada.'));
            return $this->redirect($this->Auth->redirectUrl());
        }
    }


    /**
     * View method
     *
     * @param string|null $id TbEtapa id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($idx = null, $id = null)
    {
        $id_zabd = $idx;
        if ($this->permiso['view']) {
            $TbEtapa = $this->TbEtapa->find()->where(['TbEtapa.id' => $id])->first();
            if ($TbEtapa != NULL) {
                $mod_modulo = $this->mod_modulo;
                $mod_title = $this->mod_title;
                $permiso = $this->permiso;
                $this->set(compact('TbEtapa', 'id_zabd', 'mod_modulo', 'mod_title', 'permiso'));
                $this->set('_serialize', ['TbEtapa']);
            } else {
                $this->Flash->error(__('Operación denegada.'));
                return $this->redirect(['action' => 'index', 'controller' => 'TbEtapa', 'idx' => $idx]);
            }
        } else {
            $this->Flash->error(__('Operación denegada.'));
            return $this->redirect(['action' => 'index', 'controller' => 'TbEtapa', 'idx' => $idx]);
        }
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($idx = null, $id = null)
    {
        $Idx = $idx;
        $Id = $id;
        if ($this->permiso['add']) {
            $TbEtapa = $this->TbEtapa->newEntity();
            if ($this->request->is('post')) {
                $data = $this->request->getData();
                $data['user_id'] = $this->Auth->User('id');
                $data['etapa'] = ucwords(strtolower($data['etapa']));
                $data['tb_comunidad_id'] = $Id;
                $TbEtapa = $this->TbEtapa->patchEntity($TbEtapa, $data);
                if ($this->TbEtapa->save($TbEtapa)) {
                    $list_module = explode('/', $this->request->params['_matchedRoute']);
                    $user_id = $this->Auth->User('id');
                    $module = $list_module[(count($list_module) - 2)];
                    $action = $list_module[(count($list_module) - 1)];
                    $station_id = $TbEtapa->id;
                    $recurso_id = '4';
                    $this->Functions->saveLogWeb($module, $station_id, $action, $user_id, $recurso_id);
                    $this->Flash->success(__($this->mod_title . ' creado satisfactoriamente.'));
                    return $this->redirect(['action' => 'index', 'controller' => 'TbEtapa', 'idx' => $Idx, 'id' => $Id]);
                }
                $this->Flash->error(__('Hubo inconvenientes al crear ' . $this->mod_title . '. Por favor, otra vez intente.'));
            }
            $organizacion = $this->TbOrganizacion->find('list', ['keyField' => 'id', 'valueField' => 'nombre_organizacion'])->where(['TbOrganizacion.status' => '1'])->order(['nombre_organizacion ASC']);
            $mod_modulo = $this->mod_modulo;
            $mod_title = $this->mod_title;
            $scripts = ['assets/packages/jqueryvalidation/dist/jquery.validate'];
            $this->set(compact('TbEtapa', 'Idx', 'Id', 'mod_modulo', 'mod_title', 'scripts', 'organizacion', 'comunidad'));
            $this->set('_serialize', ['TbEtapa']);
        } else {
            $this->Flash->error(__('Operación denegada.'));
            return $this->redirect(['action' => 'index', 'controller' => 'TbEtapa', 'idx' => $Idx, 'id' => $Id]);
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id TbEtapa id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($idx = null, $id = null, $idy =null)
    {
        $Idx = $idx;
        $Id = $id;
        if ($this->permiso['edit']) {
            $TbEtapa = $this->TbEtapa->find()->where(['TbEtapa.id' => $idy, 'TbEtapa.status' => '1'])->first();
            if ($TbEtapa != NULL) {
                if ($this->request->is(['patch', 'post', 'put'])) {
                    $data = $this->request->getData();
                    $data['etapa'] = ucwords(strtolower($data['etapa']));
                    $TbEtapa = $this->TbEtapa->patchEntity($TbEtapa, $data);
                    if ($this->TbEtapa->save($TbEtapa)) {
                        $list_module = explode('/', $this->request->params['_matchedRoute']);
                        $user_id = $this->Auth->User('id');
                        $module = $list_module[(count($list_module) - 3)];
                        $action = $list_module[(count($list_module) - 2)];
                        $station_id = $TbEtapa->id;
                        $recurso_id = '4';
                        $this->Functions->saveLogWeb($module, $station_id, $action, $user_id, $recurso_id);
                        $this->Flash->success(__($this->mod_title . ' actualizado satisfactoriamente.'));
                        return $this->redirect(['action' => 'index', 'idx' => $Idx, 'id' => $Id]);
                    }
                    $this->Flash->error(__('Hubo inconvenientes al actualizar ' . $this->mod_title . '. Por favor, otra vez intente.'));
                }
                
                $organizacion = $this->TbOrganizacion->find('list', ['keyField' => 'id', 'valueField' => 'nombre_organizacion'])->where(['TbOrganizacion.status' => '1'])->order(['nombre_organizacion ASC']);
                $comunidad = $this->TbComunidad->find('list', ['keyField' => 'id', 'valueField' => 'nombre_segun_sunarp'])->where(['TbComunidad.status' => '1'])->order(['nombre_segun_sunarp ASC']);
                $mod_modulo = $this->mod_modulo;
                $mod_title = $this->mod_title;
                $scripts = ['assets/packages/jqueryvalidation/dist/jquery.validate'];
                $this->set(compact('TbEtapa', 'Idx','Id', 'mod_modulo', 'mod_title', 'scripts', 'organizacion', 'comunidad'));
                $this->set('_serialize', ['TbEtapa']);
                // var_dump("sdsd"); exit; 
            } 
            else {
                $this->Flash->error(__('Operación denegada.'));
                return $this->redirect(['action' => 'index', 'controller' => 'TbEtapa', 'idx' => $Idx, 'id' => $Id]);
            }
        } else {
            $this->Flash->error(__('Operación denegada.'));
            return $this->redirect(['action' => 'index', 'controller' => 'TbEtapa', 'idx' => $Idx, 'id' => $Id]);
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id TbEtapa id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($idx = null, $id = null, $idy = null)
    {
        $TbEtapa = $this->TbEtapa->find()->where(['TbEtapa.id' => $idy])->first();
        // var_dump($TbEtapa); exit; 
        $Idx = $idx;
        $Id = $id;
        if ($this->permiso['delete']) {
            $this->request->is(['post', 'delete']);
            if ($TbEtapa != NULL) {
                if ($TbEtapa->validacionTbEtapa > 0) {
                    $this->Flash->error(__('TbEtapa ' . $TbEtapa->id . ', imposible de eliminar. Tiene registros asociados.'));
                } else {
                    $TbEtapa['status'] = '0';
                    if ($this->TbEtapa->save($TbEtapa)) {
                        $list_module = explode('/', $this->request->params['_matchedRoute']);
                        $user_id = $this->Auth->User('id');
                        $module = $list_module[(count($list_module) - 3)];
                        $action = $list_module[(count($list_module) - 2)];
                        $station_id = $TbEtapa->id;
                        $recurso_id = '4';
                        $this->Functions->saveLogWeb($module, $station_id, $action, $user_id, $recurso_id);
                        $this->Flash->success(__($this->mod_title . ' eliminado satisfactoriamente.'));
                    } else {
                        $this->Flash->error(__('Hubo inconvenientes al eliminar ' . $this->mod_title . '. Por favor, otra vez intente.'));
                    }
                }
                return $this->redirect(['action' => 'index', 'idx' => $Idx, 'id'=> $Id]);
            } else {
                $this->Flash->error(__('Operación denegada.'));
                return $this->redirect(['action' => 'index', 'controller' => 'TbEtapa', 'idx' => $Idx, 'id'=>$Id]);
            }
        } else {
            $this->Flash->error(__('Operación denegada.'));
            return $this->redirect(['action' => 'index', 'controller' => 'TbEtapa', 'idx' => $Idx, 'id'=>$Id]);
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
