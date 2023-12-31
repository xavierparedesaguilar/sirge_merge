<?php

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * OutputSeed Controller
 *
 * @property \App\Model\Table\OutputSeedTable $OutputSeed
 */
class OutputSeedController extends AppController
{

        public function initialize()
    {
        parent::initialize(); // TODO: Change the autogenerated stub
        $this->loadComponent('Csrf');
        $this->mod_parent = "Banco Semilla ";
        $this->mod_padre = "Salida de Material";
        $this->loadModel('BankSeed');
        $this->loadModel('OptionList');
        $this->loadModel('Passport');
        $this->loadModel('Module');
        $this->module = $this->Module->find()->where(['controller' =>'BankSeed'])->first();
        if(!empty($this->module))
          $this->permiso=$this->Functions->validarModulo($this->module->id);
    }
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index($id=null)
    {
        $bankSeed_count = $this->BankSeed->find()->where(['BankSeed.status '=>'1','BankSeed.id'=>$id])->first();
        $passport = $this->Passport->find()->where(['id '=>$bankSeed_count->passport_id])->first();

        if($bankSeed_count !=NULL  && $this->permiso['index']){

            $styles  = ['assets/css/dataTables.bootstrap', 'assets/css/select.bootstrap.min'];
            $scripts = ['assets/js/select2/select2', 'assets/js/datatable/jquery.dataTables.min',
                        'assets/js/datatable/dataTables.bootstrap.min',
                        'assets/js/datatable/dataTables.select.min'];

            $outputSeed = $this->OutputSeed->find()->where(['OutputSeed.status !=' => '0', 'bank_seed_id' => $id]);
            $titulo=$this->mod_parent.' - '. $this->mod_padre;
            $titulo_lista=$this->mod_padre;
            $permiso= $this->permiso;

            $this->set(compact('outputSeed','styles','scripts','titulo','titulo_lista','id','permiso','passport'));
            $this->set('_serialize', ['outputSeed']);

        }else{

              $this->Flash->error(__('Operación denegada.'));
              return $this->redirect(['action' => 'index','controller'=>'BankSeed']);

        }
    }

    /**
     * View method
     *
     * @param string|null $id Output Seed id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null, $child = null)
    {

        $bankSeed_count = $this->BankSeed->find()->where(['BankSeed.status '=>'1','BankSeed.id'=>$id])->first();
        $passport = $this->Passport->find()->where(['id '=>$bankSeed_count->passport_id])->first();
        $validar=$this->permiso['role_id']==1?true:$this->permiso['station_id']==$passport['station_current_id'];

        if($bankSeed_count ==NULL || !$this->permiso['view']){

            $this->Flash->error(__('Operación denegada.'));
            return $this->redirect(['action' => 'index','controller'=>'BankSeed']);

        } else{

            $outputSeed = $this->OutputSeed->find()->where(['OutputSeed.status !=' => '0','OutputSeed.id'=>$child,'OutputSeed.bank_seed_id'=>$id])->first();

            if($outputSeed==NULL){

                $this->Flash->error(__('Operación denegada.'));
                return $this->redirect(['action' => 'index',$id]);
            }

            $titulo = $this->mod_padre;
            $parent = $this->mod_parent;
             $permiso= $this->permiso;

            $this->set(compact('outputSeed','titulo','permiso','id','child','validar'));
            $this->set('_serialize', ['outputSeed']);
        }


    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id=null)
    {

        $bankSeed_count = $this->BankSeed->find()->where(['BankSeed.status '=>'1','BankSeed.id'=>$id])->count();

        if($bankSeed_count>0 && $this->permiso['add']){

            $outputSeed = $this->OutputSeed->newEntity();
            $modulo= $this->mod_padre ;
            $scripts = ['assets/js/fileinput/fileinput.min','assets/packages/jqueryvalidation/dist/jquery.validate'];
            $outputSeed->bank_seed_id = $id;

            if ($this->request->is('post')) {
                $data=$this->request->getData();
                $data['status']=1;
                try{
                        $data['bank_seed_id']= $id;
                        $data['exitdate'] = ($data['fecha_salida'] == '' || $data['fecha_salida'] == NULL) ? NULL : date('Y-m-d', strtotime($data['fecha_salida']));

                        $outputSeed = $this->OutputSeed->patchEntity($outputSeed,$data);
                        if ($this->OutputSeed->save($outputSeed)) {

                            $list_module = explode('/', $this->request->params['_matchedRoute']);

                            $user_id    = $this->Auth->User('id');
                            $module     = $list_module[(count($list_module)-4)];
                            $action     = $list_module[(count($list_module)-2)].'/'.$list_module[(count($list_module)-1)];
                            $station_id = $outputSeed->id;
                            $recurso_id = '1';

                            $this->Functions->saveLogWeb($module, $station_id, $action, $user_id, $recurso_id);

                            $this->Flash->success(__('El regsitro Salida de Material fue ingresado satisfactoriamente.'));

                            return $this->redirect(['action' => 'index',$outputSeed->bank_seed_id]);
                        }
                        $this->Flash->error(__('Hubo inconvenientes al crear la Salida de Material. Por favor, Otra vez intente.'));

                 } catch (\Exception $e) {

                        $this->Flash->error(__('Hubo inconvenientes al crear la Salida de Material. Por favor, Otra vez intente.'));
                        return $this->redirect(['action' => 'index',$outputSeed->bank_seed_id]);
                }
            }
            $bankSeed = $this->BankSeed->find()->where(['id' => $id])->first();

            $this->set(compact('outputSeed', 'bankSeed','modulo','scripts','id'));

        }else {

                 $this->Flash->error(__('Operación denegada.'));
                 return $this->redirect(['action' => 'index','controller'=>'BankSeed']);
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Output Seed id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null, $child = null)
    {

        $bankSeed_count = $this->BankSeed->find()->where(['BankSeed.status '=>'1','BankSeed.id'=>$id])->first();
        $passport = $this->Passport->find()->where(['id '=>$bankSeed_count->passport_id])->first();
        $validar=$this->permiso['role_id']==1?true:$this->permiso['station_id']==$passport['station_current_id'];

        if($bankSeed_count!=NULL &&  $this->permiso['edit'] /*&& $validar*/ ){

            $outputSeed = $this->OutputSeed->find()
                                         ->where(['OutputSeed.status !=' => '0','OutputSeed.id'=>$child,'OutputSeed.bank_seed_id'=>$id
                                            ])->first();

            if($outputSeed==NULL){

                        $this->Flash->error(__('Operación denegada.'));
                        return $this->redirect(['action' => 'index',$id]);
            } else {

                    $scripts = ['assets/js/fileinput/fileinput.min','assets/packages/jqueryvalidation/dist/jquery.validate'];

                    $modulo=$this->mod_padre ;

                    if ($this->request->is(['patch', 'post', 'put'])) {
                        $data=$this->request->getData();
                        $data['exitdate'] = ($data['fecha_salida'] == '' || $data['fecha_salida'] == NULL) ? NULL : date('Y-m-d', strtotime($data['fecha_salida']));
                         try{
                                $outputSeed = $this->OutputSeed->patchEntity($outputSeed,$data);
                                if ($this->OutputSeed->save($outputSeed)) {

                                    $list_module = explode('/', $this->request->params['_matchedRoute']);

                                    $user_id    = $this->Auth->User('id');
                                    $module     = $list_module[(count($list_module)-5)];
                                    $action     = $list_module[(count($list_module)-3)].'/'.$list_module[(count($list_module)-2)];
                                    $station_id = $outputSeed->id;
                                    $recurso_id = '1';

                                    $this->Functions->saveLogWeb($module, $station_id, $action, $user_id, $recurso_id);

                                    $this->Flash->success(__('El registro de Salida de Material fue actualizada satisfactoriamente.'));

                                    return $this->redirect(['action' => 'index',$outputSeed->bank_seed_id]);
                                }
                                $this->Flash->error(__('Hubo inconvenientes al actualizar la Salida de Material. Por favor, Otra vez intente.'));
                            } catch (\Exception $e) {

                                $this->Flash->error(__('Hubo inconvenientes al actualizar la Salida de Material. Por favor, Otra vez intente.'));
                                return $this->redirect(['action' => 'index',$outputSeed->bank_seed_id]);
                        }
                    }


                    $outputSeed->exitdate = empty($outputSeed->exitdate) ? '' : date('d-m-Y', strtotime($outputSeed->exitdate));
                    $bankSeed = $this->BankSeed->find()->where(['id' => $id])->first();

                    $this->set(compact('outputSeed','bankSeed','scripts','modulo','id','child'));
                    $this->set('_serialize', ['outputInvitro']);

            }


           } else {

                 $this->Flash->error(__('Operación denegada.'));
                 return $this->redirect(['action' => 'index','controller'=>'BankSeed']);
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Output Seed id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null, $child = null)
    {
        $this->request->is(['post', 'delete']);

        $bankSeed_count = $this->BankSeed->find()->where(['BankSeed.status '=>'1','BankSeed.id'=>$id])->first();
        $passport = $this->Passport->find()->where(['id '=>$bankSeed_count->passport_id])->first();
        $validar=$this->permiso['role_id']==1?true:$this->permiso['station_id']==$passport['station_current_id'];

        if($bankSeed_count!=NULL && $this->permiso['delete'] /*&& $validar*/){

            $outputSeed = $this->OutputSeed->find()
                                         ->where(['OutputSeed.status !=' => '0','OutputSeed.id'=>$child,'OutputSeed.bank_seed_id'=>$id
                                            ])->first();

            if($outputSeed==NULL){

                        $this->Flash->error(__('Operación denegada.'));
                        return $this->redirect(['action' => 'index',$id]);

            } else {

                $outputSeed['status'] = 0;
                if ($this->OutputSeed->save($outputSeed)) {

                    $list_module = explode('/', $this->request->params['_matchedRoute']);

                    $user_id    = $this->Auth->User('id');
                    $module     = $list_module[(count($list_module)-5)];
                    $action     = $list_module[(count($list_module)-3)].'/'.$list_module[(count($list_module)-2)];
                    $station_id = $outputSeed->id;
                    $recurso_id = '1';

                    $this->Functions->saveLogWeb($module, $station_id, $action, $user_id, $recurso_id);

                    $this->Flash->success(__('El registro de Salida de Material fue eliminado satisfactoriamente.'));
                } else {
                     $this->Flash->error(__('Hubo inconvenientes al eliminar la Salida de Material. Por favor, Otra vez intente.'));
                }

               return $this->redirect(['action' => 'index', $outputSeed->bank_seed_id]);

                }

         }else{

                $this->Flash->error(__('Operación denegada.'));

                return $this->redirect(['action' => 'index','controller'=>'BankSeed']);

        }
    }

    public function exportartabla($id=null) {

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
