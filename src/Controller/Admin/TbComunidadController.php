<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use Cake\Datasource\ConnectionManager;
use Symfony\Component\VarDumper\VarDumper;

/**
 * TbComunidad Controller
 *
 * @property \App\Model\Table\TbComunidadTable $TbComunidad
 *
 * @method \App\Model\Entity\TbComunidad[] paginate($object = null, array $settings = [])
 */
class TbComunidadController extends AppController
{
    public function initialize()
    {
        parent::initialize(); // TODO: Change the autogenerated stub
        $this->loadComponent('Csrf');
        $this->mod_modulo = "zona de agrobiodiversidad";
        $this->mod_title = "comunidad campesina";
        $this->loadModel('Zabd');
        $this->loadModel('TbCentroPoblado');
        $this->loadModel('OptionList');
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
        $idComunidad = $idx;
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
            $TbComunidad = $this->TbComunidad->find()->contain(['Zabd'])->where(['tb_zabd_id' => $Zabd->id, 'TbComunidad.status' => 1])->all();
            if ($TbComunidad != NULL) {
                $this->set(compact('TbComunidad', 'Zabd','idComunidad', 'mod_modulo', 'mod_title', 'styles', 'scripts', 'permiso'));
                $this->set('_serialize', ['TbComunidad']);
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
            $TbComunidad = $this->TbComunidad->find()->contain([ 'Zabd'])
                ->where(['TbComunidad.id' => $id, 'TbComunidad.tb_zabd_id' => $idx, 'TbComunidad.status' => '1'])
                ->first();
            if ($TbComunidad != NULL) {
                $this->set(compact('TbComunidad', 'mod_modulo', 'mod_title', 'permiso', 'Zabd'));
                $this->set('_serialize', ['TbComunidad']);
            } else {
                $this->Flash->error(__('Operación denegada.'));
                return $this->redirect(['action' => 'index', 'controller' => 'TbComunidad', $idx]);
            }
        } else {
            return $this->redirect(['action' => 'index', 'controller' => 'TbComunidad', $idx]);
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
        $TbCentroPoblado = $this->TbCentroPoblado->find('list',['keyField'=>'id','valueField'=>'centro_poblado'])->where(['TbCentroPoblado.status' => '1'])->order(['centro_poblado ASC']);
        // var_dump($TbCentroPoblado); exit;
        if ($Zabd != NULL && $this->permiso['add']) {
            $TbComunidad = $this->TbComunidad->newEntity();
            if ($this->request->is('post')) {
                $data = $this->request->getData();
                $data['tb_zabd_id'] = $Zabd->id;
                $data['nombre_comunidad'] = ucfirst($data['nombre_comunidad']);
                $data['nombre_segun_sunarp'] = ucfirst($data['nombre_segun_sunarp']);
                $TbComunidad = $this->TbComunidad->patchEntity($TbComunidad, $data);
                if ($this->TbComunidad->save($TbComunidad)) {
                    $list_module = explode('/', $this->request->params['_matchedRoute']);
                    $user_id = $this->Auth->User('id');
                    $module = $list_module[(count($list_module) - 2)];
                    $action = $list_module[(count($list_module) - 1)];
                    $station_id = $TbComunidad->id;
                    $recurso_id = '4';
                    $responseIdCentroPoblado = $data['centro-poblado_id'];
                    if ($responseIdCentroPoblado) {
                        $idComunidad = $data['id'];
                        $conexion = ConnectionManager::get('default');
                        foreach ($responseIdCentroPoblado as $key => $value) {
                            $responseId = $value;
                            $query = "UPDATE tb_centro_poblado SET tb_comunidad_id =  $idComunidad WHERE id = $responseId";
                            $updatePadron = $conexion->prepare($query);
                            $updatePadron->exec();
                       }
                    }
                    $this->Functions->saveLogWeb($module, $station_id, $action, $user_id, $recurso_id);
                    $this->Flash->success(__('Comunidad campesina creado satisfactoriamente.'));
                    return $this->redirect(['action' => 'index', 'idx' => $Zabd->id]);
                }
                $this->Flash->error(__('Hubo inconvenientes al crear la Comunidad campesina. Por favor, otra vez intente.'));
            }
            $mod_modulo = $this->mod_modulo;
            $mod_title = $this->mod_title;
            $scripts = ['assets/packages/jqueryvalidation/dist/jquery.validate'];
            $this->set(compact('TbComunidad', 'mod_modulo', 'mod_title','Zabd','TbCentroPoblado'));
            $this->set('_serialize', ['TbComunidad']);
        } else {
            return $this->redirect(['action' => 'index', 'controller' => 'TbComunidad', $idx]);
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
        if ($Zabd != NULL && $this->permiso['add']) {
            $TbComunidad = $this->TbComunidad->find()->where(['TbComunidad.id' => $id, 'TbComunidad.status' => '1', 'tb_zabd_id' => $idx])->first();
            if ($TbComunidad != NULL) {
                if ($this->request->is(['patch', 'post', 'put'])) {
                    // var_dump($TbComunidad); exit; 
                    $data = $this->request->getData();
                    $data['tb_zabd_id'] = $Zabd->id;
                    $TbComunidad = $this->TbComunidad->patchEntity($TbComunidad, $data);
                    if ($this->TbComunidad->save($TbComunidad)) {
                        $list_module = explode('/', $this->request->params['_matchedRoute']);
                        $user_id = $this->Auth->User('id');
                        $module = $list_module[(count($list_module) - 2)];
                        $action = $list_module[(count($list_module) - 1)];
                        $station_id = $TbComunidad->id;
                        $recurso_id = '4';
                        $this->Functions->saveLogWeb($module, $station_id, $action, $user_id, $recurso_id);
                        $this->Flash->success(__('Comunidad campesina Actualizado satisfactoriamente.'));
                        return $this->redirect(['action' => 'index', 'idx' => $Zabd->id]);
                    }
                    $this->Flash->error(__('Hubo inconvenientes al actualizar la Comunidad campesina. Por favor, otra vez intente.'));
                }
                $mod_modulo = $this->mod_modulo;
                $mod_title = $this->mod_title;
                $scripts = ['assets/packages/jqueryvalidation/dist/jquery.validate'];

                $this->set(compact('TbComunidad', 'mod_modulo', 'mod_title', 'Zabd'));
                $this->set('_serialize', ['TbComunidad']);
            } else {
                $this->Flash->error(__('Operación denegada.'));
                return $this->redirect(['action' => 'index', 'controller' => 'TbComunidad', $idx]);
            }
        } else {
            return $this->redirect(['action' => 'index', 'controller' => 'TbComunidad', $idx]);
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
            $TbComunidad = $this->TbComunidad->find()->where(['TbComunidad.id' => $id, 'TbComunidad.status' => '1', 'tb_zabd_id' => $idx])->first();
            if ($TbComunidad == NULL) {
                $this->Flash->error(__('Operación denegada.'));
                return $this->redirect(['action' => 'index', 'controller' => 'TbComunidad', $idx]);
            } else {
                $TbComunidad['status'] = 0;
                if ($this->TbComunidad->save($TbComunidad)) {
                    $list_module = explode('/', $this->request->params['_matchedRoute']);
                    $user_id = $this->Auth->User('id');
                    $module = $list_module[(count($list_module) - 3)];
                    $action = $list_module[(count($list_module) - 2)];
                    $station_id = $TbComunidad->id;
                    $recurso_id = '4';
                    $this->Functions->saveLogWeb($module, $station_id, $action, $user_id, $recurso_id);
                    $this->Flash->success(__('Comunidad campesina eliminada satisfactoriamente.'));
                } else {
                    $this->Flash->error(__('Hubo inconvenientes al eliminar la Comunidad campesina. Por favor, otra vez intente.'));
                }
                return $this->redirect(['action' => 'index', 'idx' => $TbComunidad->tb_zabd_id]);
            }
        } else {
            return $this->redirect(['action' => 'index', 'controller' => 'TbComunidad', $idx]);
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