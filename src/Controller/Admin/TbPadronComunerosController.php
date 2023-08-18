<?php

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\Datasource\ConnectionManager;
use Authentication\IdentityInterface;
use Cake\ORM\Entity;

/**
 * TbPadronComuneros Controller
 *
 * @property \App\Model\Table\TbPadronComunerosTable $TbPadronComuneros
 *
 * @method \App\Model\Entity\TbPadronComuneros[] paginate($object = null, array $settings = [])
 */
class TbPadronComunerosController extends AppController
{
    public function initialize()
    {
        parent::initialize(); // TODO: Change the autogenerated stub
        $this->loadComponent('Csrf');
        $this->mod_modulo = "zona de agrobiodiversidad";
        $this->mod_title = "padrón de comuneros";
        $this->loadModel('Zabd');
        $this->loadModel('TbCentroPoblado');
        $this->loadModel('OptionList');
        $this->loadModel('Ubigeo');
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
        $Zabd = $this->Zabd->find()->where(['Zabd.id' => $idx, 'Zabd.status' => '1'])->first();
        if ($Zabd != NULL && $this->permiso['index']) {
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
            // faltaria agregar el status
            $TbPadronComuneros = $this->TbPadronComuneros->find()->contain(['TbCentroPoblado', 'Zabd', 'Ubigeo'])->where(['tb_zabd_id' => $Zabd->id, 'TbPadronComuneros.status' => 1])->all();
            // var_dump($TbPadronComuneros); exit;
            if ($TbPadronComuneros != NULL) {
                $this->set(compact('TbPadronComuneros', 'Zabd', 'mod_modulo', 'mod_title', 'styles', 'scripts', 'permiso'));
                $this->set('_serialize', ['TbPadronComuneros']);
            } else {
                $this->Flash->error(__('Operación denegada.'));
                return $this->redirect(['action' => 'index', 'controller' => 'Zabd']);
                // var_dump($Zabd); exit;
            }
        } else {
            $this->Flash->error(__('Operación denegada.'));
            return $this->redirect(['action' => 'index', 'controller' => 'Zabd']);
        }
    }

    /**
     * View method
     *
     * @param string|null $id Zabd Accesion id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($idx = null, $id = null)
    {
        $Zabd = $this->Zabd->find()->where(['Zabd.id' => $idx, 'Zabd.status' => '1'])->first();
        if ($Zabd != NULL && $this->permiso['view']) {
            $mod_modulo = $this->mod_modulo;
            $mod_title = $this->mod_title;
            $permiso = $this->permiso;
            $TbPadronComuneros = $this->TbPadronComuneros->find()->contain(['TbCentroPoblado', 'Zabd', 'Ubigeo'])
                ->where(['TbPadronComuneros.id' => $id, 'TbPadronComuneros.tb_zabd_id' => $idx, 'TbPadronComuneros.status' => '1'])
                ->first();
            if ($TbPadronComuneros != NULL) {
                $this->set(compact('TbPadronComuneros', 'mod_modulo', 'mod_title', 'permiso', 'Zabd'));
                $this->set('_serialize', ['TbPadronComuneros']);
            } else {
                $this->Flash->error(__('Operación denegada.'));
                return $this->redirect(['action' => 'index', 'controller' => 'TbPadronComuneros', $idx]);
            }
        } else {
            return $this->redirect(['action' => 'index', 'controller' => 'TbPadronComuneros', $idx]);
        }
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($idx = null)
    {
        $Zabd = $this->Zabd->find()->where(['Zabd.id' => $idx, 'Zabd.status' => '1'])->first();
        if ($Zabd != NULL && $this->permiso['add']) {
            $TbPadronComuneros = $this->TbPadronComuneros->newEntity();
            if ($this->request->is('post')) {

                $data = $this->request->getData();
                if ($data['fecha_nacimintos'] != '' && $data['fecha_nacimintos'] <= date('d-m-Y')) {
                    $data['fecha_naciminto'] = date('Y-m-d',strtotime($data['fecha_nacimintos']));
                } else {
                    $data['fecha_naciminto'] = '';
                }
                $data['tb_zabd_id'] = $Zabd->id;
                $TbPadronComuneros = $this->TbPadronComuneros->patchEntity($TbPadronComuneros, $data);
                if ($this->TbPadronComuneros->save($TbPadronComuneros)) {
                    $list_module = explode('/', $this->request->params['_matchedRoute']);
                    $user_id = $this->Auth->User('id');
                    $module = $list_module[(count($list_module) - 2)];
                    $action = $list_module[(count($list_module) - 1)];
                    $station_id = $TbPadronComuneros->id;
                    $recurso_id = '4';
                    $this->Functions->saveLogWeb($module, $station_id, $action, $user_id, $recurso_id);
                    $this->Flash->success(__('padron de comuneros creado satisfactoriamente.'));
                    return $this->redirect(['action' => 'index', 'controller' => 'TbPadronComuneros', $idx]);
                    return $this->redirect(['action' => 'index', 'idx' => $Zabd->id]);
                }
                $this->Flash->error(__('Hubo inconvenientes al crear el padron de comuneros. Por favor, otra vez intente.'));
            }

            $mod_modulo = $this->mod_modulo;
            $mod_title = $this->mod_title;
            $scripts = ['assets/packages/jqueryvalidation/dist/jquery.validate'];
            $TbCentroPoblado = $this->TbPadronComuneros->TbCentroPoblado->find('list', ['keyField' => 'id', 'valueField' => 'centro_poblado'])->contain(['TbComunidad'])->where(['TbCentroPoblado.status' => '1', 'TbComunidad.tb_zabd_id' => $Zabd->id]);
            $TbPadronComuneros->fecha_nacimiento = ($TbPadronComuneros->fecha_nacimiento == NULL) ? NULL : date('d-m-Y', strtotime($TbPadronComuneros->fecha_nacimiento));
            $departamento = $this->Ubigeo->find('list', ['keyField' => 'cod_dep', 'valueField' => 'nombre'])->where(['cod_pro' => 0]);

            $this->set(compact('TbPadronComuneros', 'mod_modulo', 'mod_title', 'TbCentroPoblado', 'Zabd', 'departamento'));
            $this->set('_serialize', ['TbPadronComuneros']);
        } else {
            return $this->redirect(['action' => 'index', 'controller' => 'TbPadronComuneros', $idx]);
        }
    }

    /**
     *
     * @param string|null $id Zabd Accesion id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($idx = null, $id = null)
    {
        $Zabd = $this->Zabd->find()->where(['Zabd.id' => $idx, 'Zabd.status' => '1'])->first();
        if ($Zabd != NULL && $this->permiso['edit']) {
            $TbPadronComuneros = $this->TbPadronComuneros->find()->where(['TbPadronComuneros.id' => $id, 'TbPadronComuneros.status' => '1', 'tb_zabd_id' => $idx])->contain(['Ubigeo'])->first();
            if ($TbPadronComuneros != NULL) {
                if ($this->request->is(['putch', 'post', 'put'])) {

                    $data = $this->request->getData();
                    if ($data['fecha_nacimientos'] != '' && $data['fecha_nacimientos'] <= date('d-m-Y')) {
                        $data['fecha_nacimiento'] = date('Y-m-d',strtotime($data['fecha_nacimientos']));
                    } else {
                        $data['fecha_nacimiento'] = '';
                    }
                    $data['tb_zabd_id'] = $Zabd->id;
                    $TbPadronComuneros = $this->TbPadronComuneros->patchEntity($TbPadronComuneros, $data);
                    if ($this->TbPadronComuneros->save($TbPadronComuneros)) {
                        $list_module = explode('/', $this->request->params['_matchedRoute']);
                        $user_id = $this->Auth->User('id');
                        $module = $list_module[(count($list_module) - 2)];
                        $action = $list_module[(count($list_module) - 1)];
                        $station_id = $TbPadronComuneros->id;
                        $recurso_id = '4';
                        $this->Functions->saveLogWeb($module, $station_id, $action, $user_id, $recurso_id);
                        $this->Flash->success(__('padron de comuneros creado satisfactoriamente.'));
                        return $this->redirect(['action' => 'index', 'controller' => 'TbPadronComuneros', $idx]);
                        return $this->redirect(['action' => 'index', 'idx' => $Zabd->id]);
                    }
                    $this->Flash->error(__('Hubo inconvenientes al crear el padron de comuneros. Por favor, otra vez intente.'));
                }

                $mod_modulo = $this->mod_modulo;
                $mod_title = $this->mod_title;
                $scripts = ['assets/packages/jqueryvalidation/dist/jquery.validate'];
                $TbCentroPoblado = $this->TbPadronComuneros->TbCentroPoblado->find('list', ['keyField' => 'id', 'valueField' => 'centro_poblado'])->contain(['TbComunidad'])->where(['TbCentroPoblado.status' => '1', 'TbComunidad.tb_zabd_id' => $Zabd->id]);
                $TbPadronComuneros->fecha_nacimiento = ($TbPadronComuneros->fecha_nacimiento == NULL) ? NULL : date('d-m-Y', strtotime($TbPadronComuneros->fecha_nacimiento));
                $departamento = $this->Ubigeo->find('list', ['keyField' => 'cod_dep', 'valueField' => 'nombre'])->where(['cod_pro' => 0]);
                if ($TbPadronComuneros->ubigeo_id != NULL || $TbPadronComuneros->ubigeo_id != '') {
                    $provincias = $this->Ubigeo->find('list', ['keyField' => 'cod_pro', 'valueField' => 'nombre'])->where(['cod_dep' => $TbPadronComuneros['ubigeo']['cod_dep'], 'cod_pro !=' => 0, 'cod_dis' => 0]);
                    $distritos = $this->Ubigeo->find('list', ['keyField' => 'id', 'valueField' => 'nombre'])->where(['cod_dep' => $TbPadronComuneros['ubigeo']['cod_dep'], 'cod_pro' => $TbPadronComuneros['ubigeo']['cod_pro'], 'cod_dis !=' => 0]);
                } else {
                    $provincias = [];
                    $distritos = [];
                }

                $this->set(compact('TbPadronComuneros', 'mod_modulo', 'mod_title', 'TbCentroPoblado', 'Zabd', 'departamento', 'provincias', 'distritos', 'scripts'));
                $this->set('_serialize', ['TbPadronComuneros']);
                // var_dump($Zabd); exit;
            }
        } else {
            return $this->redirect(['action' => 'index', 'controller' => 'TbPadronComuneros', $idx]);
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Zabd Accesion id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($idx = null, $id = null)
    {
        $Zabd = $this->Zabd->find()->where(['Zabd.id' => $idx, 'Zabd.status' => '1'])->first();
        if ($Zabd != NULL && $this->permiso['delete']) {
            $this->request->is(['post', 'delete']);
            $TbPadronComuneros = $this->TbPadronComuneros->find()->where(['TbPadronComuneros.id' => $id, 'TbPadronComuneros.status' => '1', 'tb_zabd_id' => $idx])->first();
            if ($TbPadronComuneros == NULL) {
                $this->Flash->error(__('Operación denegada.'));
                return $this->redirect(['action' => 'index', 'controller' => 'TbPadronComuneros', $idx]);
            } else {
                $TbPadronComuneros['status'] = 0;
                if ($this->TbPadronComuneros->save($TbPadronComuneros)) {
                    $list_module = explode('/', $this->request->params['_matchedRoute']);
                    $user_id = $this->Auth->User('id');
                    $module = $list_module[(count($list_module) - 3)];
                    $action = $list_module[(count($list_module) - 2)];
                    $station_id = $TbPadronComuneros->id;
                    $recurso_id = '4';
                    $this->Functions->saveLogWeb($module, $station_id, $action, $user_id, $recurso_id);
                    $this->Flash->success(__('padron de comuneros eliminada satisfactoriamente.'));
                } else {
                    $this->Flash->error(__('Hubo inconvenientes al eliminar la padron de comuneros. Por favor, otra vez intente.'));
                }
                return $this->redirect(['action' => 'index', 'idx' => $TbPadronComuneros->tb_zabd_id]);
            }
        } else {
            return $this->redirect(['action' => 'index', 'controller' => 'TbPadronComuneros', $idx]);
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