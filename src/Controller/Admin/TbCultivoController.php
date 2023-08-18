<?php

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\Datasource\ConnectionManager;


/**
 * TbCultivo Controller
 *
 * @property \App\Model\Table\TbCultivoTable $TbCultivo
 *
 * @method \App\Model\Entity\TbCultivo[] paginate($object = null, array $settings = [])
 */
class TbCultivoController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Csrf');
        $this->mod_modulo = "zona de agrobiodiversidad";
        $this->mod_title = "cultivos";
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
            $TbCultivo = $this->TbCultivo->find()->where(['TbCultivo.status' => 1])->all();
            if ($id == 0) {
                $action = 'add';
            }
            else{
                $action = 'edit';
            }
            $father_name = "";
            foreach ($TbCultivo as $rq) {
                $father_name =  $rq['tb_comunidad']['nombre_segun_sunarp'];
            }
            //    var_dump($Idx, $Id); exit;
            $this->set(compact('TbCultivo', 'Idx', 'Id', 'idZabd', 'father_name','action', 'mod_modulo', 'mod_title', 'styles', 'scripts', 'permiso'));
            $this->set('_serialize', ['TbCultivo']);
        } else {
            $this->Flash->error(__('Operación denegada.'));
            return $this->redirect($this->Auth->redirectUrl());
        }
    }


    /**
     * View method
     *
     * @param string|null $id TbCultivo id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($idx = null, $id = null)
    {
        $id_zabd = $idx;
        if ($this->permiso['view']) {
            $TbCultivo = $this->TbCultivo->find()->where(['TbCultivo.id' => $id])->first();
            if ($TbCultivo != NULL) {
                $mod_modulo = $this->mod_modulo;
                $mod_title = $this->mod_title;
                $permiso = $this->permiso;
                $this->set(compact('TbCultivo', 'id_zabd', 'mod_modulo', 'mod_title', 'permiso'));
                $this->set('_serialize', ['TbCultivo']);
            } else {
                $this->Flash->error(__('Operación denegada.'));
                return $this->redirect(['action' => 'index', 'controller' => 'TbCultivo', 'idx' => $idx]);
            }
        } else {
            $this->Flash->error(__('Operación denegada.'));
            return $this->redirect(['action' => 'index', 'controller' => 'TbCultivo', 'idx' => $idx]);
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
            $TbCultivo = $this->TbCultivo->newEntity();
            if ($this->request->is('post')) {
                $data = $this->request->getData();
                $data['user_id'] = $this->Auth->User('id');
                $data['cultivo'] = ucwords(strtolower($data['cultivo']));
                $data['tb_comunidad_id'] = $Id;
                $TbCultivo = $this->TbCultivo->patchEntity($TbCultivo, $data);
                if ($this->TbCultivo->save($TbCultivo)) {
                    $list_module = explode('/', $this->request->params['_matchedRoute']);
                    $user_id = $this->Auth->User('id');
                    $module = $list_module[(count($list_module) - 2)];
                    $action = $list_module[(count($list_module) - 1)];
                    $station_id = $TbCultivo->id;
                    $recurso_id = '4';
                    $this->Functions->saveLogWeb($module, $station_id, $action, $user_id, $recurso_id);
                    $this->Flash->success(__($this->mod_title . ' creado satisfactoriamente.'));
                    return $this->redirect(['action' => 'index', 'controller' => 'TbCultivo', 'idx' => $Idx, 'id' => $Id]);
                }
                $this->Flash->error(__('Hubo inconvenientes al crear ' . $this->mod_title . '. Por favor, otra vez intente.'));
            }
            $organizacion = $this->TbOrganizacion->find('list', ['keyField' => 'id', 'valueField' => 'nombre_organizacion'])->where(['TbOrganizacion.status' => '1'])->order(['nombre_organizacion ASC']);
            $mod_modulo = $this->mod_modulo;
            $mod_title = $this->mod_title;
            $scripts = ['assets/packages/jqueryvalidation/dist/jquery.validate'];
            $this->set(compact('TbCultivo', 'Idx', 'Id', 'mod_modulo', 'mod_title', 'scripts', 'organizacion', 'comunidad'));
            $this->set('_serialize', ['TbCultivo']);
        } else {
            $this->Flash->error(__('Operación denegada.'));
            return $this->redirect(['action' => 'index', 'controller' => 'TbCultivo', 'idx' => $Idx, 'id' => $Id]);
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id TbCultivo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($idx = null, $id = null, $idy =null)
    {
        $Idx = $idx;
        $Id = $id;
        if ($this->permiso['edit']) {
            $TbCultivo = $this->TbCultivo->find()->where(['TbCultivo.id' => $idy, 'TbCultivo.status' => '1'])->first();
            if ($TbCultivo != NULL) {
                if ($this->request->is(['patch', 'post', 'put'])) {
                    $data = $this->request->getData();
                    $data['cultivo'] = ucwords(strtolower($data['cultivo']));
                    $TbCultivo = $this->TbCultivo->patchEntity($TbCultivo, $data);
                    if ($this->TbCultivo->save($TbCultivo)) {
                        $list_module = explode('/', $this->request->params['_matchedRoute']);
                        $user_id = $this->Auth->User('id');
                        $module = $list_module[(count($list_module) - 3)];
                        $action = $list_module[(count($list_module) - 2)];
                        $station_id = $TbCultivo->id;
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
                $this->set(compact('TbCultivo', 'Idx','Id', 'mod_modulo', 'mod_title', 'scripts', 'organizacion', 'comunidad'));
                $this->set('_serialize', ['TbCultivo']);
                // var_dump("sdsd"); exit; 
            } 
            else {
                $this->Flash->error(__('Operación denegada.'));
                return $this->redirect(['action' => 'index', 'controller' => 'TbCultivo', 'idx' => $Idx, 'id' => $Id]);
            }
        } else {
            $this->Flash->error(__('Operación denegada.'));
            return $this->redirect(['action' => 'index', 'controller' => 'TbCultivo', 'idx' => $Idx, 'id' => $Id]);
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id TbCultivo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($idx = null, $id = null, $idy = null)
    {
        $TbCultivo = $this->TbCultivo->find()->where(['TbCultivo.id' => $idy])->first();
        // var_dump($TbCultivo); exit; 
        $Idx = $idx;
        $Id = $id;
        if ($this->permiso['delete']) {
            $this->request->is(['post', 'delete']);
            if ($TbCultivo != NULL) {
                if ($TbCultivo->validacionTbEtapa > 0) {
                    $this->Flash->error(__('TbCultivo ' . $TbCultivo->id . ', imposible de eliminar. Tiene registros asociados.'));
                } else {
                    $TbCultivo['status'] = '0';
                    if ($this->TbCultivo->save($TbCultivo)) {
                        $list_module = explode('/', $this->request->params['_matchedRoute']);
                        $user_id = $this->Auth->User('id');
                        $module = $list_module[(count($list_module) - 3)];
                        $action = $list_module[(count($list_module) - 2)];
                        $station_id = $TbCultivo->id;
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
                return $this->redirect(['action' => 'index', 'controller' => 'TbCultivo', 'idx' => $Idx, 'id'=>$Id]);
            }
        } else {
            $this->Flash->error(__('Operación denegada.'));
            return $this->redirect(['action' => 'index', 'controller' => 'TbCultivo', 'idx' => $Idx, 'id'=>$Id]);
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
