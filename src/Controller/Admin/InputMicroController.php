<?php

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * InputMicro Controller
 *
 * @property \App\Model\Table\InputMicroTable $InputMicro
 *
 * @method \App\Model\Entity\InputMicro[] paginate($object = null, array $settings = [])
 */
class InputMicroController extends AppController
{

    public function initialize()
    {
        parent::initialize(); // TODO: Change the autogenerated stub
        $this->loadComponent('Csrf');
        $this->mod_parent = "Banco Microorganismo ";
        $this->mod_padre = "Entrada de Material";
        $this->loadModel('BankMicro');
        $this->loadModel('OptionList');
        $this->loadModel('PassportMicro');
        $this->loadModel('Passport');

        $this->loadModel('Module');
        $this->module = $this->Module->find()->where(['controller' => 'BankMicro'])->first();
        if(!empty($this->module))
          $this->permiso=$this->Functions->validarModulo($this->module->id);
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index($id=null)
    {

        $bankMicro = $this->BankMicro->find()->select('passport_id')->where(['BankMicro.status '=>'1','BankMicro.id'=>$id])->first();
        $passport = $this->Passport->find()->where(['id '=>$bankMicro->passport_id])->first();

        if($bankMicro !=NULL && $this->permiso['index']){

                $styles  = ['assets/css/dataTables.bootstrap', 'assets/css/select.bootstrap.min'];
                $scripts = ['assets/js/select2/select2', 'assets/js/datatable/jquery.dataTables.min',
                            'assets/js/datatable/dataTables.bootstrap.min',
                            'assets/js/datatable/dataTables.select.min'];

                $passMicro_obj = $this->PassportMicro->find()->select('sampstat')->where(['passport_id'=>$bankMicro->passport_id])->first();
                $optionList_obj = $this->OptionList->find()->select('name')->where(['id'=>$passMicro_obj->sampstat])->first();

                $inputMicro = $this->InputMicro->find()->where(['InputMicro.status !=' => '0', 'bank_micro_id' => $id]);
                $titulo=$this->mod_parent.' - '. $this->mod_padre;
                $titulo_lista=$this->mod_padre;
                $permiso= $this->permiso;

                $this->set(compact('inputMicro','titulo','styles','scripts','titulo_lista','id','permiso','optionList_obj','passport'));
                $this->set('_serialize', ['inputMicro']);

        } else{

              $this->Flash->error(__('Operación denegada.'));
              return $this->redirect(['action' => 'index','controller'=>'BankMicro']);
        }
    }

    /**
     * View method
     *
     * @param string|null $id Input Micro id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null,$child=null)
    {

         $bankMicro = $this->BankMicro->find()->select('passport_id')->where(['BankMicro.status '=>'1','BankMicro.id'=>$id])->first();

         $passport = $this->Passport->find()->where(['id '=>$bankMicro->passport_id])->first();
         $validar=$this->permiso['role_id']==1?true:$this->permiso['station_id']==$passport['station_current_id'];


        if($bankMicro ==NULL || !$this->permiso['view']){

                $this->Flash->error(__('Operación denegada.'));
                return $this->redirect(['action' => 'index','controller'=>'BankMicro']);

        }else{

            $inputMicro = $this->InputMicro->find()
                                             ->where(['InputMicro.status !=' => '0','InputMicro.id'=>$child,'InputMicro.bank_micro_id'=>$id
                                                ])->first();
             $passMicro_obj = $this->PassportMicro->find()->select('sampstat')->where(['passport_id'=>$bankMicro->passport_id])->first();
             $optionList_obj = $this->OptionList->find()->select('name')->where(['id'=>$passMicro_obj->sampstat])->first();

            if($inputMicro==NULL){

                $this->Flash->error(__('Operación denegada.'));
                return $this->redirect(['action' => 'index',$id]);
            }

            $titulo = $this->mod_padre;
            $parent = $this->mod_parent;
            $permiso= $this->permiso;
            $this->set(compact('inputMicro','titulo','permiso','id','optionList_obj','child','validar'));
            $this->set('_serialize', ['inputMicro']);
        }

    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id=null)
    {
        $bankMicro_obj = $this->BankMicro->find()->select('passport_id')->where(['BankMicro.status '=>'1','BankMicro.id'=>$id])->first();

        if($bankMicro_obj!=NULL && $this->permiso['add']){
            $modulo= $this->mod_padre;
            $scripts = ['assets/js/fileinput/fileinput.min','assets/packages/jqueryvalidation/dist/jquery.validate'];
            $inputMicro = $this->InputMicro->newEntity();
            $inputMicro->bank_dna_id=$id;

            $passMicro_obj = $this->PassportMicro->find()->select('sampstat')->where(['passport_id'=>$bankMicro_obj->passport_id])->first();
            $optionList_obj = $this->OptionList->find()->select('name')->where(['id'=>$passMicro_obj->sampstat])->first();

          if ($this->request->is('post')) {
              $data=$this->request->getData();
              $data['status']=1;
               try{
                      $data['bank_micro_id']= $id;
                      $data['enterdate'] = ($data['fecha_entrada'] == '' || $data['fecha_entrada'] == NULL) ? NULL : date('Y-m-d', strtotime($data['fecha_entrada']));

                      $inputMicro = $this->InputMicro->patchEntity($inputMicro,$data);
                      if ($this->InputMicro->save($inputMicro)) {

                          $list_module = explode('/', $this->request->params['_matchedRoute']);
                          $user_id    = $this->Auth->User('id');
                          $module     = $list_module[(count($list_module)-4)];
                          $action     = $list_module[(count($list_module)-2)].'/'.$list_module[(count($list_module)-1)];
                          $station_id = $inputMicro->id;
                          $recurso_id = '3';

                          $this->Functions->saveLogWeb($module, $station_id, $action, $user_id, $recurso_id);
                          $this->Flash->success(__('La Entrada de Material fue creado satisfactoriamente.'));

                          return $this->redirect(['action' => 'index',$inputMicro->bank_micro_id]);
                      }
                      $this->Flash->error(__('Hubo inconvenientes al crear la Entrada de Material. Por favor, Otra vez intente.'));
              } catch (\Exception $e) {

                      $this->Flash->error(__('Hubo inconvenientes al crear la Entrada de Material. Por favor, Otra vez intente.'));
                      return $this->redirect(['action' => 'index',$inputMicro->bank_micro_id]);
              }
          }
           $lista_deposito= $this->OptionList->find('list', ['keyField' => 'id', 'valueField' => 'name'])->where(['parent_id' => 448, 'status' => 1, 'OR' => [['resource_id' => 4]] ]);


           $lista_estado= $this->OptionList->find('list', ['keyField' => 'id', 'valueField' => 'name'])->where(['parent_id' => 554, 'status' => 1, 'OR' => [['resource_id' => 3]] ]);

          $this->set(compact('scripts','inputMicro','modulo','id','lista_deposito','lista_estado','optionList_obj'));
          $this->set('_serialize', ['inputMicro']);

        }else {

                 $this->Flash->error(__('Operación denegada.'));
                 return $this->redirect(['action' => 'index','controller'=>'BankMicro']);
        }
    }


    public function edit($id = null,$child=null)
    {
         $bankMicro_obj = $this->BankMicro->find()->select('passport_id')->where(['BankMicro.status '=>'1','BankMicro.id'=>$id])->first();

         $passport = $this->Passport->find()->where(['id '=>$bankMicro_obj->passport_id])->first();
         $validar=$this->permiso['role_id']==1?true:$this->permiso['station_id']==$passport['station_current_id'];

        if($bankMicro_obj!=NULL && $this->permiso['edit'] /*&& $validar*/){

            $inputMicro = $this->InputMicro->find()
                                         ->where(['InputMicro.status !=' => '0','InputMicro.id'=>$child,'InputMicro.bank_micro_id'=>$id
                                            ])->first();
            $passMicro_obj = $this->PassportMicro->find()->select('sampstat')->where(['passport_id'=>$bankMicro_obj->passport_id])->first();
            $optionList_obj = $this->OptionList->find()->select('name')->where(['id'=>$passMicro_obj->sampstat])->first();

            if($inputMicro==NULL){

                        $this->Flash->error(__('Operación denegada.'));
                        return $this->redirect(['action' => 'index',$id]);
            } else {

                $modulo=$this->mod_padre ;
                $scripts = ['assets/js/fileinput/fileinput.min','assets/packages/jqueryvalidation/dist/jquery.validate'];

                if ($this->request->is(['patch', 'post', 'put'])) {
                $data=$this->request->getData();
                 try{
                        $data['enterdate'] = ($data['fecha_entrada'] == '' || $data['fecha_entrada'] == NULL) ? NULL : date('Y-m-d', strtotime($data['fecha_entrada']));

                        $inputMicro = $this->InputMicro->patchEntity($inputMicro,$data);

                        if ($this->InputMicro->save($inputMicro)) {

                            $list_module = explode('/', $this->request->params['_matchedRoute']);

                            $user_id    = $this->Auth->User('id');
                            $module     = $list_module[(count($list_module)-5)];
                            $action     = $list_module[(count($list_module)-3)].'/'.$list_module[(count($list_module)-2)];
                            $input_id = $inputMicro->id;
                            $recurso_id = '3';

                            $this->Functions->saveLogWeb($module, $input_id, $action, $user_id, $recurso_id);

                            $this->Flash->success(__('La Entrada de Material fue actualizado satisfactoriamente.'));

                            return $this->redirect(['action' => 'index',$inputMicro->bank_micro_id]);
                        }

                        $this->Flash->error(__('Hubo inconvenientes al actualizar la Entrada de Material. Por favor, Otra vez intente.'));

                    } catch (\Exception $e) {

                        $this->Flash->error(__('Hubo inconvenientes al actualizar la Entrada de Material. Por favor, Otra vez intente.'));
                        return $this->redirect(['action' => 'index',$inputMicro->bank_invitro_id]);
                    }
                }
              }

        $lista_deposito= $this->OptionList->find('list', ['keyField' => 'id', 'valueField' => 'name'])->where(['parent_id' => 448, 'status' => 1, 'OR' => [['resource_id' => 4]] ]);

        $lista_estado= $this->OptionList->find('list', ['keyField' => 'id', 'valueField' => 'name'])->where(['parent_id' => 554, 'status' => 1, 'OR' => [['resource_id' => 3]] ]);

        $inputMicro->enterdate=($inputMicro->enterdate == NULL) ? NULL : date('d-m-Y', strtotime($inputMicro->enterdate));

        $this->set(compact('scripts','inputMicro','modulo','lista_deposito','lista_estado','id','optionList_obj','child'));
        $this->set('_serialize', ['inputMicro']);

        } else {
                $this->Flash->error(__('Operación denegada.'));
                return $this->redirect(['action' => 'index','controller' => 'BankMicro']);
        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Input Micro id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null,$child=null)
    {

       $bankMicro_count = $this->BankMicro->find()->where(['BankMicro.status '=>'1','BankMicro.id'=>$id])->first();
       $passport = $this->Passport->find()->where(['id '=>$bankMicro_count->passport_id])->first();
       $validar=$this->permiso['role_id']==1?true:$this->permiso['station_id']==$passport['station_current_id'];

        if($bankMicro_count!=NULL && $this->permiso['delete'] /*&& $validar*/){

            $this->request->is(['post', 'delete']);

            $inputMicro = $this->InputMicro->find()
                                         ->where(['InputMicro.status !=' => '0','InputMicro.id'=>$child,'InputMicro.bank_micro_id'=>$id
                                            ])->first();

            if($inputMicro==NULL){

                $this->Flash->error(__('Operación denegada.'));
                return $this->redirect(['action' => 'index',$id]);
            }else{

                $inputMicro['status'] = 0;

                if ($this->InputMicro->save($inputMicro)) {

                    $list_module = explode('/', $this->request->params['_matchedRoute']);

                    $user_id    = $this->Auth->User('id');
                    $module     = $list_module[(count($list_module)-5)];
                    $action     = $list_module[(count($list_module)-3)].'/'.$list_module[(count($list_module)-2)];

                    //$station_id = $inputInvitro->id;
                    $recurso_id = '3';


                    $this->Functions->saveLogWeb($module, $child, $action, $user_id, $recurso_id);

                    $this->Flash->success(__('La Entrada Material fue eliminado satisfactoriamente.'));
                } else {
                     $this->Flash->error(__('Hubo inconvenientes al eliminar la Entrada Material . Por favor, Otra vez intente.'));
                }

               return $this->redirect(['action' => 'index', $inputMicro->bank_micro_id]);
            }

        }else{

                $this->Flash->error(__('Operación denegada.'));
                return $this->redirect(['action' => 'index','controller' => 'BankMicro']);
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
