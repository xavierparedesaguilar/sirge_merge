<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * TbCrianzas Controller
 *
 * @property \App\Model\Table\TbCrianzasTable $TbCrianzas
 *
 * @method \App\Model\Entity\TbCrianza[] paginate($object = null, array $settings = [])
 */
class TbCrianzasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $tbCrianzas = $this->paginate($this->TbCrianzas);

        $this->set(compact('tbCrianzas'));
        $this->set('_serialize', ['tbCrianzas']);
    }

    /**
     * View method
     *
     * @param string|null $id Tb Crianza id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tbCrianza = $this->TbCrianzas->get($id, [
            'contain' => ['TbDiversidadCrianzas']
        ]);

        $this->set('tbCrianza', $tbCrianza);
        $this->set('_serialize', ['tbCrianza']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tbCrianza = $this->TbCrianzas->newEntity();
        if ($this->request->is('post')) {
            $tbCrianza = $this->TbCrianzas->patchEntity($tbCrianza, $this->request->getData());
            if ($this->TbCrianzas->save($tbCrianza)) {
                $this->Flash->success(__('The tb crianza has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tb crianza could not be saved. Please, try again.'));
        }
        $this->set(compact('tbCrianza'));
        $this->set('_serialize', ['tbCrianza']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tb Crianza id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tbCrianza = $this->TbCrianzas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tbCrianza = $this->TbCrianzas->patchEntity($tbCrianza, $this->request->getData());
            if ($this->TbCrianzas->save($tbCrianza)) {
                $this->Flash->success(__('The tb crianza has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tb crianza could not be saved. Please, try again.'));
        }
        $this->set(compact('tbCrianza'));
        $this->set('_serialize', ['tbCrianza']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tb Crianza id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tbCrianza = $this->TbCrianzas->get($id);
        if ($this->TbCrianzas->delete($tbCrianza)) {
            $this->Flash->success(__('The tb crianza has been deleted.'));
        } else {
            $this->Flash->error(__('The tb crianza could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
