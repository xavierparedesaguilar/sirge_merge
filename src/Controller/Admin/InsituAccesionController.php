<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * InsituAccesion Controller
 *
 * @property \App\Model\Table\InsituAccesionTable $InsituAccesion
 *
 * @method \App\Model\Entity\InsituAccesion[] paginate($object = null, array $settings = [])
 */
class InsituAccesionController extends AppController
{
    public function initialize()
    {
        parent::initialize(); // TODO: Change the autogenerated stub
        $this->loadComponent('Csrf');
        $this->mod_modulo = "Conservación In Situ";
        $this->mod_title = "Especies";
        $this->loadModel('Insitu');
        $this->loadModel('OptionList');
        $this->loadModel('Passport');

        $this->loadModel('Module');
        $this->module = $this->Module->find()->where(['controller' => 'Insitu'])->first();
        if(!empty($this->module))
          $this->permiso=$this->Functions->validarModulo($this->module->id);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index( $idx = null )
    {

        $insitu = $this->Insitu->find()->where(['Insitu.id'=>$idx,'Insitu.status'=>'1'])->first();

        if ($insitu!=NULL && $this->permiso['index']) {

            $mod_modulo  = $this->mod_modulo;
            $mod_title   = $this->mod_title;
            $permiso     = $this->permiso;

            $styles  = ['assets/css/dataTables.bootstrap', 'assets/css/select.bootstrap.min'];
            $scripts = ['assets/js/select2/select2', 'assets/js/datatable/jquery.dataTables.min',
                        'assets/js/datatable/dataTables.bootstrap.min',
                        'assets/js/datatable/dataTables.select.min'];


            $insituAccesion = $this->InsituAccesion->find()->where(['insitu_id' => $insitu->id, 'status' => '1'])->all();

            if ($insituAccesion!=NULL) {

                $this->set(compact('insituAccesion', 'insitu', 'mod_modulo', 'mod_title', 'styles', 'scripts','permiso'));
                $this->set('_serialize', ['insituAccesion']);

            } else {

                $this->Flash->error(__('Operación denegada.'));
                return $this->redirect(['action' => 'index','controller'=>'Insitu']);
            }

        } else {

            $this->Flash->error(__('Operación denegada.'));
            return $this->redirect(['action' => 'index','controller'=>'Insitu']);

        }
    }

    /**
     * View method
     *
     * @param string|null $id Insitu Accesion id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($idx = null, $id = null)
    {
        $insitu = $this->Insitu->find()->where(['Insitu.id'=>$idx,'Insitu.status'=>'1'])->first();

        if ($insitu!=NULL && $this->permiso['view']) {

            $mod_modulo  = $this->mod_modulo;
            $mod_title   = $this->mod_title;
            $permiso     = $this->permiso;

            // $insituAccesion = $this->InsituAccesion->get($id, [
            //     'contain' => ['Insitu', 'Passport']
            // ]);
            $insituAccesion = $this->InsituAccesion->find()->contain(['Insitu','Passport'])
                                                           ->where(['InsituAccesion.id'=>$id,'InsituAccesion.insitu_id'=>$idx,'InsituAccesion.status'=>'1'])
                                                       ->first();

            if ($insituAccesion!=NULL) {

                $this->set(compact('insituAccesion', 'mod_modulo', 'mod_title','permiso', 'insitu'));
                $this->set('_serialize', ['insituAccesion']);

            } else {

                $this->Flash->error(__('Operación denegada.'));
                return $this->redirect(['action' => 'index','controller'=>'InsituAccesion',$idx]);
            }

        } else {

            //$this->Flash->error(__('Operación denegada.'));
            return $this->redirect(['action' => 'index','controller'=>'InsituAccesion',$idx]);

        }
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($idx = null)
    {
        $insitu = $this->Insitu->find()->where(['Insitu.id'=>$idx,'Insitu.status'=>'1'])->first();

        if ($insitu!=NULL && $this->permiso['add']) {

            $insituAccesion = $this->InsituAccesion->newEntity();

            if ($this->request->is('post')) {

                $data = $this->request->getData();

                $data['status'] = '1';
                $data['insitu_id'] = $insitu->id;

                if(!empty($data['passport_id'])){

                    $passport_model = $this->Passport->get($data['passport_id'], ['contain' => 'Specie']);

                    $data['accenumb']    = $passport_model->accenumb;
                    $data['othenumb']    = $passport_model->othenumb;
                    $data['common_name'] = $passport_model->specie->cropname;
                }

                $insituAccesion = $this->InsituAccesion->patchEntity($insituAccesion, $data);

                if ($this->InsituAccesion->save($insituAccesion)) {

                    $list_module = explode('/', $this->request->params['_matchedRoute']);

                    $user_id    = $this->Auth->User('id');
                    $module     = $list_module[(count($list_module)-2)];
                    $action     = $list_module[(count($list_module)-1)];
                    $station_id = $insituAccesion->id;
                    $recurso_id = '4';

                    $this->Functions->saveLogWeb($module, $station_id, $action, $user_id, $recurso_id);

                    $this->Flash->success(__('Accesión creado satisfactoriamente.'));

                    return $this->redirect(['action' => 'index', 'idx' => $insitu->id]);
                }

                $this->Flash->error(__('Hubo inconvenientes al crear la Accesión. Por favor, otra vez intente.'));
            }

            $mod_modulo  = $this->mod_modulo;
            $mod_title   = $this->mod_title;

            $scripts = ['assets/packages/jqueryvalidation/dist/jquery.validate'];

            $passport = $this->Passport->find('list', ['keyField' => 'id', 'valueField' => 'accenumb'])->where(['status' => 1])->order(['accenumb'=>'ASC']);

            $this->set(compact('insituAccesion', 'insitu', 'mod_modulo', 'mod_title', 'scripts', 'passport'));
            $this->set('_serialize', ['insituAccesion']);

        } else {

            //$this->Flash->error(__('Operación denegada.'));
            return $this->redirect(['action' => 'index','controller'=>'InsituAccesion',$idx]);

        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Insitu Accesion id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($idx = null, $id = null)
    {
        $insitu = $this->Insitu->find()->where(['Insitu.id'=>$idx,'Insitu.status'=>'1'])->first();

        if ($insitu!=NULL && $this->permiso['add']) {

            $insituAccesion = $this->InsituAccesion->find()->where(['InsituAccesion.id'=>$id,'InsituAccesion.status'=>'1','InsituAccesion.insitu_id'=>$idx])->first();

            if ($insituAccesion!=NULL) {


            if ($this->request->is(['patch', 'post', 'put'])) {

                $data = $this->request->getData();

                $data['status'] = '1';
                $data['insitu_id'] = $insitu->id;

                if(!empty($data['passport_id'])){

                    $passport_model = $this->Passport->get($data['passport_id'], ['contain' => 'Specie']);

                    $data['accenumb']    = $passport_model->accenumb;
                    $data['othenumb']    = $passport_model->othenumb;
                    $data['common_name'] = $passport_model->specie->cropname;
                }

                $insituAccesion = $this->InsituAccesion->patchEntity($insituAccesion, $data);

                if ($this->InsituAccesion->save($insituAccesion)) {

                    $list_module = explode('/', $this->request->params['_matchedRoute']);

                    $user_id    = $this->Auth->User('id');
                    $module     = $list_module[(count($list_module)-3)];
                    $action     = $list_module[(count($list_module)-2)];
                    $station_id = $insituAccesion->id;
                    $recurso_id = '4';

                    $this->Functions->saveLogWeb($module, $station_id, $action, $user_id, $recurso_id);

                    $this->Flash->success(__('Accesión actualizado satisfactoriamente.'));

                    return $this->redirect(['action' => 'index', 'idx' => $insitu->id]);
                }

                $this->Flash->error(__('Hubo inconvenientes al actualizar la Accesión. Por favor, otra vez intente.'));
            }

            $mod_modulo  = $this->mod_modulo;
            $mod_title   = $this->mod_title;

            $scripts = ['assets/packages/jqueryvalidation/dist/jquery.validate'];

            $passport = $this->Passport->find('list', ['keyField' => 'id', 'valueField' => 'accenumb'])->where(['status' => 1])->order(['accenumb'=>'ASC']);

            $this->set(compact('insituAccesion', 'insitu', 'mod_modulo', 'mod_title', 'scripts', 'passport'));
            $this->set('_serialize', ['insituAccesion']);

            } else {

                $this->Flash->error(__('Operación denegada.'));
                return $this->redirect(['action' => 'index','controller'=>'InsituAccesion',$idx]);

            }

        } else {

            //$this->Flash->error(__('Operación denegada.'));
            return $this->redirect(['action' => 'index','controller'=>'InsituAccesion',$idx]);

        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Insitu Accesion id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($idx = null, $id = null)
    {
        $insitu = $this->Insitu->find()->where(['Insitu.id'=>$idx,'Insitu.status'=>'1'])->first();

        if ($insitu!=NULL && $this->permiso['delete']) {

            $this->request->is(['post', 'delete']);

            $insituAccesion = $this->InsituAccesion->find()->where(['InsituAccesion.id'=>$id,'InsituAccesion.status'=>'1','InsituAccesion.insitu_id'=>$idx])->first();

            if ($insituAccesion==NULL) {

                $this->Flash->error(__('Operación denegada.'));
                return $this->redirect(['action' => 'index','controller'=>'InsituAccesion',$idx]);

            } else {

                $insituAccesion['status'] = 0;

                if ($this->InsituAccesion->save($insituAccesion)) {

                    $list_module = explode('/', $this->request->params['_matchedRoute']);

                    $user_id    = $this->Auth->User('id');
                    $module     = $list_module[(count($list_module)-3)];
                    $action     = $list_module[(count($list_module)-2)];
                    $station_id = $insituAccesion->id;
                    $recurso_id = '4';

                    $this->Functions->saveLogWeb($module, $station_id, $action, $user_id, $recurso_id);

                    $this->Flash->success(__('Accesión eliminada satisfactoriamente.'));

                } else {

                    $this->Flash->error(__('Hubo inconvenientes al eliminar la Accesión. Por favor, otra vez intente.'));
                }

                return $this->redirect(['action' => 'index', 'idx' => $insituAccesion->insitu_id ]);
            }

        } else {

            //$this->Flash->error(__('Operación denegada.'));
            return $this->redirect(['action' => 'index','controller'=>'InsituAccesion',$idx]);

        }
    }

    public function exportartabla($idx = null) {

        if ($this->request->is('post')) {

            $data = $this->request->getData();

            $filePath = WWW_ROOT .'reportes/'.$data['filename'].'.xlsx';

            if(file_exists($filePath)){

                $this->response->file($filePath , array('download'=> true));

                return $this->response;

            } else {

                $this->Flash->error(__('No existe el archivo.'));
                return $this->redirect(['action' => 'index']);
            }
        }
    }


}