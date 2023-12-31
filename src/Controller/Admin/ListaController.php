<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;
use App\View\Helper\FunctionsHelper;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Controller\loadComponent;
use Cake\Datasource\loadModel;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
use Cake\Utility\Text;

class ListaController extends AppController
{

    public function initialize()
    {
        parent::initialize(); // TODO: Change the autogenerated stub
        $this->loadComponent('Csrf');
        $this->Functions = new FunctionsHelper(new \Cake\View\View());
        $this->mod_parent = "Administración base de datos";
        $this->mod_padre = "Lista";
        $this->loadModel('OptionList');
        $this->loadModel('Resource');
        $this->loadModel('CategoryOptionList');

        $this->loadModel('Module');
        $this->module = $this->Module->find()->where(['controller' => $this->name])->first();
        if(!empty($this->module))
          $this->permiso=$this->Functions->validarModulo($this->module->id);


    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */

    /******** Inicio Lista de Metodo para el primer nivel de Listas ********/
    public function index()
    {

        if($this->permiso['index']){

            $mod_padre = $this->mod_parent;
            $titulo = $this->mod_padre;
            $styles  = ['assets/css/dataTables.bootstrap', 'assets/css/select.bootstrap.min'];
            $scripts = ['assets/js/select2/select2', 'assets/js/datatable/jquery.dataTables.min',
                        'assets/js/datatable/dataTables.bootstrap.min',
                        'assets/js/datatable/dataTables.select.min',
                        'assets/packages/jqueryvalidation/dist/jquery.validate'];

            $listas = $this->OptionList->find()->where(['parent_id IS ' => NULL, 'child_id IS ' => NULL, 'status !=' => '0']);

            $temp_u = [];
            foreach ($listas as $key => $lista) {
                $temp_u[$key] = $lista;
                $temp_u[$key]['count'] = $this->OptionList->find()->where(['parent_id' => $lista->id])->count();
            }
            $listas = $temp_u;
            $permiso= $this->permiso;

            $this->set(compact('titulo', 'mod_padre', 'styles', 'scripts', 'listas','permiso'));
            $this->render('/Administracion/Lista/index');

        } else {

              $this->Flash->error(__('Operación denegada.'));
              return $this->redirect($this->Auth->redirectUrl());

       }
    }

    public function crear()
    {
        if($this->permiso['add']){

            if ($this->request->is(['post'])) {

                $json = [];
                $lista = $this->OptionList->newEntity();
                $data = $this->request->data;

                $data['name'] = $this->Functions->Mayu($data['name']);
                $data['slug'] = strtolower(Text::slug($data['name']));
                $data['resource_id'] = '4';
                $data['status'] = 1;

                $lista = $this->OptionList->patchEntity($lista, $data);

                if ($this->OptionList->save($lista)) {

                    $list_module = explode('/', $this->request->params['_matchedRoute']);

                    $user_id    = $this->Auth->User('id');
                    $module     = $list_module[(count($list_module)-2)];
                    $action     = $list_module[(count($list_module)-1)];
                    $station_id = $lista->id;
                    $recurso_id = '4';

                    $this->Functions->saveLogWeb($module, $station_id, $action, $user_id, $recurso_id);

                    $this->Flash->success(__('La nueva lista se creo satisfactoriamente.'));
                    return $this->redirect(['action' => 'index']);
                }

                $this->Flash->error(__('Hubo inconvenientes al crear la lista. Por favor, Otra vez.'));
                return $this->redirect($this->referer());

            } else {

                if ($this->request->is('ajax')) {

                    $recursos = $this->Resource->find('list', ['keyField' => 'id' , 'valueField' => 'name']);
                    $titulo = $this->mod_padre;
                    $this->set(compact('titulo', 'recursos'));
                    $this->render('/Administracion/Lista/crear');

                } else {

                    if ($this->request->is('get')) {
                        return $this->redirect('/administracion-base-datos/lista');
                    }
                }
            }

        } else {
                  $this->Flash->error(__('Operación denegada.'));
                  return $this->redirect(['action' => 'index']);
        }
    }

    public function editar()
    {

        if($this->permiso['edit']){

                $id = $this->request->id;
                $lista = $this->OptionList->find()->where(['id' => $id])->first();

                if ($this->request->is(['post', 'put'])) {

                    $data = $this->request->data;
                    $data['name'] = $this->Functions->Mayu($data['name']);
                    $lista = $this->OptionList->patchEntity($lista, $data);

                    if ($this->OptionList->save($lista)) {

                        $list_module = explode('/', $this->request->params['_matchedRoute']);

                        $user_id    = $this->Auth->User('id');
                        $module     = $list_module[(count($list_module)-3)];
                        $action     = $list_module[(count($list_module)-2)];
                        $station_id = $lista->id;
                        $recurso_id = '4';

                        $this->Functions->saveLogWeb($module, $station_id, $action, $user_id, $recurso_id);

                        $this->Flash->success(__('Se edito satisfactoriamente la lista.'));
                        return $this->redirect($this->referer());
                    }

                    $this->Flash->error(__('Hubo inconvenientes al editar la lista. Por favor, Intentelo otra vez.'));
                    return $this->redirect($this->referer());

                } else {
                    if ($this->request->is('ajax')) {

                        $titulo = $this->mod_padre;
                        $recursos = $this->Resource->find('list', ['keyField' => 'id' , 'valueField' => 'name']);

                        $this->set(compact('titulo', 'lista', 'recursos'));
                        $this->render('/Administracion/Lista/editar');
                    } else {
                        if ($this->request->is('get')) {
                            return $this->redirect('/administracion-base-datos/lista');
                        }
                    }
                }
        } else {

        $this->Flash->error(__('Operación denegada.'));
        return $this->redirect(['action' => 'index']);

        }
    }

    public function exportartablalista() {

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


    /******** Fin Lista de Metodo para el primer nivel de Listas ********/

    /******** Inicio Lista de Metodo para el segundo nivel de Listas ********/
    public function lista()
    {

        if($this->permiso['index']){

            $id = $this->request->id;

            $lista = $this->OptionList->find()->where(['id' => $id])->first();

            if($lista!=NULL){

                $mod_padre = $this->mod_parent;
                $mod_child = $this->mod_padre;
                $titulo = $lista->name;
                $titulo_recurso = $lista->resource_id;
                $listas = $this->OptionList->find()->where(['parent_id' => $id, 'status !=' => '0']);

                $styles  = ['assets/css/dataTables.bootstrap', 'assets/css/select.bootstrap.min'];
                $scripts = ['assets/js/select2/select2', 'assets/js/datatable/jquery.dataTables.min',
                            'assets/js/datatable/dataTables.bootstrap.min',
                            'assets/js/datatable/dataTables.select.min',
                            'assets/packages/jqueryvalidation/dist/jquery.validate'];

                $temp_u = [];
                foreach ($listas as $key => $lista) {
                    $temp_u[$key] = $lista;
                    $temp_u[$key]['count'] = $this->OptionList->find()->where(['child_id' => $lista->id])->count();
                }

                $listas = $temp_u;
                $permiso= $this->permiso;

                $this->set(compact('titulo','titulo_recurso', 'mod_padre', 'mod_child', 'styles', 'scripts', 'listas', 'id','permiso'));
                $this->render('/Administracion/Lista/lista');

             } else {

                    $this->Flash->error(__('Operación denegada.'));
                    return $this->redirect(['action' => 'index']);
            }

        } else {

            $this->Flash->error(__('Operación denegada.'));
            return $this->redirect(['action' => 'index']);
        }
    }

    public function listacrear()
    {
        if($this->permiso['add']){

                $id = $this->request->id;

                if ($this->request->is(['post'])) {

                    $lista = $this->OptionList->newEntity();
                    $data = $this->request->data;
                    $data['name'] = $this->Functions->Mayu($data['name']);
                    $data['slug'] = strtolower(Text::slug($data['name']));
                    $data['status'] = 1;
                    $lista = $this->OptionList->patchEntity($lista, $data);

                    if ($this->OptionList->save($lista)) {

                        $this->Flash->success(__('Se creo satisfactoriamente el registro para la lista.'));
                        return $this->redirect($this->referer());
                    }

                    $this->Flash->error(__('Hubo un inconveniente al tratar de hacer el registro. Por favor, Otra intentelo vez.'));

                } else {

                    if ($this->request->is('ajax')) {

                        $recursos = $this->Resource->find('list', ['keyField' => 'id' , 'valueField' => 'name']);
                        $lista = $this->OptionList->get($id);
                        $titulo = $lista->name;

                        $this->set(compact('titulo', 'id', 'recursos'));
                        $this->render('/Administracion/Lista/lista/crear');
                    } else {
                        if ($this->request->is('get')) {
                            return $this->redirect($this->referer());
                        }
                    }
                }

        } else {

        $this->Flash->error(__('Operación denegada.'));
        return $this->redirect(['action' => 'index']);

        }
    }

    public function listaeditar()
    {
        if($this->permiso['edit']){

            $id = $this->request->id;
            $child = $this->request->child;

            $padre = $this->OptionList->find()->where(['id' => $id])->first();

            if($padre!=NULL) {

                    $lista = $this->OptionList->find()->where(['id' => $child,'parent_id'=>$id   ])->first();

                    if($lista!=NULL){

                        if ($this->request->is(['post', 'put'])) {

                            $data = $this->request->data;
                            $data['name'] = $this->Functions->Mayu($data['name']);
                            $data['slug'] = strtolower(Text::slug($data['name']));
                            $lista = $this->OptionList->patchEntity($lista, $data);

                            if ($this->OptionList->save($lista)) {

                                $this->Flash->success(__('Se edito satisfactoriamente el registro de la lista ' . $padre->name));
                                return $this->redirect($this->referer());
                            }

                            $this->Flash->error(__('Hubo un inconveniente al editar registro de la lista ' . $padre->name . '. Por favor, Otra vez.'));
                            return $this->redirect($this->referer());

                        } else {
                            if ($this->request->is('ajax')) {

                                $titulo     = $padre->name;
                                $recursos   = $this->Resource->find('list', ['keyField' => 'id' , 'valueField' => 'name']);
                                $total_item = $this->OptionList->find()->where(['child_id' => $lista->id, 'status != ' => '0'])->count();

                                $this->set(compact('titulo', 'id', 'lista', 'recursos', 'total_item'));
                                $this->render('/Administracion/Lista/lista/editar');
                            } else {
                                if ($this->request->is('get')) {
                                    return $this->redirect($this->referer());
                                }
                            }
                        }

                    } else {

                    $this->Flash->error(__('Operación denegada.'));
                    return $this->redirect(['action' => 'index']);

                    }

            } else {

            $this->Flash->error(__('Operación denegada.'));
            return $this->redirect(['action' => 'index']);

            }

        } else {

        $this->Flash->error(__('Operación denegada.'));
        return $this->redirect(['action' => 'index']);

        }
    }

    public function listaeliminar()
    {
        $this->request->is(['post', 'delete']);
        $id    = $this->request->id;
        $child = $this->request->child;

        $lista = $this->OptionList->find()->where(['status !=' => '0', 'id' => $child, 'parent_id' => $id])->first();
        $lista['status'] = '0';

        if ($this->OptionList->save($lista)) {

            $list_module = explode('/', $this->request->params['_matchedRoute']);

            $user_id    = $this->Auth->User('id');
            $module     = $list_module[2];
            $action     = $list_module[3].'/'.$list_module[4].'/'.$list_module[6];
            $lista_id   = $lista->id;
            $recurso_id = '4';

            $this->Functions->saveLogWeb($module, $lista_id, $action, $user_id, $recurso_id);

            $this->Flash->success(__('Lista eliminado satisfactoriamente.'));
            return $this->redirect($this->referer());

        } else {

            $this->Flash->error(__('Hubo inconvenientes al eliminar la lista. Por favor, Otra vez intente.'));
            return $this->redirect($this->referer());
        }
    }

    public function exportartablainfo($id=null)
    {
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


    /******** Fin Lista de Metodo para el segundo nivel de Listas ********/

    /******** Inicio Lista de Metodo para el tercer nivel de Listas ********/
    public function listacategoria()
    {

        if($this->permiso['index']){

            $id = $this->request->id;
            $child = $this->request->child;

            $lista = $this->OptionList->find()->where(['id' => $id])->first();

            if($lista!=NULL){

                $listachild = $this->OptionList->find()->where(['id' => $child,'parent_id'=>$id])->first();

                if($listachild!=NULL){

                    $mod_padre = $this->mod_parent;
                    $mod_child = $this->mod_padre;
                    $titulo = $this->Functions->letterAccent($listachild->name);
                    $categorias = $this->OptionList->find()->where(['child_id' => $child, 'status !=' => '0']);

                    $styles  = ['assets/css/dataTables.bootstrap', 'assets/css/select.bootstrap.min'];
                    $scripts = ['assets/js/select2/select2', 'assets/js/datatable/jquery.dataTables.min',
                                'assets/js/datatable/dataTables.bootstrap.min',
                                'assets/js/datatable/dataTables.select.min',
                                'assets/packages/jqueryvalidation/dist/jquery.validate'];
                    $permiso= $this->permiso;

                    $this->set(compact('titulo', 'mod_padre', 'mod_child', 'styles', 'scripts', 'categorias', 'id', 'lista','permiso'));
                    $this->render('/Administracion/Lista/categoria');

                } else {

                    $this->Flash->error(__('Operación denegada.'));
                    return $this->redirect(['action' => 'index']);

                }

            } else {

                $this->Flash->error(__('Operación denegada.'));
                return $this->redirect(['action' => 'index']);
            }

        } else {

            $this->Flash->error(__('Operación denegada.'));
            return $this->redirect(['action' => 'index']);
        }
    }

    public function listacategoriacrear()
    {
        if($this->permiso['add']){

            $id_child = $this->request->child;

            $lista = $this->OptionList->find()->where(['id' => $id_child])->first();

            if($lista!=NULL){

                if ($this->request->is(['post'])) {

                    $categoria = $this->OptionList->newEntity();
                    $data = $this->request->data;
                    $data['child_id'] = $lista->id;
                    $data['name'] = $this->Functions->Mayu($data['name']);
                    $data['slug'] = strtolower(Text::slug($data['name']));
                    $data['status'] = 1;
                    $categoria = $this->OptionList->patchEntity($categoria, $data);

                    if ($this->OptionList->save($categoria)) {

                        $this->Flash->success(__('Se creo satisfactoriamente el registro para la categoría ' . $lista->name));
                        return $this->redirect($this->referer());
                    }

                    $this->Flash->error(__('Hubo un inconveniente al tratar de hacer el registro. Por favor, Otra intentelo vez.'));
                    return $this->redirect($this->referer());

                } else {

                    if ($this->request->is('ajax')) {

                        $titulo = $lista->name;
                        $recursos = $this->Resource->find('list', ['keyField' => 'id' , 'valueField' => 'name']);

                        $this->set(compact('titulo', 'id_child', 'recursos'));
                        $this->render('/Administracion/Lista/categoria/crear');

                    } else {
                        if ($this->request->is('get')) {
                            return $this->redirect($this->referer());
                        }
                    }
                }

            } else {

                $this->Flash->error(__('Operación denegada.'));
                return $this->redirect(['action' => 'index']);
            }

        } else {

            $this->Flash->error(__('Operación denegada.'));
            return $this->redirect(['action' => 'index']);
        }

    }

    public function listacategoriaeditar()
    {
        if($this->permiso['edit']){

            $id_child = $this->request->child;
            $idcat = $this->request->idcat;

            $lista = $this->OptionList->find()->where(['id' => $id_child])->first();

            if($lista!=NULL){

                $categoria = $this->OptionList->find()->where(['id' => $idcat])->first();

                if($categoria!=NULL) {

                    if ($this->request->is(['post', 'put'])) {

                        $data = $this->request->data;
                        $data['name'] = $this->Functions->Mayu($data['name']);
                        $data['slug'] = strtolower(Text::slug($data['name']));
                        $categoria = $this->OptionList->patchEntity($categoria, $data);

                        if ($this->OptionList->save($categoria)) {

                            $this->Flash->success(__('Se edito satisfactoriamente el registro de la categoría ' . $lista->name));
                            return $this->redirect($this->referer());
                        }

                        $this->Flash->error(__('Hubo un inconveniente al editar registro de la categoría ' . $lista->name . '. Por favor, Intentelo otra vez.'));
                        return $this->redirect($this->referer());

                    } else {

                        if ($this->request->is('ajax')) {

                            $titulo = $lista->name;
                            $recursos = $this->Resource->find('list', ['keyField' => 'id' , 'valueField' => 'name']);
                            $this->set(compact('titulo', 'id_child', 'categoria','recursos'));
                            $this->render('/Administracion/Lista/categoria/editar');

                        } else {

                            if ($this->request->is('get')) {
                                return $this->redirect($this->referer());
                            }
                        }
                    }

                } else {

                    $this->Flash->error(__('Operación denegada.'));
                    return $this->redirect(['action' => 'index']);
                }

            } else {

                $this->Flash->error(__('Operación denegada.'));
                return $this->redirect(['action' => 'index']);
            }

        } else {

            $this->Flash->error(__('Operación denegada.'));
            return $this->redirect(['action' => 'index']);
        }
    }

    public function listacategoriaeliminar()
    {
        $this->request->is(['post', 'delete']);
        $id    = $this->request->id;
        $child = $this->request->child;
        $idcat = $this->request->idcat;

        $lista = $this->OptionList->find()->where(['status !=' => '0', 'id' => $idcat, 'parent_id' => $child])->first();
        $lista['status'] = '0';

        if ($this->OptionList->save($lista)) {

            $list_module = explode('/', $this->request->params['_matchedRoute']);

            $user_id    = $this->Auth->User('id');
            $module     = $list_module[2];
            $action     = $list_module[3].'/'.$list_module[4].'/'.$list_module[6].'/'.$list_module[8];
            $lista_id   = $lista->id;
            $recurso_id = '4';

            $this->Functions->saveLogWeb($module, $lista_id, $action, $user_id, $recurso_id);

            $this->Flash->success(__('Categoría eliminado satisfactoriamente.'));
            return $this->redirect($this->referer());

        } else {

            $this->Flash->error(__('Hubo inconvenientes al eliminar la categoría. Por favor, Otra vez intente.'));
            return $this->redirect($this->referer());
        }
    }

    public function exportartablacategoria() {

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

    /******** Fin Lista de Metodo para el tercer nivel de Listas ********/

}
