<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * TbRazas Controller
 *
 * @property \App\Model\Table\TbRazasTable $TbRazas
 *
 * @method \App\Model\Entity\TbRaza[] paginate($object = null, array $settings = [])
 */
class TbRazasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $tbRazas = $this->paginate($this->TbRazas);

        $this->set(compact('tbRazas'));
        $this->set('_serialize', ['tbRazas']);
    }

    /**
     * View method
     *
     * @param string|null $id Tb Raza id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tbRaza = $this->TbRazas->get($id, [
            'contain' => ['TbDiversidadCrianzas']
        ]);

        $this->set('tbRaza', $tbRaza);
        $this->set('_serialize', ['tbRaza']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tbRaza = $this->TbRazas->newEntity();
        if ($this->request->is('post')) {
            $tbRaza = $this->TbRazas->patchEntity($tbRaza, $this->request->getData());
            if ($this->TbRazas->save($tbRaza)) {
                $this->Flash->success(__('The tb raza has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tb raza could not be saved. Please, try again.'));
        }
        $this->set(compact('tbRaza'));
        $this->set('_serialize', ['tbRaza']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tb Raza id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tbRaza = $this->TbRazas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tbRaza = $this->TbRazas->patchEntity($tbRaza, $this->request->getData());
            if ($this->TbRazas->save($tbRaza)) {
                $this->Flash->success(__('The tb raza has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tb raza could not be saved. Please, try again.'));
        }
        $this->set(compact('tbRaza'));
        $this->set('_serialize', ['tbRaza']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tb Raza id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tbRaza = $this->TbRazas->get($id);
        if ($this->TbRazas->delete($tbRaza)) {
            $this->Flash->success(__('The tb raza has been deleted.'));
        } else {
            $this->Flash->error(__('The tb raza could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
