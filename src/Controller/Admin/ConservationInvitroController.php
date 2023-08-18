<?php

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use App\View\Helper\FunctionsHelper;
use Cake\Datasource\loadModel;

/**
 * ConservationInvitro Controller
 *
 * @property \App\Model\Table\ConservationInvitroTable $ConservationInvitro
 */
class ConservationInvitroController extends AppController
{

    public function initialize()
    {
        parent::initialize(); // TODO: Change the autogenerated stub
        $this->loadComponent('Csrf');
        $this->mod_parent = "Banco Invitro ";
        $this->mod_padre = "Conservación Invitro";
        $this->loadModel('BankInvitro');
        $this->loadModel('OptionList');
        $this->loadModel('Passport');

        $this->loadModel('Module');
        $this->module = $this->Module->find()->where(['controller' => 'BankInvitro'])->first();
        if(!empty( $this->module ))
          $this->permiso=$this->Functions->validarModulo($this->module->id);
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index($id = null)
    {

            $bankInvitro_count = $this->BankInvitro->find()->where(['BankInvitro.status '=>'1','BankInvitro.id'=>$id])->first();
            $passport = $this->Passport->find()->where(['id '=>$bankInvitro_count->passport_id])->first();

            if($bankInvitro_count !=NULL && $this->permiso['index']){

                $styles  = ['assets/css/dataTables.bootstrap', 'assets/css/select.bootstrap.min'];
                $scripts = ['assets/js/select2/select2', 'assets/js/datatable/jquery.dataTables.min',
                            'assets/js/datatable/dataTables.bootstrap.min',
                            'assets/js/datatable/dataTables.select.min'];

                $conservationInvitro = $this->ConservationInvitro->find()->contain(['BankInvitro'])->where(['ConservationInvitro.status !=' => '0', 'bank_invitro_id' => $id])->order(['ConservationInvitro.id'=>'DESC']);

                //$titulo =$this->mod_parent.' - '.$this->mod_padre ;
                $titulo =$this->mod_parent;

                $titulo_lista=$this->mod_padre ;
                $permiso=$this->permiso;

                $this->set(compact('conservationInvitro','titulo','styles','scripts', 'id','titulo_lista','permiso','passport'));

                $this->set('_serialize', ['conservationInvitro']);

            } else{
                  $this->Flash->error(__('Operación denegada.'));
                  return $this->redirect(['action' => 'index','controller'=>'BankInvitro']);
            }


    }

    /**
     * View method
     *
     * @param string|null $id Conservation Invitro id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null, $child = null)
    {

        $bankInvitro_count = $this->BankInvitro->find()->where(['BankInvitro.status '=>'1','BankInvitro.id'=>$id])->first();
        $passport = $this->Passport->find()->where(['id '=>$bankInvitro_count->passport_id])->first();
        $validar=$this->permiso['role_id']==1?true:$this->permiso['station_id']==$passport['station_current_id'];

                if($bankInvitro_count ==NULL || !$this->permiso['view']){

                    $this->Flash->error(__('Operación denegada.'));
                    return $this->redirect(['action' => 'index','controller'=>'BankInvitro']);

                }else {

                    $conservationInvitro = $this->ConservationInvitro->find()
                                                 ->where(['ConservationInvitro.status !=' => '0','ConservationInvitro.id'=>$child,'ConservationInvitro.bank_invitro_id'=>$id
                                                    ])->first();

                     if($conservationInvitro==NULL){

                                $this->Flash->error(__('Operación denegada.'));
                                return $this->redirect(['action' => 'index',$id]);
                     }
                }

                $titulo = $this->mod_padre;
                $parent = $this->mod_parent;
                $permiso=$this->permiso;

                $this->set(compact('conservationInvitro', 'titulo','parent','permiso','id','child','validar'));
                $this->set('_serialize', ['conservationInvitro']);

    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {

        $bankInvitro_count = $this->BankInvitro->find()->where(['BankInvitro.status '=>'1','BankInvitro.id'=>$id])->count();

        if($bankInvitro_count>0 && $this->permiso['add']){

            $conservationInvitro = $this->ConservationInvitro->newEntity();
            $modulo=$this->mod_padre ;

            $scripts = ['assets/js/fileinput/fileinput.min','assets/packages/jqueryvalidation/dist/jquery.validate'];

            $conservationInvitro->bank_invitro_id=$id;

            if ($this->request->is('post')) {
                $data=$this->request->getData();
                $data['status']=1;

                try{
                    $data['bank_invitro_id']= $id;
                    $data['constime'] = ($data['fecha_conservacion'] == '' || $data['fecha_conservacion'] == NULL) ? NULL : date('Y-m-d', strtotime($data['fecha_conservacion']));

                    $conservationInvitro = $this->ConservationInvitro->patchEntity($conservationInvitro, $data);

                    if ($this->ConservationInvitro->save($conservationInvitro)) {

                        $list_module = explode('/', $this->request->params['_matchedRoute']);

                        $user_id    = $this->Auth->User('id');
                        $module     = $list_module[(count($list_module)-4)];
                        $action     = $list_module[(count($list_module)-2)].'/'.$list_module[(count($list_module)-1)];
                        $station_id = $conservationInvitro->id;
                        $recurso_id = '1';

                        $this->Functions->saveLogWeb($module, $station_id, $action, $user_id, $recurso_id);

                        $this->Flash->success(__('Resgistro de Datos de Conservación fue ingresado satisfactoriamente.'));

                        return $this->redirect(['action' => 'index', $conservationInvitro->bank_invitro_id]);
                    }
                   $this->Flash->error(__('Hubo inconvenientes al crear el Registro. Por favor, Otra vez intente.'));

                 } catch (\Exception $e) {

                        $this->Flash->error(__('Hubo inconvenientes al crear el Registro. Por favor, Otra vez intente.'));
                      return $this->redirect(['action' => 'index', $conservationInvitro->bank_invitro_id]);
                }
            }

            $bankInvitro = $this->BankInvitro->find()->where(['id' => $id])->first();

            $this->set(compact('conservationInvitro','bankInvitro','modulo','scripts','id'));
            $this->set('_serialize', ['conservationInvitro']);

        }   else {

                 $this->Flash->error(__('Operación denegada.'));
                 return $this->redirect(['action' => 'index','controller'=>'BankInvitro']);
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Conservation Invitro id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null, $child = null)
    {

        $bankInvitro_count = $this->BankInvitro->find()->where(['BankInvitro.status '=>'1','BankInvitro.id'=>$id])->first();
        $passport = $this->Passport->find()->where(['id '=>$bankInvitro_count->passport_id])->first();
        $validar=$this->permiso['role_id']==1?true:$this->permiso['station_id']==$passport['station_current_id'];

        if($bankInvitro_count!=NULL /*&& $validar*/ ){

             $conservationInvitro = $this->ConservationInvitro->find()
                                         ->where(['ConservationInvitro.status !=' => '0','ConservationInvitro.id'=>$child,'ConservationInvitro.bank_invitro_id'=>$id
                                            ])->first();

             if($conservationInvitro==NULL){

                        $this->Flash->error(__('Operación denegada.'));
                        return $this->redirect(['action' => 'index',$id]);
             }else{

                $scripts = ['assets/js/fileinput/fileinput.min','assets/packages/jqueryvalidation/dist/jquery.validate'];

                $modulo=$this->mod_padre ;

                if ($this->request->is(['patch', 'post', 'put'])) {

                    try{
                         $data=$this->request->getData();
                         $data['constime'] = ($data['fecha_conservacion'] == '' || $data['fecha_conservacion'] == NULL) ? NULL : date('Y-m-d', strtotime($data['fecha_conservacion']));
                         $conservationInvitro = $this->ConservationInvitro->patchEntity($conservationInvitro,$data);

                        if ($this->ConservationInvitro->save($conservationInvitro)) {

                            $list_module = explode('/', $this->request->params['_matchedRoute']);

                            $user_id    = $this->Auth->User('id');
                            $module     = $list_module[(count($list_module)-5)];
                            $action     = $list_module[(count($list_module)-3)].'/'.$list_module[(count($list_module)-2)];
                            $station_id = $conservationInvitro->id;
                            $recurso_id = '1';

                            $this->Functions->saveLogWeb($module, $station_id, $action, $user_id, $recurso_id);

                            $this->Flash->success(__('El Registro fue actualizado satisfactoriamente.'));
                            //$this->Flash->info(sprintf('<b>%s</b> %s', h(false), h('holaa')), ['escape' => false]);
                           return $this->redirect(['action' => 'index', $conservationInvitro->bank_invitro_id]);
                        }
                        $this->Flash->error(__('Hubo inconvenientes al actualizar el Registro. Por favor, Otra vez intente.'));
                       }
                    catch (\Exception $e) {

                        $this->Flash->error(__('Hubo inconvenientes al actualizar el Regsitro. Por favor, Otra vez intente.'));
                        return $this->redirect(['action' => 'index', $conservationInvitro->bank_invitro_id]);
                    }
                }

                $conservationInvitro->constime = ($conservationInvitro->constime == NULL) ? NULL : date('d-m-Y', strtotime($conservationInvitro->constime));
                $bankInvitro = $this->BankInvitro->find()->where(['id' => $id])->first();

                $this->set(compact('conservationInvitro','bankInvitro' ,'modulo','scripts','id','child'));
                $this->set('_serialize', ['conservationInvitro']);
            }
       }else {
                 $this->Flash->error(__('Operación denegada.'));
                 return $this->redirect(['action' => 'index','controller'=>'BankInvitro']);
        }



    }

    /**
     * Delete method
     *
     * @param string|null $id Conservation Invitro id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null,$child = null)
    {

        $bankInvitro_count = $this->BankInvitro->find()->where(['BankInvitro.status '=>'1','BankInvitro.id'=>$id])->first();
        $passport = $this->Passport->find()->where(['id '=>$bankInvitro_count->passport_id])->first();
        $validar=$this->permiso['role_id']==1?true:$this->permiso['station_id']==$passport['station_current_id'];

         if($bankInvitro_count!=NULL /*&& $validar*/ ){

            $this->request->is(['post', 'delete']);

            $conservationInvitro = $this->ConservationInvitro->find()
                                         ->where(['ConservationInvitro.status !=' => '0','ConservationInvitro.id'=>$child,'ConservationInvitro.bank_invitro_id'=>$id
                                            ])->first();

            if($conservationInvitro==NULL){

                        $this->Flash->error(__('Operación denegada.'));
                        return $this->redirect(['action' => 'index',$id]);
            }else{

                $conservationInvitro['status'] = 0;

                if ($this->ConservationInvitro->save($conservationInvitro)) {

                    $list_module = explode('/', $this->request->params['_matchedRoute']);

                    $user_id    = $this->Auth->User('id');
                    $module     = $list_module[(count($list_module)-5)];
                    $action     = $list_module[(count($list_module)-3)].'/'.$list_module[(count($list_module)-2)];
                    $station_id = $conservationInvitro->id;
                    $recurso_id = '1';

                    $this->Functions->saveLogWeb($module, $station_id, $action, $user_id, $recurso_id);

                    $this->Flash->success(__('El Regsitro fue eliminado satisfactoriamente.'));

                }else {
                     $this->Flash->error(__('Hubo inconvenientes al eliminar el Registro. Por favor, Otra vez intente.'));
                }

                return $this->redirect(['action' => 'index', $conservationInvitro->bank_invitro_id]);
            }

        }else{

                $this->Flash->error(__('Operación denegada.'));
                return $this->redirect(['action' => 'index','controller'=>'BankInvitro']);

        }
    }

    public function exportartabla($id = null) {

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
