<?php

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * EvaluationField Controller
 *
 * @property \App\Model\Table\EvaluationFieldTable $EvaluationField
 */
class EvaluationFieldController extends AppController
{

        public function initialize()
    {
        parent::initialize(); // TODO: Change the autogenerated stub
        $this->loadComponent('Csrf');
        $this->mod_parent = "Banco Campo ";
        $this->mod_padre = "Evaluación del Experimento";
        $this->loadModel('BankField');
        $this->loadModel('OptionList');

        $this->loadModel('Module');
        $this->module = $this->Module->find()->where(['controller' => 'BankField'])->first();
        if(!empty( $this->module ))
          $this->permiso=$this->Functions->validarModulo($this->module->id);
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index($id=null)
    {
        $bankField_count = $this->BankField->find()->where(['BankField.status '=>'1','BankField.id'=>$id])->count();

        if($bankField_count >0 && $this->permiso['index']){

            $styles  = ['assets/css/dataTables.bootstrap', 'assets/css/select.bootstrap.min'];
            $scripts = ['assets/js/select2/select2', 'assets/js/datatable/jquery.dataTables.min',
                        'assets/js/datatable/dataTables.bootstrap.min',
                        'assets/js/datatable/dataTables.select.min'];

            $evaluationField = $this->EvaluationField->find()->where(['EvaluationField.status !=' => '0', 'bank_field_id' => $id]);

            $titulo=$this->mod_parent.' - '. $this->mod_padre;
            $titulo_lista=$this->mod_padre;
            $permiso=$this->permiso;

            $this->set(compact('evaluationField','titulo','styles','scripts','titulo_lista','id','permiso'));
            $this->set('_serialize', ['evaluationField']);


        }else{

              $this->Flash->error(__('Operación denegada.'));
              return $this->redirect(['action' => 'index','controller'=>'BankField']);

        }
    }

    /**
     * View method
     *
     * @param string|null $id Evaluation Field id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null,$child = null)

    {
         $bankField_count = $this->BankField->find()->where(['BankField.status '=>'1','BankField.id'=>$id])->count();

        if($bankField_count ==0 || !$this->permiso['view']){

            $this->Flash->error(__('Operación denegada.'));
            return $this->redirect(['action' => 'index','controller'=>'BankField']);

        } else {

             $evaluationField = $this->EvaluationField->find()->where(['EvaluationField.status !=' => '0','EvaluationField.id'=>$child,'EvaluationField.bank_field_id'=>$id])->first();

            if($evaluationField==NULL){

                $this->Flash->error(__('Operación denegada.'));
                return $this->redirect(['action' => 'index',$id]);
            }

            $titulo = $this->mod_padre;
            $parent = $this->mod_parent;
            $permiso=$this->permiso;

            $this->set(compact('evaluationField','titulo','permiso','id','child'));
            $this->set('_serialize', ['evaluationField']);

        }
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id=null)
    {

        $bankField_count = $this->BankField->find()->where(['BankField.status '=>'1','BankField.id'=>$id])->count();

        if($bankField_count>0 && $this->permiso['add']){

            $modulo= $this->mod_padre ;
            $evaluationField = $this->EvaluationField->newEntity();
            $scripts = ['assets/js/fileinput/fileinput.min','assets/packages/jqueryvalidation/dist/jquery.validate'];

            $evaluationField->bank_field_id=$id;

            if ($this->request->is('post')) {
                $data=$this->request->getData();
                $data['status']=1;
                 try{
                        $data['bank_field_id']= $id;
                        $data['evaldate'] = ($data['fecha_evaluacion'] == '' || $data['fecha_evaluacion'] == NULL) ? NULL : date('Y-m-d', strtotime($data['fecha_evaluacion']));

                        $evaluationField = $this->EvaluationField->patchEntity($evaluationField,$data);
                        if ($this->EvaluationField->save($evaluationField)) {

                            $list_module = explode('/', $this->request->params['_matchedRoute']);

                            $user_id    = $this->Auth->User('id');
                            $module     = $list_module[(count($list_module)-4)];
                            $action     = $list_module[(count($list_module)-2)].'/'.$list_module[(count($list_module)-1)];
                            $station_id = $evaluationField->id;
                            $recurso_id = '1';

                            $this->Functions->saveLogWeb($module, $station_id, $action, $user_id, $recurso_id);

                            $this->Flash->success(__('La Evaluación del Experimento fue creado satisfactoriamente.'));

                            return $this->redirect(['action' => 'index',$evaluationField->bank_field_id]);
                        }
                        $this->Flash->error(__('Hubo inconvenientes al crear la Evaluación del Experimento. Por favor, Otra vez intente.'));
                } catch (\Exception $e) {

                        $this->Flash->error(__('Hubo inconvenientes al crear la Evaluación del Experimento. Por favor, Otra vez intente.'));
                        return $this->redirect(['action' => 'index']);
                }
            }

             $lista_producto= $this->OptionList->find('list', ['keyField' => 'id', 'valueField' => 'name'])->where(['parent_id' => 412, 'status' => 1, 'OR' => [['resource_id' => 1]] ]);



            $this->set(compact('evaluationField','modulo','scripts','lista_producto','id'));
            $this->set('_serialize', ['evaluationField']);

        } else {

                 $this->Flash->error(__('Operación denegada.'));
                 return $this->redirect(['action' => 'index','controller'=>'BankField']);
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Evaluation Field id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null,$child=null)
    {
        $bankField_count = $this->BankField->find()->where(['BankField.status '=>'1','BankField.id'=>$id])->count();

        if($bankField_count>0 && $this->permiso['edit']){

            $evaluationField = $this->EvaluationField->find()
                                                 ->where(['EvaluationField.status !=' => '0','EvaluationField.id'=>$child,'EvaluationField.bank_field_id'=>$id
                                                    ])->first();

            if($evaluationField==NULL){

                $this->Flash->error(__('Operación denegada.'));
                return $this->redirect(['action' => 'index',$id]);

            }   else {

                $scripts = ['assets/js/fileinput/fileinput.min','assets/packages/jqueryvalidation/dist/jquery.validate'];

                $modulo=$this->mod_padre ;

                if ($this->request->is(['patch', 'post', 'put'])) {
                    $data=$this->request->getData();
                     try{
                            $data['evaldate'] = ($data['fecha_evaluacion'] == '' || $data['fecha_evaluacion'] == NULL) ? NULL : date('Y-m-d', strtotime($data['fecha_evaluacion']));
                            $evaluationField = $this->EvaluationField->patchEntity($evaluationField,$data);

                            if ($this->EvaluationField->save($evaluationField)) {

                                $list_module = explode('/', $this->request->params['_matchedRoute']);

                                $user_id    = $this->Auth->User('id');
                                $module     = $list_module[(count($list_module)-5)];
                                $action     = $list_module[(count($list_module)-3)].'/'.$list_module[(count($list_module)-2)];
                                $station_id = $evaluationField->id;
                                $recurso_id = '1';

                                $this->Functions->saveLogWeb($module, $station_id, $action, $user_id, $recurso_id);

                                $this->Flash->success(__('La Evaluación del Experimento fue actualizado satisfactoriamente.'));

                                return $this->redirect(['action' => 'index',$evaluationField->bank_field_id]);
                            }
                            $this->Flash->error(__('Hubo inconvenientes al actualizar la Evaluación del Experimento. Por favor, Otra vez intente.'));

                     } catch (\Exception $e) {

                            $this->Flash->error(__('Hubo inconvenientes al actualizar la Evaluación del Experimento. Por favor, Otra vez intente.'));
                            return $this->redirect(['action' => 'index']);
                    }
                }

                $evaluationField->evaldate=($evaluationField->evaldate == NULL) ? NULL : date('d-m-Y', strtotime($evaluationField->evaldate));
                $lista_producto= $this->OptionList->find('list', ['keyField' => 'id', 'valueField' => 'name'])->where(['parent_id' => 412, 'status' => 1, 'OR' => [['resource_id' => 1]] ]);

                $this->set(compact('evaluationField','scripts','modulo','lista_producto','id','child'));
                $this->set('_serialize', ['evaluationField']);

                }

        } else {

                     $this->Flash->error(__('Operación denegada.'));
                     return $this->redirect(['action' => 'index','controller'=>'BankField']);

        }
    }

    /**
     * Delete method
     *
     * @param string|null $id Evaluation Field id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null,$child=null)
    {
        $bankField_count = $this->BankField->find()->where(['BankField.status '=>'1','BankField.id'=>$id])->count();

        if($bankField_count>0 && $this->permiso['delete']){

            $this->request->is(['post', 'delete']);

            $evaluationField = $this->EvaluationField->get($child);

            $evaluationField = $this->EvaluationField->find()
                                         ->where(['EvaluationField.status !=' => '0','EvaluationField.id'=>$child,'EvaluationField.bank_field_id'=>$id
                                            ])->first();

            if($evaluationField==NULL){

                        $this->Flash->error(__('Operación denegada.'));
                        return $this->redirect(['action' => 'index',$id]);

            } else {

                $evaluationField['status'] = 0;
                if ($this->EvaluationField->save($evaluationField)) {

                    $list_module = explode('/', $this->request->params['_matchedRoute']);

                    $user_id    = $this->Auth->User('id');
                    $module     = $list_module[(count($list_module)-5)];
                    $action     = $list_module[(count($list_module)-3)].'/'.$list_module[(count($list_module)-2)];
                    $station_id = $evaluationField->id;
                    $recurso_id = '1';

                    $this->Functions->saveLogWeb($module, $station_id, $action, $user_id, $recurso_id);

                    $this->Flash->success(__('La Evaluación del Experimento fue eliminada satisfactoriamente.'));
                } else {
                      $this->Flash->error(__('Hubo inconvenientes al eliminar la Evaluación del Experimento . Por favor, Otra vez intente.'));
                }

               return $this->redirect(['action' => 'index', $evaluationField->bank_field_id]);

            }

        }  else {

                     $this->Flash->error(__('Operación denegada.'));
                     return $this->redirect(['action' => 'index','controller'=>'BankField']);

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
