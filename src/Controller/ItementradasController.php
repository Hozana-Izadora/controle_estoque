<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Itementradas Controller
 *
 * @property \App\Model\Table\ItementradasTable $Itementradas
 * @method \App\Model\Entity\Itementrada[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ItementradasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Produtos', 'Entradas'],
        ];
        $itementradas = $this->paginate($this->Itementradas);

        $this->set(compact('itementradas'));
    }

    /**
     * View method
     *
     * @param string|null $id Itementrada id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $itementrada = $this->Itementradas->get($id, [
            'contain' => ['Produtos', 'Entradas'],
        ]);

        $this->set(compact('itementrada'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $itementrada = $this->Itementradas->newEmptyEntity();
        if ($this->request->is('post')) {
            $itementrada = $this->Itementradas->patchEntity($itementrada, $this->request->getData());
            if ($this->Itementradas->save($itementrada)) {
                $this->Flash->success(__('O item de entrada foi salvo.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O item de entrada não foi salvo. Por favor, tente novamente.'));
        }
        $produtos = $this->Itementradas->Produtos->find('list', ['limit' => 200]);
        $entradas = $this->Itementradas->Entradas->find('list', ['limit' => 200]);
        $this->set(compact('itementrada', 'produtos', 'entradas'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Itementrada id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $itementrada = $this->Itementradas->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $itementrada = $this->Itementradas->patchEntity($itementrada, $this->request->getData());
            if ($this->Itementradas->save($itementrada)) {
                $this->Flash->success(__('O item de entrada foi salvo.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O item de entrada não foi salvo. Por favor, tente novamente.'));
        }
        $produtos = $this->Itementradas->Produtos->find('list', ['limit' => 200]);
        $entradas = $this->Itementradas->Entradas->find('list', ['limit' => 200]);
        $this->set(compact('itementrada', 'produtos', 'entradas'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Itementrada id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $itementrada = $this->Itementradas->get($id);
        if ($this->Itementradas->delete($itementrada)) {
            $this->Flash->success(__('O item de entrada foi deletado.'));
        } else {
            $this->Flash->error(__('O item de entrada não foi deletado. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
