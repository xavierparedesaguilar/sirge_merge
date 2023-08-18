<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * TbNombresComunes Controller
 *
 * @property \App\Model\Table\TbNombresComunesTable $TbNombresComunes
 *
 * @method \App\Model\Entity\TbNombresComune[] paginate($object = null, array $settings = [])
 */
class TbNombresComunesController extends AppController
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
        $tbNombresComunes = $this->paginate($this->TbNombresComunes);

        $this->set(compact('tbNombresComunes'));
        $this->set('_serialize', ['tbNombresComunes']);
    }

    /**
     * View method
     *
     * @param string|null $id Tb Nombres Comune id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tbNombresComune = $this->TbNombresComunes->get($id, [
            'contain' => ['TbTipoDiversidad']
        ]);

        $this->set('tbNombresComune', $tbNombresComune);
        $this->set('_serialize', ['tbNombresComune']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tbNombresComune = $this->TbNombresComunes->newEntity();
        if ($this->request->is('post')) {
            $tbNombresComune = $this->TbNombresComunes->patchEntity($tbNombresComune, $this->request->getData());
            if ($this->TbNombresComunes->save($tbNombresComune)) {
                $this->Flash->success(__('The tb nombres comune has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tb nombres comune could not be saved. Please, try again.'));
        }
        $tbTipoDiversidad = $this->TbNombresComunes->TbTipoDiversidad->find('list', ['limit' => 200]);
        $this->set(compact('tbNombresComune', 'tbTipoDiversidad'));
        $this->set('_serialize', ['tbNombresComune']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tb Nombres Comune id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tbNombresComune = $this->TbNombresComunes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tbNombresComune = $this->TbNombresComunes->patchEntity($tbNombresComune, $this->request->getData());
            if ($this->TbNombresComunes->save($tbNombresComune)) {
                $this->Flash->success(__('The tb nombres comune has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tb nombres comune could not be saved. Please, try again.'));
        }
        $tbTipoDiversidad = $this->TbNombresComunes->TbTipoDiversidad->find('list', ['limit' => 200]);
        $this->set(compact('tbNombresComune', 'tbTipoDiversidad'));
        $this->set('_serialize', ['tbNombresComune']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tb Nombres Comune id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tbNombresComune = $this->TbNombresComunes->get($id);
        if ($this->TbNombresComunes->delete($tbNombresComune)) {
            $this->Flash->success(__('The tb nombres comune has been deleted.'));
        } else {
            $this->Flash->error(__('The tb nombres comune could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
