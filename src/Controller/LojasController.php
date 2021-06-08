<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Lojas Controller
 *
 * @property \App\Model\Table\LojasTable $Lojas
 * @method \App\Model\Entity\Loja[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LojasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Enderecos'],
        ];
        $lojas = $this->paginate($this->Lojas);

        $this->set(compact('lojas'));
    }

    /**
     * View method
     *
     * @param string|null $id Loja id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $loja = $this->Lojas->get($id, [
            'contain' => ['Enderecos', 'Saidas'],
        ]);

        $this->set(compact('loja'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $loja = $this->Lojas->newEmptyEntity();
        if ($this->request->is('post')) {
            $loja = $this->Lojas->patchEntity($loja, $this->request->getData());
            if ($this->Lojas->save($loja)) {
                $this->Flash->success(__('A Loja foi salva.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('A Loja não foi salva. Por favor, tente novamente.'));
        }
        $enderecos = $this->Lojas->Enderecos->find('list', ['limit' => 200]);
        $this->set(compact('loja', 'enderecos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Loja id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $loja = $this->Lojas->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $loja = $this->Lojas->patchEntity($loja, $this->request->getData());
            if ($this->Lojas->save($loja)) {
                $this->Flash->success(__('A Loja foi salva.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('A Loja não foi salva. Por favor, tente novamente.'));
        }
        $enderecos = $this->Lojas->Enderecos->find('list', ['limit' => 200]);
        $this->set(compact('loja', 'enderecos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Loja id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $loja = $this->Lojas->get($id);
        if ($this->Lojas->delete($loja)) {
            $this->Flash->success(__('A Loja foi deletada.'));
        } else {
            $this->Flash->error(__('A Loja não foi deletada. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
