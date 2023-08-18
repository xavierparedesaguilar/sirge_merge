<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * TbEtapaConocimiento Controller
 *
 * @property \App\Model\Table\TbEtapaConocimientoTable $TbEtapaConocimiento
 *
 * @method \App\Model\Entity\TbEtapaConocimiento[] paginate($object = null, array $settings = [])
 */
class TbEtapaConocimientoController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['TbConocimientoTradicionals', 'TbEtapas']
        ];
        $tbEtapaConocimiento = $this->paginate($this->TbEtapaConocimiento);

        $this->set(compact('tbEtapaConocimiento'));
        $this->set('_serialize', ['tbEtapaConocimiento']);
    }

    /**
     * View method
     *
     * @param string|null $id Tb Etapa Conocimiento id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tbEtapaConocimiento = $this->TbEtapaConocimiento->get($id, [
            'contain' => ['TbConocimientoTradicionals', 'TbEtapas']
        ]);

        $this->set('tbEtapaConocimiento', $tbEtapaConocimiento);
        $this->set('_serialize', ['tbEtapaConocimiento']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tbEtapaConocimiento = $this->TbEtapaConocimiento->newEntity();
        if ($this->request->is('post')) {
            $tbEtapaConocimiento = $this->TbEtapaConocimiento->patchEntity($tbEtapaConocimiento, $this->request->getData());
            if ($this->TbEtapaConocimiento->save($tbEtapaConocimiento)) {
                $this->Flash->success(__('The tb etapa conocimiento has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tb etapa conocimiento could not be saved. Please, try again.'));
        }
        $tbConocimientoTradicionals = $this->TbEtapaConocimiento->TbConocimientoTradicionals->find('list', ['limit' => 200]);
        $tbEtapas = $this->TbEtapaConocimiento->TbEtapas->find('list', ['limit' => 200]);
        $this->set(compact('tbEtapaConocimiento', 'tbConocimientoTradicionals', 'tbEtapas'));
        $this->set('_serialize', ['tbEtapaConocimiento']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tb Etapa Conocimiento id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tbEtapaConocimiento = $this->TbEtapaConocimiento->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tbEtapaConocimiento = $this->TbEtapaConocimiento->patchEntity($tbEtapaConocimiento, $this->request->getData());
            if ($this->TbEtapaConocimiento->save($tbEtapaConocimiento)) {
                $this->Flash->success(__('The tb etapa conocimiento has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tb etapa conocimiento could not be saved. Please, try again.'));
        }
        $tbConocimientoTradicionals = $this->TbEtapaConocimiento->TbConocimientoTradicionals->find('list', ['limit' => 200]);
        $tbEtapas = $this->TbEtapaConocimiento->TbEtapas->find('list', ['limit' => 200]);
        $this->set(compact('tbEtapaConocimiento', 'tbConocimientoTradicionals', 'tbEtapas'));
        $this->set('_serialize', ['tbEtapaConocimiento']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tb Etapa Conocimiento id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tbEtapaConocimiento = $this->TbEtapaConocimiento->get($id);
        if ($this->TbEtapaConocimiento->delete($tbEtapaConocimiento)) {
            $this->Flash->success(__('The tb etapa conocimiento has been deleted.'));
        } else {
            $this->Flash->error(__('The tb etapa conocimiento could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
