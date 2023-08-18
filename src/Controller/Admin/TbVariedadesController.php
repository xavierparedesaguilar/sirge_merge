<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * TbVariedades Controller
 *
 * @property \App\Model\Table\TbVariedadesTable $TbVariedades
 *
 * @method \App\Model\Entity\TbVariedade[] paginate($object = null, array $settings = [])
 */
class TbVariedadesController extends AppController
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
        $tbVariedades = $this->paginate($this->TbVariedades);

        $this->set(compact('tbVariedades'));
        $this->set('_serialize', ['tbVariedades']);
    }

    /**
     * View method
     *
     * @param string|null $id Tb Variedade id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tbVariedade = $this->TbVariedades->get($id, [
            'contain' => ['TbTipoDiversidad']
        ]);

        $this->set('tbVariedade', $tbVariedade);
        $this->set('_serialize', ['tbVariedade']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tbVariedade = $this->TbVariedades->newEntity();
        if ($this->request->is('post')) {
            $tbVariedade = $this->TbVariedades->patchEntity($tbVariedade, $this->request->getData());
            if ($this->TbVariedades->save($tbVariedade)) {
                $this->Flash->success(__('The tb variedade has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tb variedade could not be saved. Please, try again.'));
        }
        $tbTipoDiversidad = $this->TbVariedades->TbTipoDiversidad->find('list', ['limit' => 200]);
        $this->set(compact('tbVariedade', 'tbTipoDiversidad'));
        $this->set('_serialize', ['tbVariedade']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tb Variedade id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tbVariedade = $this->TbVariedades->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tbVariedade = $this->TbVariedades->patchEntity($tbVariedade, $this->request->getData());
            if ($this->TbVariedades->save($tbVariedade)) {
                $this->Flash->success(__('The tb variedade has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tb variedade could not be saved. Please, try again.'));
        }
        $tbTipoDiversidad = $this->TbVariedades->TbTipoDiversidad->find('list', ['limit' => 200]);
        $this->set(compact('tbVariedade', 'tbTipoDiversidad'));
        $this->set('_serialize', ['tbVariedade']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tb Variedade id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tbVariedade = $this->TbVariedades->get($id);
        if ($this->TbVariedades->delete($tbVariedade)) {
            $this->Flash->success(__('The tb variedade has been deleted.'));
        } else {
            $this->Flash->error(__('The tb variedade could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
