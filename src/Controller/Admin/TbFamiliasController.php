<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * TbFamilias Controller
 *
 * @property \App\Model\Table\TbFamiliasTable $TbFamilias
 *
 * @method \App\Model\Entity\TbFamilia[] paginate($object = null, array $settings = [])
 */
class TbFamiliasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['TbTipoDiversidad']
        ];
        $tbFamilias = $this->paginate($this->TbFamilias);

        $this->set(compact('tbFamilias'));
        $this->set('_serialize', ['tbFamilias']);
    }

    /**
     * View method
     *
     * @param string|null $id Tb Familia id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tbFamilia = $this->TbFamilias->get($id, [
            'contain' => ['TbTipoDiversidad', 'TbNombresCientificos']
        ]);

        $this->set('tbFamilia', $tbFamilia);
        $this->set('_serialize', ['tbFamilia']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tbFamilia = $this->TbFamilias->newEntity();
        if ($this->request->is('post')) {
            $tbFamilia = $this->TbFamilias->patchEntity($tbFamilia, $this->request->getData());
            if ($this->TbFamilias->save($tbFamilia)) {
                $this->Flash->success(__('The tb familia has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tb familia could not be saved. Please, try again.'));
        }
        $tbTipoDiversidad = $this->TbFamilias->TbTipoDiversidad->find('list', ['limit' => 200]);
        $this->set(compact('tbFamilia', 'tbTipoDiversidad'));
        $this->set('_serialize', ['tbFamilia']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tb Familia id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tbFamilia = $this->TbFamilias->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tbFamilia = $this->TbFamilias->patchEntity($tbFamilia, $this->request->getData());
            if ($this->TbFamilias->save($tbFamilia)) {
                $this->Flash->success(__('The tb familia has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tb familia could not be saved. Please, try again.'));
        }
        $tbTipoDiversidad = $this->TbFamilias->TbTipoDiversidad->find('list', ['limit' => 200]);
        $this->set(compact('tbFamilia', 'tbTipoDiversidad'));
        $this->set('_serialize', ['tbFamilia']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tb Familia id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tbFamilia = $this->TbFamilias->get($id);
        if ($this->TbFamilias->delete($tbFamilia)) {
            $this->Flash->success(__('The tb familia has been deleted.'));
        } else {
            $this->Flash->error(__('The tb familia could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
